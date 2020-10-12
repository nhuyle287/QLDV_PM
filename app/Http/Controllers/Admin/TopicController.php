<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Model\Category_topic;
use App\Model\ConstantsModel;
use App\Model\Topic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class TopicController extends AdminController
{
    //
    public function index(){
        $topics = Topic::paginate(Config::get('constants.pagination'));
        $category_topic = Category_topic::all();
        return view('admin.topic.index', compact('topics','category_topic'));
    }
    public function show(Request $request){
        $topic = Topic::find($request->id);
        $category_topic = Category_topic::all();
        return view('admin.topic.show', compact('topic','category_topic'));
    }
    // thực hiện xác nhận edit + create
    public function entry(Request $request){
        $topic = ($request->id) ? Topic::find($request->id): new Topic();
        $category_topic = Category_topic::all();
        return view('admin.topic.edit-add', compact('topic','category_topic'));
        //compact truyền dữ liệu ra view với biến $domain
    }


    //nút save khi thực hiện edit + create
    public function store(Request $request)
    {
        //tạo mới đối tượng khi không có request( request trả về null)
        $topic = new Topic();

        //trong trường hợp chỉnh sửa (trả về id của đối tượng muốn chỉnh sửa)
        if ($request->id) {
            $topic = Topic::find($request->id);

        }

        //đánh giá xét duyệt có đúng với bên model không nếu fails thì trở về màn hình nhập + hiện thông báo lỗi
        $validator = $this->validateInput($request->all(), $topic->rules, $topic->message);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
//

        $topic->fill($request->all());
        try {
            $topic->save();
            return redirect(route('admin.topic.index'))->with('success', 'Success');
        } catch (\Exception $e) {
            return redirect(route('admin.topic.index'))->with('fail', 'Fail');

        }

    }
    public function destroy(Request $request){
        try{
            $topic = Topic::find($request->id);
            if ($topic == null){
                throw new \Exception();
            }
            $topic->delete();
            return redirect()->route('admin.topic.index')->with('success', 'Thành Công');
        }catch (\Exception $e){
            return redirect()->route('admin.topic.index')->with('fails', 'Thất Bại');
        }
    }

}
