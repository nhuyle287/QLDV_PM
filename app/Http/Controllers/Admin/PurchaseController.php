<?php


namespace App\Http\Controllers\Admin;


use App\Business\PurchaseLogic;
use App\Model\Purchar;
use App\Model\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends AdminController
{
    public function index(Request $request)
    {
        $purchase_logic = new PurchaseLogic();
        $purchases = $purchase_logic->getListPurchases($request);
        return view('admin.purchase.index', compact('purchases'));
    }

    public function entry(Request $request){
        return view('admin.purchase.edit-add');
    }
    public function show(Request $request){
        $purchase = Purchase::find($request->id);
        return view('admin.purchase.show', compact('purchase'));
    }
}
