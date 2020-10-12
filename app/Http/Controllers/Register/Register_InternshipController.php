<?php


namespace App\Http\Controllers\Register;


use App\Model\Academic_Internships;
use App\Model\Academic_level;
use App\Model\Certificate;
use App\Model\Certificate_Internships;

use App\Model\Internship;

use App\Model\Language;
use App\Model\Languages_Internships;

use App\Model\Project;
use App\Model\Project_Internships;

use Illuminate\Http\Request;


class Register_InternshipController extends RegisterController
{
    public function dangky()
    {
        return view('register.register_internship');
    }


    public function register(Request $request)
    {
//dd($request->all());
        $internship = new Internship();
        $request['start_date'] = date('Y-m-d', strtotime($request->start_date));
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
        $internship->status = 0;
//   $internship->idtopic = null;
        $internship->end_date = null;
        $mytime = now()->toDateTimeString('Y-m-d H:i:s');
        $internship->date_create = $mytime;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName('image');
            $duoi = $file->getClientOriginalExtension('image');
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {//
                return redirect(route('admin.internship.dk'))->with('loi', 'Bạn chỉ được chọn file có đuôi .jpg .png .jpeg');
            }
            $file->move('images/internship', $name);
            $internship->image = $name;
        } else {
            $internship->image = "";
        }
        $internship->save();
        $collection = $request->list_dateschool;


        if (is_array($collection) || is_object($collection))
            foreach ($collection as $key => $value) {
                $collection = explode(",", $value);
                $degree = new Academic_level();
                $degree->dateshool = date('Y-m-d', strtotime($collection[0]));
                $degree->school = $collection[1];
                $degree->major = $collection[2];
                $degree->degree = $collection[3];
                $degree->loai = $collection[4];
                $degree->save();
                $academic_internships = new Academic_Internships();
                $academic_internships->internship_id = $internship->internship_id;
                $academic_internships->academic_id = $degree->academic_id;
                $academic_internships->save();
                print_r($value);
            }
        else {
            $degree = new Academic_level();
            $degree->dateshool = null;
            $degree->school = null;
            $degree->major = null;
            $degree->degree = null;
            $degree->loai = null;
            $degree->save();
            $academic_internships = new Academic_Internships();
            $academic_internships->internship_id = $internship->internship_id;
            $academic_internships->academic_id = $degree->academic_id;
            $academic_internships->save();
        }
//chứng chỉ
        $chungchi = $request->list_datecc;


        if (is_array($chungchi) || is_object($chungchi)) {
            foreach ($chungchi as $key => $value) {
                $chungchi = explode(",", $value);
                $certificate = new Certificate();
                $certificate->name_certificate = $chungchi[1];
                $certificate->training_places = $chungchi[2];
                $certificate->score = $chungchi[3];
                $certificate->date_cc = date('Y-m-d', strtotime($chungchi[0]));
                $certificate->save();
                $certificate_internships = new Certificate_Internships();
                $certificate_internships->internship_id = $internship->internship_id;
                $certificate_internships->certificate_id = $certificate->certificate_id;
                $certificate_internships->save();
                print_r($value);
            }
        } else {
            $certificate = new Certificate();
            $certificate->name_certificate = null;
            $certificate->training_places = null;
            $certificate->score = null;
            $certificate->date_cc = null;
            $certificate->save();
            $certificate_internships = new Certificate_Internships();
            $certificate_internships->internship_id = $internship->internship_id;
            $certificate_internships->certificate_id = $certificate->certificate_id;
            $certificate_internships->save();
        }
//du an
        $duan = $request->list_datesproject;

        if (is_array($duan) || is_object($duan)) {
            foreach ($duan as $key => $value) {
                $duan = explode(",", $value);
                $project = new Project();
                $project->name_project = $duan[1];
                $project->name_company = $duan[2];
                $project->content_job = $duan[3];
                $project->date_project = date('Y-m-d', strtotime($duan[0]));
                $project->save();
                $project_internships = new Project_Internships();
                $project_internships->internship_id = $internship->internship_id;
                $project_internships->project_id = $project->project_id;
                $project_internships->save();
                print_r($value);
            }
        } else {

            $project = new Project();
            $project->name_project = null;
            $project->name_company = null;
            $project->content_job = null;
            $project->date_project = null;
            $project->save();

            $project_internships = new Project_Internships();
            $project_internships->internship_id = $internship->internship_id;
            $project_internships->project_id = $project->project_id;
            $project_internships->save();
        }
//        //ngon ngu
        $ngonngu = $request->list_dateslanguage;
        if (is_array($ngonngu) || is_object($ngonngu)) {
            foreach ($ngonngu as $key => $value) {
                $ngonngu = explode(",", $value);
                $language = new Language();
                $language->language_name = $ngonngu[0];
                $language->listen = $ngonngu[1];
                $language->speak = $ngonngu[2];
                $language->read = $ngonngu[3];
                $language->write = $ngonngu[4];
                $language->save();
                $languages_internships = new Languages_Internships();
                $languages_internships->internship_id = $internship->internship_id;
                $languages_internships->languages_id = $language->languages_id;
                $languages_internships->save();
            }
        } else {
            $language = new Language();
            $language->language_name = null;
            $language->listen = null;
            $language->speak = null;
            $language->read = null;
            $language->write = null;
            $language->save();
            $languages_internships = new Languages_Internships();
            $languages_internships->internship_id = $internship->internship_id;
            $languages_internships->languages_id = $language->languages_id;
            $languages_internships->save();
        }
        try {


            return redirect(route('register.internship.dang_ky'))->with('success', 'Chúc mừng bạn nộp thông tin ứng tuyển thành công');
        } catch (\Exception $e) {
            // echo($e);
//            return response()->json(['message' => 'Fail', 'status' => 0]);
            return redirect(route('register.internship.dang_ky'))->with('fail', 'Nộp thông tin ứng tuyển thất bại');

        }
// return array($request->all());
//return response()->json($request->all());
    }
}
