<?php

namespace App\Http\Controllers\Admin;

use App\Model\Academic_Internships;
use App\Model\Academic_level;
use App\Model\Certificate;
use App\Model\Certificate_Internships;
use App\Model\ConstantsModel;
use App\Model\Customer;
use App\Model\Internship;
use App\Model\InternshipTopic;
use App\Model\Language;
use App\Model\Languages_Internships;
use App\Model\Level_internships;
use App\Model\Project;
use App\Model\Project_Internships;
use Aws\Api\Parser\JsonParser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Array_;

class InternshipController extends AdminController
{

    public function index()
    {
        $status_internship = ConstantsModel::STATUS_INTERNSHIP;
        //paginate lấy tất cả đối tượng rồi phân trang theo constant.pagination trong config
       // $internships = Internship::paginate(Config::get('constants.pagination'));
        $internship_School = db::table('internships')
            ->join('academic_internships', 'academic_internships.internship_id', '=', 'internships.internship_id')
            ->join('academic_levels', 'academic_levels.academic_id', '=', 'academic_internships.academic_id')
            ->select('internships.internship_id', 'internships.name', 'internships.email', 'internships.phone', 'academic_levels.school', 'academic_levels.major', 'internships.date_create', 'internships.status')
            ->whereNotExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('internship_topic')
                    ->whereRaw('internship_topic.internship_id=internships.internship_id');
            })
            ->whereNull('internships.deleted_at')
            ->whereNull('academic_internships.deleted_at')
            ->whereNull('academic_levels.deleted_at')
            ->paginate(Config::get('constants.pagination'));
        $topic = DB::table('topics')->get();
        return view('admin.internship.index', compact('internship_School', 'topic', 'status_internship'));
    }


    // thực hiện xác nhận edit + create
    public function entry(Request $request)
    {
        $status_internship = ConstantsModel::STATUS_INTERNSHIP;
        $internship = ($request->id) ? Internship::find($request->id) : new Internship();
        // dd($internship);
        $topic = DB::table('topics')->get();
        return view('admin.internship.edit-add', compact('internship', 'topic', 'status_internship'));
        //compact truyền dữ liệu ra view với biến $domain
    }
