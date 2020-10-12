<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Models\Category_topic;
use App\Models\ConstantsModel;
use App\Models\Topic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class TopicController extends AdminController
{
    //
    public function index(Request $request)
    {
        $this->authorize('topic-access');

        $key = isset($request->key) ? $request->key : '';
        $topic = new Topic();
        $topics = $topic->get_all($key, 10);

        if (isset($request->amount)) {
            $topics = $topic->get_all($key, $request->amount);
        }
        $support_topic = ConstantsModel::Support_Topic;

        return view('admin.topic.index', compact('topics','support_topic'));
    }

    public function searchRow(Request $request)
    {
        $topic = new Topic();
        $topics = $topic->get_all($request->key, 10);
        if ($request->amount !== null) {
            $topics = $topic->get_all($request->key, $request->amount);
        }
        $support_topic = ConstantsModel::Support_Topic;

        return view('admin.topic.search-row', compact('topics','support_topic'));
    }

    public function show(Request $request)
    {
        $support_topic = ConstantsModel::Support_Topic;
        $topic = Topic::find($request->id);
        $category_topic = Category_topic::all();
        return view('admin.topic.show', compact('topic', 'category_topic','support_topic'));
    }

    // thực hiện xác nhận edit + create
    public function entry(Request $request)
    {
        $support_topic = ConstantsModel::Support_Topic;
        $topic = ($request->id) ? Topic::find($request->id) : new Topic();
        $category_topic = Category_topic::all();
        return view('admin.topic.edit-add', compact('topic', 'category_topic', 'support_topic'));
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
      // $request['description']= strip_tags(html_entity_decode($request->description));
        $topic->fill($request->all());
        try {

            $topic->save();
            return redirect(route('admin.topic.index'))->with('success', 'Success');
        } catch (\Exception $e) {
            return redirect(route('admin.topic.index'))->with('fail', 'Fail');

        }

    }

    public function destroy(Request $request)
    {
        try {
            $topic = Topic::find($request->id);
            if ($topic == null) {
                throw new \Exception();
            }
            $topic->delete();
            return redirect()->route('admin.topic.index')->with('success', 'Thành Công');
        } catch (\Exception $e) {
            return redirect()->route('admin.topic.index')->with('fails', 'Thất Bại');
        }
    }
    public function destroySelect(Request $request)
    {
        try {
            $allVals = explode(',', $request->allValsDelete[0]);
            if($allVals[0]!=="") {
                foreach ($allVals as $item) {
                    $topic = Topic::find($item);
                    $topic->delete();
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
