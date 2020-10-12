<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Model\Email;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;

class EmailController extends AdminController
{
    //
    public function index(){
        $emails = Email::paginate(Config::get('constants.pagination'));
        return view('admin.email.index',compact('emails'));
    }
    public function show(Request $request){
        $email = Email::find($request->id);
        return view('admin.email.show',compact('email'));
    }
    public function entry(Request $request){
//        dd($request->all());
        $email = ($request->id) ? Email::find($request->id): new Email();
        return view('admin.email.edit-add',compact('email'));
    }
    public function store(Request $request)
    {
        //tạo mới đối tượng khi không có request( request trả về null)
        $email = new Email();

//trong trường hợp chỉnh sửa (trả về id của đối tượng muốn chỉnh sửa)
        if ($request->id) {
            $email = Email::find($request->id);
            //duy nhat thi su dung ham duoi
//            $hosting->rules['name'] = 'required:hostings,name,'.$hosting->id;
        }
//        dd($domain->all());
        //đánh giá xét duyệt có đúng với bên model không nếu fails thì trở về màn hình nhập + hiện thông báo lỗi
        $validator = $this->validateInput($request->all(), $email->rules, $email->message);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $email->fill($request->all());
//        dd($request->all());
        try {
            $email->save();
            $email_id = $email->id;
            $email_update = Email::find($email_id);
            if ($email_update){
                $email_code = Helper::generateCodeBySpecialName($email->name).''.Helper::generateCodeById($email->id);
                try {
                    $email_update->update([
                        'code'=> $email_code
                    ]);
                }catch (\Exception $e){
                    return redirect(route('admin.emails.index'))->with('fail', 'Thất Bại');
                }
            }

            return redirect(route('admin.emails.index'))->with('success', 'Thành Công');
        } catch (\Exception $e) {
            return redirect(route('admin.emails.index'))->with('fail', 'Thất Bại');
        }
    }
    public function destroy(Request $request){
        try{
            $email = Email::find($request->id);
            if ($email == null){
                throw new \Exception();
            }
            $email->delete();
            return redirect()->route('admin.emails.index')->with('success','Thành Công');
        }catch (\Exception $e){
            return redirect()->route('admin.emails.index')->with('fails','Thất bại');
        }
    }
}
