<?php

namespace App\Http\Controllers\Admin;

use App\Business\InternshipLogic;
use App\Business\RegisterServicesLogic;
use App\Models\Academic_Internships;
use App\Models\Academic_level;
use App\Models\Certificate;
use App\Models\Certificate_Internships;
use App\Models\ConstantsModel;
use App\Models\Customer;
use App\Models\Internship;
use App\Models\InternshipTopic;
use App\Models\Language;
use App\Models\Languages_Internships;
use App\Models\Level_internships;
use App\Models\Project;
use App\Models\Project_Internships;
use App\Models\RegisterService;
use Aws\Api\Parser\JsonParser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Array_;

class InternshipController extends AdminController
{

    public function index(Request $request)
    {
        $this->authorize('internship-access');

        $key = isset($request->key) ? $request->key : '';
        $internship = new Internship();
        $internship_Schools = $internship->getAll($key, 10);

        if (isset($request->amount)) {
            $internship_Schools = $internship->getAll($key, $request->amount);
        }
        $status_internship = ConstantsModel::STATUS_INTERNSHIP;

        $topic = DB::table('topics')->get();
        return view('admin.internship.index', compact('internship_Schools', 'topic', 'status_internship'));
    }

    public function searchRow(Request $request)
    {
        $internship = new Internship();
        $internship_Schools = $internship->getAll($request->key, 10);

        if (isset($request->amount)) {
            $internship_Schools = $internship->getAll($request->key, $request->amount);
        }
        $status_internship = ConstantsModel::STATUS_INTERNSHIP;

        $topic = DB::table('topics')->get();
        return view('admin.internship.search-row', compact('internship_Schools', 'topic', 'status_internship'));
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
            $duoi = strtolower($file->getClientOriginalExtension('anh'));

            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
                return redirect(route('admin.internship.create'))->with('loi', 'Bạn chỉ được chọn file có đuôi .jpg .png .jpeg');
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
    public function destroySelect(Request $request)
    {
        try {
            $allVals = explode(',', $request->allValsDelete[0]);
            if($allVals[0]!=="") {
                foreach ($allVals as $item) {
                    $academic_internships = Academic_Internships::where('internship_id', $item);
                    $certificate_internships = Certificate_Internships::where('internship_id', $item);
                    $languages_internships = Languages_Internships::where('internship_id',$item);
                    $project_internships = Project_Internships::where('internship_id', $item);
                    $internships = Internship::where('internship_id', $item);
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