//
//    public function dk()
//    {
//        return view('admin.internship.dk_detai');
//    }
//
//
//    public function register(Request $request)
//    {
////dd($request->all());
//        $internship = new Internship();
//        $request['start_date'] = date('Y-m-d', strtotime($request->start_date));
//        $internship->name = $request->name;
//        $internship->email = $request->email;
//        $internship->address = $request->address;
//        $internship->birthday = $request->birthday;
//        $internship->start_date = $request->start_date;
//        $internship->cmnd = $request->cmnd;
//        $internship->phone = $request->phone;
//        $internship->gender = $request->gender;
//        $internship->name_family = $request->name_family;
//        $internship->phone_family = $request->phone_family;
//        $internship->addresscurrent = $request->addresscurrent;
//        $internship->range_date = $request->range_date;
//        $internship->issued_by = $request->issued_by;
//        $internship->position = $request->position;
//        $internship->status = 0;
////   $internship->idtopic = null;
//        $internship->end_date = null;
//        $mytime = now()->toDateTimeString('Y-m-d H:i:s');
//        $internship->date_create = $mytime;
//        if ($request->hasFile('image')) {
//            $file = $request->file('image');
//            $name = $file->getClientOriginalName('image');
//            $duoi = $file->getClientOriginalExtension('image');
//            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {//
//                return redirect(route('admin.internship.dk'))->with('loi', 'Bạn chỉ được chọn file có đuôi .jpg .png .jpeg');
//            }
//            $file->move('images/internship', $name);
//            $internship->image = $name;
//        } else {
//            $internship->image = "";
//        }
//        $internship->save();
//        $collection = $request->list_dateschool;
//
//
//        if (is_array($collection) || is_object($collection))
//            foreach ($collection as $key => $value) {
//                $collection = explode(",", $value);
//                $degree = new Academic_level();
//                $degree->dateshool = date('Y-m-d', strtotime($collection[0]));
//                $degree->school = $collection[1];
//                $degree->major = $collection[2];
//                $degree->degree = $collection[3];
//                $degree->loai = $collection[4];
//                $degree->save();
//                $academic_internships = new Academic_Internships();
//                $academic_internships->internship_id = $internship->internship_id;
//                $academic_internships->academic_id = $degree->academic_id;
//                $academic_internships->save();
//                print_r($value);
//            }
//        else {
//            $degree = new Academic_level();
//            $degree->dateshool = null;
//            $degree->school = null;
//            $degree->major = null;
//            $degree->degree = null;
//            $degree->loai = null;
//            $degree->save();
//            $academic_internships = new Academic_Internships();
//            $academic_internships->internship_id = $internship->internship_id;
//            $academic_internships->academic_id = $degree->academic_id;
//            $academic_internships->save();
//        }
////chứng chỉ
//        $chungchi = $request->list_datecc;
//
//
//        if (is_array($chungchi) || is_object($chungchi)) {
//            foreach ($chungchi as $key => $value) {
//                $chungchi = explode(",", $value);
//                $certificate = new Certificate();
//                $certificate->name_certificate = $chungchi[1];
//                $certificate->training_places = $chungchi[2];
//                $certificate->score = $chungchi[3];
//                $certificate->date_cc = date('Y-m-d', strtotime($chungchi[0]));
//                $certificate->save();
//                $certificate_internships = new Certificate_Internships();
//                $certificate_internships->internship_id = $internship->internship_id;
//                $certificate_internships->certificate_id = $certificate->certificate_id;
//                $certificate_internships->save();
//                print_r($value);
//            }
//        } else {
//            $certificate = new Certificate();
//            $certificate->name_certificate = null;
//            $certificate->training_places = null;
//            $certificate->score = null;
//            $certificate->date_cc = null;
//            $certificate->save();
//            $certificate_internships = new Certificate_Internships();
//            $certificate_internships->internship_id = $internship->internship_id;
//            $certificate_internships->certificate_id = $certificate->certificate_id;
//            $certificate_internships->save();
//        }
////du an
//        $duan = $request->list_datesproject;
//
//        if (is_array($duan) || is_object($duan)) {
//            foreach ($duan as $key => $value) {
//                $duan = explode(",", $value);
//                $project = new Project();
//                $project->name_project = $duan[1];
//                $project->name_company = $duan[2];
//                $project->content_job = $duan[3];
//                $project->date_project = date('Y-m-d', strtotime($duan[0]));
//                $project->save();
//                $project_internships = new Project_Internships();
//                $project_internships->internship_id = $internship->internship_id;
//                $project_internships->project_id = $project->project_id;
//                $project_internships->save();
//                print_r($value);
//            }
//        } else {
//
//            $project = new Project();
//            $project->name_project = null;
//            $project->name_company = null;
//            $project->content_job = null;
//            $project->date_project = null;
//            $project->save();
//
//            $project_internships = new Project_Internships();
//            $project_internships->internship_id = $internship->internship_id;
//            $project_internships->project_id = $project->project_id;
//            $project_internships->save();
//        }
////        //ngon ngu
//        $ngonngu = $request->list_dateslanguage;
//        if (is_array($ngonngu) || is_object($ngonngu)) {
//            foreach ($ngonngu as $key => $value) {
//                $ngonngu = explode(",", $value);
//                $language = new Language();
//                $language->language_name = $ngonngu[0];
//                $language->listen = $ngonngu[1];
//                $language->speak = $ngonngu[2];
//                $language->read = $ngonngu[3];
//                $language->write = $ngonngu[4];
//                $language->save();
//                $languages_internships = new Languages_Internships();
//                $languages_internships->internship_id = $internship->internship_id;
//                $languages_internships->languages_id = $language->languages_id;
//                $languages_internships->save();
//            }
//        } else {
//            $language = new Language();
//            $language->language_name = null;
//            $language->listen = null;
//            $language->speak = null;
//            $language->read = null;
//            $language->write = null;
//            $language->save();
//            $languages_internships = new Languages_Internships();
//            $languages_internships->internship_id = $internship->internship_id;
//            $languages_internships->languages_id = $language->languages_id;
//            $languages_internships->save();
//        }
//        try {
//
//
//            return redirect(route('internship.dang_ky'))->with('success', 'Success');
//        } catch (\Exception $e) {
//            // echo($e);
////            return response()->json(['message' => 'Fail', 'status' => 0]);
//            return redirect(route('internship.dang_ky'))->with('fail', 'Fail');
//
//        }
//// return array($request->all());
////return response()->json($request->all());
//    }

    //nút save khi thực hiện edit + create
    public function store(Request $request)
    {
        $internship = new Internship();
        if ($request->internship_id) {
            $internship = Internship::find($request->internship_id);
            $internship->rules['email'] = 'required|email|unique:internships,email,' . $internship->internship_id . ',internship_id,deleted_at,NULL';
        }

        //đánh giá xét duyệt có đúng với bên model không nếu fails thì trở về màn hình nhập + hiện thông báo lỗi
        $validator = $this->validateInput($request->all(), $internship->rules, $internship->message);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

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
        $internship->date_create = $request->date_create;
        $internship->end_date = null;

        if ($request->hasFile('anh')) {
            $file = $request->file('anh');
            $name = $file->getClientOriginalName('anh');
            $duoi = $file->getClientOriginalExtension('anh');
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
                return redirect(route('admin.internship.dk'))->with('loi', 'Bạn chỉ được chọn file có đuôi .jpg .png .jpeg');
            }
            $file->move('images/internship', $name);
            $internship->image = $name;
        } else {
            $internship->image = $request->tenanh;
        }

        try {
//dd($internship);
            $internship->update();
            //  return response()->json(['message' => 'Success', 'status' => 1]);
            //  return response()->json(['message' => 'Success', 'status' => 1]);
            return redirect(route('admin.internship.index'))->with('success', 'Success');
        } catch (\Exception $e) {
            echo($e);
//            return response()->json(['message' => 'Fail', 'status' => 0]);
            return redirect(route('admin.internship.index'))->with('fail', 'Fail');

        }

    }

    public function show(Request $request)
    {
        $status_internship = ConstantsModel::STATUS_INTERNSHIP;
        $internship = db::table('internships as in')
            ->join('academic_internships as ac_in', 'in.internship_id', '=', 'ac_in.internship_id')
            ->join('academic_levels as ac', 'ac.academic_id', '=', 'ac_in.academic_id')
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

        return view('admin.internship.show', compact('internship', 'project', 'certificate', 'languages', 'status_internship'));
    }

    public function destroy(Request $request)
    {

        try {

            $academic_internships = Academic_Internships::where('internship_id', $request->id);
            $certificate_internships = Certificate_Internships::where('internship_id', $request->id);
            $languages_internships = Languages_Internships::where('internship_id', $request->id);
            $project_internships = Project_Internships::where('internship_id', $request->id);
            $internships = Internship::where('internship_id', $request->id);

            if ($academic_internships == null && $internships == null) {
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
            $academic_internships->delete();
            $internships->delete();
            return redirect()->route('admin.internship.index')->with('success', 'Xóa Thành Công');
        } catch (\Exception $e) {
            return redirect()->route('admin.internship.index')->with('fail', 'Xóa Thất Bại');
        }
    }


}
