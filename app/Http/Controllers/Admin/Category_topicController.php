<?php


namespace App\Http\Controllers\Admin;


use App\Model\Category_topic;
use App\Model\ConstantsModel;
use App\Model\Role;
use App\Model\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\Promise\all;

class Category_topicController extends AdminController
{
    public function index(){
        $category = Category_topic::paginate(Config::get('constants.pagination'));
       $category_topic = Category_topic::find('category_topic');

        return view('admin.category_topic.index', compact('category_topic','category'));
    }
    public function show(Request $request){
        $category_topic = Category_topic::find($request->id);
        return view('admin.category_topic.show', compact('category_topic'));
    }

    public function entry(Request $request){
        $category_topic = ($request->id) ? Category_topic::find($request->id): new Category_topic();
        return view('admin.category_topic.add-edit', compact('category_topic'));
    }
    public function store(Request $request)
    {
        //tạo mới đối tượng khi không có request( request trả về null)
        $category_topic = new Category_topic();

        //trong trường hợp chỉnh sửa (trả về id của đối tượng muốn chỉnh sửa)
        if ($request->id) {
            $category_topic = Category_topic::find($request->id);
        }
        //đánh giá xét duyệt có đúng với bên model không nếu fails thì trở về màn hình nhập + hiện thông báo lỗi
        $validator = $this->validateInput($request->all(), $category_topic->rules, $category_topic->message);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        $category_topic->fill($request->all());
        try {
            $category_topic->save();
            return redirect(route('admin.category_topic.index'))->with('success', 'Success');
        } catch (\Exception $e) {
            return redirect(route('admin.category_topic.index'))->with('fail', 'Fail');

        }

    }

    public function destroy(Request $request){
        try{
            $category_topic = Category_topic::find($request->id);
            if ($category_topic == null){
                throw new \Exception();
            }
            $category_topic->delete();
            return redirect()->route('admin.category_topic.index')->with('success', 'Thành Công');
        }catch (\Exception $e){
            return redirect()->route('admin.category_topic.index')->with('fails', 'Thất Bại');
        }
    }
}
