<?php


namespace App\Http\Controllers\Admin;

use App\Model\Customer;
use App\Model\Domain;
use App\Model\Product;
use App\Model\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use function GuzzleHttp\Promise\all;

class CustomerController extends AdminController
{
    public function index(Request $request)
    {
        //paginate : phan trang

        $customers = Customer::paginate(Config::get('constants.pagination'));
        return view('admin.customer.index', compact('customers'));
        //compact di kem 1 bien, dung de lay du lieu load len index
    }
    //thực hiện xác nhận edit + create
    //Customer:: đối tượng trong Model
    public function entry(Request $request)
    {

        $customer = ($request->id) ? Customer::find($request->id) : new Customer();
        return view('admin.customer.edit-add', compact('customer'));
    }

    public function show(Request $request)
    {
        $customer = Customer::find($request->id);
        return view('admin.customer.show', compact('customer'));
    }

    //nút save
    public function store(Request $request)
    {
        //tạo mới đối tượng khi không có request( request trả về null)
        $cus = new Customer();

//trong trường hợp chỉnh sửa (trả về id của đối tượng muốn chỉnh sửa)
        if ($request->id) {
            $cus = Customer::find($request->id);
            //để cho chỉnh sửa email
            //$cus->id; trỏ tới id để lấy thông tin chỉnh sửa
            //:customers,email -> customers là bảng, email là cột
            //'required|email|unique thay đổi luật trong trường hợp ngoại lệ

            $cus->rules['email'] = 'required|email|unique:customers,email,' . $cus->id;
        }
        //đánh giá xét duyệt có đúng với bên model không nếu fails thì trở về màn hình nhập + hiện thông báo lỗi
        $validator = $this->validateInput($request->all(), $cus->rules, $cus->message);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
//        $request['name'] = $request->name;
//        $request['phone_number'] = $request->phone_number;
//        $request['email'] = $request->email;
//        $request['address'] = $request->address;
//        $request['birthday'] = $request->birthday;
//        $request['notes'] = $request->notes;
        // chuyển đổi ngày tháng năm người dùng giống mysql trước khi đưa vào database
        //$request->birthday lấy name ngoài edit-add.blade.php
        $request['birthday'] = date('Y-m-d H:i:s', strtotime($request->birthday));
        $cus->fill($request->all());
        try {

            $cus->save();
            return redirect(route('admin.customers.index'))->with('success', 'Success');
        } catch (\Exception $e) {
            return redirect(route('admin.customers.index'))->with('fail', 'Fail');

        }
    }

    public function destroy(Request $request)
    {
        try {
            $customer = Customer::find($request->id);

            if ($customer == null) {
                throw new \Exception();
            }
            $customer->delete();
            return redirect()->route('admin.customers.index')->with('success', 'Thành công');
        } catch (\Exception $e) {
            return redirect()->route('admin.customers.index')->with('fail', 'Lỗi');
        }
    }
}
