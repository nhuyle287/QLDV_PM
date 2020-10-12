<?php


namespace App\Http\Controllers\Admin;


use App\Business\InvoiceLogic;
use App\Business\RegisterServicesLogic;
use App\Business\RegisterSoftLogic;

use App\Helpers\Helper;
use App\Models\ConstantsModel;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Receipt;
use App\Models\RegisterService;
use App\Models\RegisterSoft;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;


class RevenueController extends AdminController

{
    public function index(Request $request)
    {
        $this->authorize('revenue-access');
        $key = isset($request->key) ? $request->key : '';
        $register_service = new Invoice();
        $register_services = $register_service->get_revenue($key, 10);

        if (isset($request->amount)) {
            $register_services = $register_service->get_revenue($key, $request->amount);
        }
        return view('admin.revenue.index', compact('register_services'));
    }

    public function searchRow(Request $request)
    {
        $register_service = new Invoice();
        $register_services = $register_service->get_revenue($request->key, 10);
        if ($request->amount !== null) {
            $register_services = $register_service->get_revenue($request->key, $request->amount);
        }
        return view('admin.revenue.search-row', compact('register_services'));
    }



    public function show(Request $request)
    {
        $logic_register_services = new  InvoiceLogic();
        $register_service = $logic_register_services->getInvoiceReceipt($request->id);
        return view('admin.revenue.show', compact('register_service'));
    }

    public function print(Request $request)
    {

        $register_service = db::table('invoices as in')
            ->join('customers as cus', 'cus.id', '=', 'in.id_customer')
            ->where('in.id', '=', $request->id)->first();
//        dd($register_services);
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('admin.revenue.export', compact('register_service'))
            ->setPaper('a5', 'landscape');
//        ->setPaper('a4','landscape');
        return $pdf->stream();

    }

    public function entry(Request $request)
    {
        $register_service = db::table('invoices as in')
            ->join('customers as cus', 'cus.id', '=', 'in.id_customer')
            ->where('in.id', '=', $request->id)
            ->select('in.*', 'cus.name', 'cus.email', 'cus.address','cus.phone_number')->first();
        return view('admin.invoice.add-receipt', compact('register_service'));
    }

    public function destroy(Request $request)
    {
        try {
            $invoice = Invoice::find($request->id);

            if ($invoice == null) {
                throw new \Exception();
            }
            $invoice->delete();
            return redirect()->route('admin.revenue.index')->with('success', 'Thành công');
        } catch (\Exception $e) {
            return redirect()->route('admin.revenue.index')->with('fail', 'Lỗi');
        }
    }

    public function destroySelect(Request $request)
    {
        try {
            $allVals = explode(',', $request->allValsDelete[0]);
            if($allVals[0]!=="") {
                foreach ($allVals as $item) {
                    $invoice = Invoice::find($item);
                    $invoice->delete();
                }
                return redirect()->back()->with('success', __('general.delete_success'));
            }
            else{
                return redirect()->back()->with('fail', 'Vui lòng chọn dòng cần xóa');
            }

        } catch (\Exception $exception) {
            return redirect()->back()->with('fail', __('general.delete_fail'));
        }
    }


}
