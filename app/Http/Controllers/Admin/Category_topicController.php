<?php


namespace App\Http\Controllers\Admin;


use App\Models\Category_topic;
use App\Models\ConstantsModel;
use App\Models\Role;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\Promise\all;

class Category_topicController extends AdminController
{
    public function index(Request $request){
        $this->authorize('category-topic-access');

        $key = isset($request->key) ? $request->key : '';
        $category_topic = new Category_topic();
        $category_topics = $category_topic->get_all($key, 10);

        if (isset($request->amount)) {
            $category_topics = $category_topic->get_all($key, $request->amount);
        }
        return view('admin.category_topic.index', compact('category_topics'));
    }

    public function searchRow(Request $request)
    {
        $category_topic = new Category_topic();
        $category_topics = $category_topic->get_all($request->key, 10);

        if ($request->amount !== null) {
            $category_topics = $category_topic->get_all($request->key, $request->amount);
        }
        return view('admin.category_topic.search-row', compact('category_topics'));
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
            return redirect(route('admin.category-topic.index'))->with('success', 'Thành công');
        } catch (\Exception $e) {
            return redirect(route('admin.category-topic.index'))->with('fail', 'Thất bại');

        }

    }

    public function destroy(Request $request){
        try{
            $category_topic = Category_topic::find($request->id);
            if ($category_topic == null){
                throw new \Exception();
            }
            $category_topic->delete();
            return redirect()->route('admin.category-topic.index')->with('success', 'Thành Công');
        }catch (\Exception $e){
            return redirect()->route('admin.category-topic.index')->with('fails', 'Thất Bại');
        }
    }

    public function destroySelect(Request $request)
    {
        try {
            $allVals = explode(',', $request->allValsDelete[0]);
            if($allVals[0]!=="") {
                foreach ($allVals as $item) {
                    $category_topic = Category_topic::find($item);
                    $category_topic->delete();
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
