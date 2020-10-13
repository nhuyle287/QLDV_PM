<?php

namespace App\Http\Controllers\Admin;

use App\Models\Academic_Internships;
use App\Models\Certificate_Internships;
use App\Models\ConstantsModel;
use App\Models\Customer;
use App\Models\Internship;
use App\Models\InternshipTopic;
use App\Models\Languages_Internships;
use App\Models\Project_Internships;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class InternshipTopicController extends AdminController
{
    public function index(Request $request)
    {
        $status_internship = ConstantsModel::STATUS_INTERNSHIP;
        $this->authorize('internship-topic-access');

        $key = isset($request->key) ? $request->key : '';
        $internship = new InternshipTopic();
        $internship_School = $internship->getAll($key, 10);

        if (isset($request->amount)) {
            $internship_School = $internship->getAll($key, $request->amount);
        }
        $internship_topic = db::table('internships')
            ->join('internship_topic', 'internships.internship_id', '=', 'internship_topic.internship_id')
            ->first();
        return view('admin.internship_topic.index', compact('internship_School', 'status_internship', 'internship_topic'));
    }

    public function searchRow(Request $request)
    {
        $internship = new InternshipTopic();
        $internship_School = $internship->getAll($request->key, 10);

        if (isset($request->amount)) {
            $internship_School = $internship->getAll($request->key, $request->amount);
        }
        $status_internship = ConstantsModel::STATUS_INTERNSHIP;

        $internship_topic = db::table('internships')
            ->join('internship_topic', 'internships.internship_id', '=', 'internship_topic.internship_id')
            ->first();
        return view('admin.internship_topic.search-row', compact('internship_School', 'status_internship', 'internship_topic'));
    }

    public function insert()
    {
        $internshiptopic = new InternshipTopic();
        $internshiptopic->insert(request()->except(['_token']));
        return back();
    }

    public function entry(Request $request)
    {
        $status_internship = ConstantsModel::STATUS_INTERNSHIP;
        $internship = ($request->id) ? Internship::find($request->id) : new Internship();
        $internship_topic = DB::table('internship_topic')->where('internship_id', '=', $request->id)->first();
        // dd($internship);
//        if($request->internship_id)
//        {
//            $internship=db::table('internships as in')
//                ->join('internship_topic as in_to','in.internship_id','=','in_to.internship_id')
//                ->where('in.internship_id','=',$request->internship_id)
//                ->first();
//
//        }
//        else{
//            $internship=new Internship();
//        }
        $topic = DB::table('topics')->get();
        //dd($internship_topic);
        return view('admin.internship_topic.edit', compact('internship', 'topic', 'status_internship', 'internship_topic'));
        //compact truyền dữ liệu ra view với biến $domain
    }

    public function Update(Request $request)
    {
//        dd($request->all());
        //tạo mới đối tượng khi không có request( request trả về null)
        $internship = new Internship();

        //trong trường hợp chỉnh sửa (trả về id của đối tượng muốn chỉnh sửa)
        if ($request->internship_id) {
            $internship = Internship::find($request->internship_id);

            $internship->rules['email'] = 'required|email|unique:internships,email,' . $internship->internship_id;
            $internship->rules['cmnd'] = 'required|cmnd|unique:internships,cmnd,' . $internship->internship_id;
            $internship->rules['end_date'] = 'required|after_or_equal:internships,start_date,' . $internship->internship_id;
            //  $internship->rules['image']='required|image|mimes:jpeg,png,jpg,gif|max:2048:internships,image'.$internship->id;
        }

//        //đánh giá xét duyệt có đúng với bên model không nếu fails thì trở về màn hình nhập + hiện thông báo lỗi
//        $validator = $this->validateInput($request->all(), $internship->rules, $internship->message);
//        if ($validator->fails()) {
//            return redirect()->back()->withInput()->withErrors($validator);
//        }
//
        $request['start_date'] = date('Y-m-d', strtotime($request->start_date));
        $request['date_create'] = date('Y-m-d', strtotime($request->date_create));

        $internship->name = $request->name;
        $internship->email = $request->email;
        $internship->address = $request->address;
        $internship->birthday = $request->birthday;
        $internship->start_date = $request->start_date;
        $internship->cmnd = $request->cmnd;
        $internship->phone = $request->phone;
        $internship->gender = $request->gender;
        $internship->name_family = $request->name_family;
        $internship->phone_family = $request->phone_family;
        $internship->addresscurrent = $request->addresscurrent;
        $internship->range_date = $request->range_date;
        $internship->issued_by = $request->issued_by;
        $internship->position = $request->position;
        $internship->status = $request->status;
     //   $internship->idtopic = null;
        $internship->date_create = $request->date_create;
        $internship->end_date = null;
        if ($request->hasFile('anh')) {

            $file = $request->file('anh');
            $name = $file->getClientOriginalName('anh');
            $duoi = $file->getClientOriginalExtension('anh');

            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
//                chỗ này anh trả về template kiểu json, với trạng thái là 0 tượng trưng cho false
//                với 1 biến data là giá trị muốn trả về
//                return response()->json(['data' => $internship, 'status' => 0]);
                return redirect(route('admin.internship-topic.edit'))->with('loi', 'Bạn chỉ được chọn file có đuôi .jpg .png .jpeg');

            }
            $file->move('images/internship', $name);
            $internship->image = $name;
        } else {

            $internship->image = $request->tenanh;

        }
        $internship_topic = new InternshipTopic();
        try {

            $internship->save();
            $internship_topic->where('internship_id', $internship->internship_id)->update(['topic_id' => $request->id_topic]);
            //  return response()->json(['message' => 'Success', 'status' => 1]);

            return redirect(route('admin.internship-topic.index'))->with('success', 'Success');
        } catch (\Exception $e) {
           //            return response()->json(['message' => 'Fail', 'status' => 0]);
           return redirect(route('admin.internship-topic.index'))->with('fail', 'Fail');

        }

    }

    public function show(Request $request)
    {
        // $internship_id = Internship::find($request->id);
        //      $internship=dd($internship_id->project->academic_level);
        $status_internship = ConstantsModel::STATUS_INTERNSHIP;
        $internship = db::table('internships as in')
            ->join('academic_internships as ac_in', 'in.internship_id', '=', 'ac_in.internship_id')
            ->join('academic_levels as ac', 'ac.academic_id', '=', 'ac_in.academic_id')
            ->join('internship_topic as in_to','in.internship_id','=','in_to.internship_id')

            ->where('in.internship_id', '=', $request->id)
            ->get();

        $project = db::table('projects as pro')
            ->join('project_internships as pro_in', 'pro.project_id', '=', 'pro_in.project_id')
            ->join('internships as in', 'in.internship_id', '=', 'pro_in.internship_id')
            ->where('in.internship_id', '=', $request->id)
            ->get();

        $certificate = db::table('certificates as ce')
            ->join('certificate_internships as ce_in', 'ce.certificate_id', '=', 'ce_in.certificate_id')
            ->join('internships as in', 'in.internship_id', '=', 'ce_in.internship_id')
            ->where('in.internship_id', '=', $request->id)
            ->get();

        $languages = db::table('languages as la')
            ->join('languages_internships as la_in', 'la.languages_id', '=', 'la_in.languages_id')
            ->join('internships as in', 'in.internship_id', '=', 'la_in.internship_id')
            ->where('in.internship_id', '=', $request->id)
            ->get();
        $internship_topic = db::table('internships')
            ->join('internship_topic', 'internships.internship_id', '=', 'internship_topic.internship_id')
            ->join('topics', 'topics.id', '=', 'internship_topic.topic_id')
            ->first();
        return view('admin.internship_topic.show', compact('internship', 'project', 'certificate', 'languages', 'status_internship', 'internship_topic'));
    }

    public function destroy(Request $request)
    {

        try {

            $internship_topic = InternshipTopic::where('internship_id', $request->id);
            $academic_internships = Academic_Internships::where('internship_id', $request->id);
            $certificate_internships = Certificate_Internships::where('internship_id', $request->id);
            $languages_internships = Languages_Internships::where('internship_id', $request->id);
            $project_internships = Project_Internships::where('internship_id', $request->id);
            $internships = Internship::where('internship_id', $request->id);

            if ($academic_internships == null && $internships == null && $internship_topic == null) {
                throw new \Exception();
            }
            if ($project_internships != null) {
                $project_internships->delete();
            }
            if ($certificate_internships != null) {
                $certificate_internships->delete();
            }
            if ($languages_internships != null) {
                $languages_internships->delete();
            }
            $internship_topic->delete();
            $academic_internships->delete();
            $internships->delete();

            return redirect()->route('admin.internship-topic.index')->with('success', 'Xóa Thành Công');
        } catch (\Exception $e) {
            echo($e);
            return redirect()->route('admin.internship-topic.index')->with('fail', 'Xóa Thất Bại');
        }
    }

    public function destroySelect(Request $request)
    {
        try {
            $allVals = explode(',', $request->allValsDelete[0]);
            if($allVals[0]!=="") {
                foreach ($allVals as $item) {
                    $internship_topic = InternshipTopic::where('internship_id', $item);
                    $academic_internships = Academic_Internships::where('internship_id',$item);
                    $certificate_internships = Certificate_Internships::where('internship_id', $item);
                    $languages_internships = Languages_Internships::where('internship_id', $item);
                    $project_internships = Project_Internships::where('internship_id', $item);
                    $internships = Internship::where('internship_id',$item);


                    if ($project_internships != null) {
                        $project_internships->delete();
                    }
                    if ($certificate_internships != null) {
                        $certificate_internships->delete();
                    }
                    if ($languages_internships != null) {
                        $languages_internships->delete();
                    }
                    $internship_topic->delete();
                    $academic_internships->delete();
                    $internships->delete();
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
