@extends('layout.resgiter')
@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{URL::asset('css/internship.css')}}"/>
<style>
    h3,h4,h5{
        font-family: Roboto !important;
        font-size: 1rem;
    }
</style>
@stop

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div style="margin-left: 130px; !important;margin-right: 130px;">

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <div class="col-xs-12 form-group" style="display: flex">
                                            <img alt=""
                                                 src="https://www.hoatech.vn/wp-content/uploads/2015/06/005.png"
                                                 style="width: 120px; height: 101.20px; margin-left: -0.00px; margin-top: -0.00px; transform: rotate(0.00rad) translateZ(0px); -webkit-transform: rotate(0.00rad) translateZ(0px);"
                                                 title="">
                                            <div style="padding-left: 5px; margin-top: 20px;">
                                                <h3 class="page-title"
                                                    style="font-weight: bold;">
                                                    Đăng Ký Thực Tập Sinh</h3>
                                                <h5 style=" font-weight: bold ;font-size: 1rem">CÔNG TY TNHH TMDV HOA
                                                    TECHNOLOGY
                                                </h5>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6" style="padding-left: 20%">
                                        <div class="col-xs-12 form-group">
                                            <div class="infor-contact">
                                                <div class="address info">
                                                    <i class="fa fa-home"></i>
                                                    <span>Lô 09, Tòa nhà 4S Riverside Garden, Đường số 17, Hiệp Bình Chánh, Thủ Đức, TPHCM</span>
                                                </div>
                                                <div class="phone info">
                                                    <i class="fa fa-phone"></i>
                                                    <span>0868856175</span> - <i class="fa fa-envelope-square" style="margin-left: 2px"></i> <span>contact@hoatech.vn</span>
                                                </div>
                                                <div class="website info">
                                                    <i class="fa fa-globe"></i>
                                                    <span><a style="color: #333;" href="https://www.hoatech.vn/"
                                                             target="_blank">https://www.hoatech.vn/</a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br/>
                                <h3 class="page-title"
                                    style="font-weight: bold; border-radius: 4px; font-size: 1.5rem;background-image: linear-gradient(to top, rgb(22 ,138, 106), #28a745);color: white; text-align: center; border: 1px solid #28a745">
                                    THÔNG TIN ỨNG TUYỂN</h3>
                                <br/>
                                <form method="POST" action="{{route('register.internship.register')}}"
                                      class="needs-validation" enctype="multipart/form-data" id="form_dk" style="border: 1px solid #28a745;border-radius: 4px; padding: 0.5rem">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}" id="_token"/>
                                    <input type="hidden" name="id"
                                           value="{{isset($internship->id) ? $internship->id: ''}}">

                                    <div class="row">
                                        @if(session('success'))
                                            <div class="alert alert-success">
                                                {{session('success')}}
                                            </div>
                                        @endif
                                        @if(session('fail'))
                                            <div class="alert alert-danger">
                                                {{session('fail')}}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="panel panel-default">

                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <div class="col-xs-12 form-group">
                                                        <label>Vị trí ứng tuyển *</label>
                                                        <input type="text" class="form-control "
                                                               name="position" id="position" required
                                                               value="{{isset($internship->position) ? old('position', $internship->position) : old('position')}}">
                                                        <p class="help-block text-danger"></p>
                                                        @if($errors->has('position'))
                                                            <p class="help-block text-danger">
                                                                {{ $errors->first('position') }}
                                                            </p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="col-xs-12 form-group">
                                                        <label>Ngày Bắt Đầu *</label>
                                                        <input type="date" id="start_date" class="form-control"
                                                               name="start_date" required
                                                               value="{{isset($internship->start_date) ? old('end_date', $internship->start_date) : old('start_date')}}">
                                                        <p class="help-block text-danger"></p>
                                                        @if($errors->has('start_date'))
                                                            <p class="help-block text-danger">
                                                                {{ $errors->first('start_date') }}
                                                            </p>
                                                        @endif
                                                    </div>
                                                </div>

                                            </div>
                                            <h4 STYLE="text-align: center;background-image: linear-gradient(to top, rgb(22 ,138, 106), #28a745);">THÔNG TIN CÁ NHÂN</h4>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label>Image *</label>
                                                    <div class="col-xs-12 form-group">
                                                        <input type="file" name="image" id="image" class="form-control"
                                                               required>
                                                        <div class="show-progress">

                                                        </div>

                                                        <p class="help-block text-danger"></p>
                                                        @if($errors->has('image'))
                                                            <p class="help-block text-danger">
                                                                {{ $errors->first('image') }}
                                                            </p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">

                                                    <div class="col-xs-12 form-group">
                                                        <label>Email *</label>
                                                        <input type="text" class="form-control" name="email" id="email"
                                                               required
                                                               value="{{isset($internship->email) ? old('email', $internship->email) : old('email')}}">
                                                        <p class="help-block text-danger"></p>
                                                        @if($errors->has('email'))
                                                            <p class="help-block text-danger">
                                                                {{ $errors->first('email') }}
                                                            </p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="infor">
                                                <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <div class="col-xs-12 form-group">
                                                            <label>Tên Sinh viên *</label>
                                                            <input type="text" class="form-control" name="name" required
                                                                   id="name"
                                                                   value="">
                                                            <p class="help-block text-danger"></p>
                                                            @if($errors->has('name'))
                                                                <p class="help-block text-danger">
                                                                    {{ $errors->first('name') }}
                                                                </p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <div class="col-xs-12 form-group">
                                                            <label>Ngày Sinh *</label>
                                                            <input type="date" class="form-control "
                                                                   name="birthday" id="birthday"
                                                                   value="{{isset($internship->birthday) ? old('birthday', $internship->birthday) : old('birthday')}}"
                                                                   required>
                                                            <p class="help-block text-danger"></p>
                                                            @if($errors->has('birthday'))
                                                                <p class="help-block text-danger">
                                                                    {{ $errors->first('birthday') }}
                                                                </p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <div class="col-xs-12 form-group">
                                                            <label>Giới tính *</label>
                                                            <input type="text" class="form-control " required
                                                                   name="gender" id="gender"
                                                                   value="{{isset($internship->gender) ? old('gender', $internship->gender) : old('gender')}}">
                                                            <p class="help-block text-danger"></p>
                                                            @if($errors->has('gender'))
                                                                <p class="help-block text-danger">
                                                                    {{ $errors->first('gender') }}
                                                                </p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <div class="col-xs-12 form-group">
                                                            <label>Địa chỉ *</label>
                                                            <input type="text" class="form-control" name="address"
                                                                   required
                                                                   id="address"
                                                                   value="{{isset($internship->address) ? old('address', $internship->address) : old('address')}}">
                                                            <p class="help-block text-danger"></p>
                                                            @if($errors->has('address'))
                                                                <p class="help-block text-danger">
                                                                    {{ $errors->first('address') }}
                                                                </p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <div class="col-xs-12 form-group">
                                                            <label>Nơi ở hiện tại *</label>
                                                            <input type="text" class="form-control" required
                                                                   name="addresscurrent" id="addresscurrent"
                                                                   value="{{isset($internship->addresscurrent) ? old('addresscurrent', $internship->addresscurrent) : old('addresscurrent')}}">
                                                            <p class="help-block text-danger"></p>
                                                            @if($errors->has('addresscurrent'))
                                                                <p class="help-block text-danger">
                                                                    {{ $errors->first('addresscurrent') }}
                                                                </p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <div class="col-xs-12 form-group">
                                                            <label>CMND *</label>
                                                            <input type="text" class="form-control" name="cmnd" required
                                                                   id="cmnd"
                                                                   value="{{isset($internship->cmnd) ? old('cmnd', $internship->cmnd) : old('cmnd')}}">
                                                            <p class="help-block text-danger"></p>
                                                            @if($errors->has('cmnd'))
                                                                <p class="help-block text-danger">
                                                                    {{ $errors->first('cmnd') }}
                                                                </p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <div class="col-xs-12 form-group">
                                                            <label>Ngày cấp *</label>
                                                            <input type="date" class="form-control" name="range_date"
                                                                   required
                                                                   id="range_date"
                                                                   value="{{isset($internship->range_date) ? old('range_date', $internship->range_date) : old('range_date')}}">
                                                            <p class="help-block text-danger"></p>
                                                            @if($errors->has('range_date'))
                                                                <p class="help-block text-danger">
                                                                    {{ $errors->first('range_date') }}
                                                                </p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <div class="col-xs-12 form-group">
                                                            <label>Nơi cấp *</label>
                                                            <input type="text" class="form-control" name="issued_by"
                                                                   required
                                                                   id="issued_by"
                                                                   value="{{isset($internship->issued_by) ? old('issued_by', $internship->issued_by) : old('issued_by')}}">
                                                            <p class="help-block text-danger"></p>
                                                            @if($errors->has('issued_by'))
                                                                <p class="help-block text-danger">
                                                                    {{ $errors->first('issued_by') }}
                                                                </p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <div class="col-xs-12 form-group">
                                                            <label>Số điện thoại *</label>
                                                            <input type="tel" class="form-control" name="phone" required
                                                                   id="phone"
                                                                   value="{{isset($internship->phone) ? old('phone', $internship->phone) : old('phone')}}">
                                                            <p class="help-block text-danger"></p>
                                                            @if($errors->has('phone'))
                                                                <p class="help-block text-danger">
                                                                    {{ $errors->first('phone') }}
                                                                </p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <div class="col-xs-12 form-group">
                                                            <label>Họ tên người thân *</label>
                                                            <input type="text" class="form-control" name="name_family"
                                                                   required
                                                                   id="name_family"
                                                                   value="{{isset($internship->name_family) ? old('name_family', $internship->name_family) : old('name_family')}}">
                                                            <p class="help-block text-danger"></p>
                                                            @if($errors->has('name_family'))
                                                                <p class="help-block text-danger">
                                                                    {{ $errors->first('name_family') }}
                                                                </p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <div class="col-xs-12 form-group">
                                                            <label>Số điện thoại người thân *</label>
                                                            <input type="tel" class="form-control" name="phone_family"
                                                                   required
                                                                   id="phone_family"
                                                                   value="{{isset($internship->phone_family) ? old('phone_family', $internship->phone_family) : old('phone_family')}}">
                                                            <p class="help-block text-danger"></p>
                                                            @if($errors->has('phone_family'))
                                                                <p class="help-block text-danger">
                                                                    {{ $errors->first('phone_family') }}
                                                                </p>
                                                            @endif
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                            <h4 style="text-align: center;background-image: linear-gradient(to top, rgb(22 ,138, 106), #28a745);">TRÌNH ĐỘ HỌC VẤN</h4>
                                            <h4 style="text-align: center;background-image: linear-gradient(to top, rgb(22 ,138, 106), #28a745);">BẰNG CẤP</h4>
                                            <div class="tdhv">
                                                <div class="row">

                                                    <div class="form-group col-md-2">
                                                        <div class="col-xs-12 form-group">
                                                            <label>Thời gian *</label>
                                                            <input type="date" class="form-control" name="dateschool"
                                                                   required
                                                                   id="dateschool"
                                                                   value="{{isset($internship->dateschool) ? old('dateschool', $internship->dateschool) : old('dateschool')}}">
                                                            <p class="help-block text-danger"></p>
                                                            @if($errors->has('dateschool'))
                                                                <p class="help-block text-danger">
                                                                    {{ $errors->first('dateschool') }}
                                                                </p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-3">
                                                        <div class="col-xs-12 form-group">
                                                            <label>Trường *</label>
                                                            <input type="text" class="form-control" name="school"
                                                                   required
                                                                   id="school"
                                                                   value="{{isset($internship->school) ? old('school', $internship->school) : old('school')}}">
                                                            <p class="help-block text-danger"></p>
                                                            <div class="invalid-feedback">
                                                                Please enter a valid school.
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-3">
                                                        <div class="col-xs-12 form-group">
                                                            <label>Chuyên ngành *</label>
                                                            <input type="text" class="form-control" name="major"
                                                                   required
                                                                   id="major"
                                                                   value="{{isset($internship->major) ? old('major', $internship->major) : old('major')}}">
                                                            <p class="help-block text-danger"></p>
                                                            <div class="invalid-feedback">
                                                                Please enter a valid major.
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="form-group col-md-2">
                                                        <label>Bằng cấp *</label>
                                                        <div class="col-xs-12 form-group">
                                                            <input type="text" name="degree" id="degree" required
                                                                   class="form-control">

                                                            <p class="help-block text-danger "></p>

                                                            <div class="invalid-feedback">
                                                                Please enter a valid degree.
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>Xếp loại *</label>
                                                        <div class="col-xs-12 form-group">
                                                            <select name="loai" id="loai">

                                                                <option selected="selected" value="1">Xuất sắc</option>
                                                                <option value="2">Giỏi</option>
                                                                <option value="3">Khá</option>
                                                                <option value="4">Trung bình - khá</option>
                                                                <option value="5">Trung bình</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row event" STYLE="float: right;margin-right: 0.5rem;margin-bottom: 5px">
                                                    <a id="bt" class="btn btn-primary eventadd" value="Create">Thêm</a>
                                                </div>
                                            </div>
                                            <BR/> <br/>
                                            <div class="chitiettdhv">
                                                <div class="content-content">
                                                    <h4 style="text-align: center;background-image: linear-gradient(to top, rgb(22 ,138, 106), #28a745);">CHI TIẾT BẰNG CẤP</h4>
                                                    <table id="tb_tdhv" class="table table-hover tm-table-small ">
                                                        <tr>
                                                            <th scope="col"></th>
                                                            <th scope="col">Thời gian</th>
                                                            <th scope="col">Tên trường</th>
                                                            <th scope="col">Chuyên ngành</th>
                                                            <th scope="col">Bằng cấp</th>
                                                            <th scope="col">Xếp loại</th>
                                                        </tr>

                                                    </table>
                                                </div>

                                            </div>


                                            <h4 style="text-align: center;background-image: linear-gradient(to top, rgb(22 ,138, 106), #28a745);">CHỨNG CHỈ</h4>
                                            <div class="chungchi">
                                                <div class="row">
                                                    <div class="form-group col-md-3">
                                                        <label>Thời gian </label>
                                                        <div class="col-xs-12 form-group">
                                                            <input type="date" name="date_cc" id="date_cc"
                                                                   class="form-control">

                                                            <p class="help-block text-danger"></p>
                                                            @if($errors->has('date_cc'))
                                                                <p class="help-block text-danger">
                                                                    {{ $errors->first('date_cc') }}
                                                                </p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label>Tên chứng chỉ</label>
                                                        <div class="col-xs-12 form-group">
                                                            <input type="text" name="name_certificate"
                                                                   id="name_certificate" class="form-control">
                                                            <p class="help-block text-danger"></p>
                                                            @if($errors->has('name_certificate'))
                                                                <p class="help-block text-danger">
                                                                    {{ $errors->first('name_certificate') }}
                                                                </p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-3">
                                                        <label>Nơi đào tạo</label>
                                                        <div class="col-xs-12 form-group">
                                                            <input type="text" name="training_places"
                                                                   id="training_places" class="form-control">

                                                            <p class="help-block text-danger"></p>
                                                            @if($errors->has('training_places'))
                                                                <p class="help-block text-danger">
                                                                    {{ $errors->first('training_places') }}
                                                                </p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label>Điểm/Xếp loại</label>
                                                        <div class="col-xs-12 form-group">
                                                            <input type="number" name="score" id="score"
                                                                   class="form-control" step="0.00001">

                                                            <p class="help-block text-danger"></p>
                                                            @if($errors->has('score'))
                                                                <p class="help-block text-danger">
                                                                    {{ $errors->first('score') }}
                                                                </p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row event" STYLE="float: right;margin-right: 0.5rem ">
                                                    <a id="btcc" class="btn btn-primary eventadd"
                                                       value="Create">Thêm</a>
                                                </div>
                                                <BR/>
                                            </div>
                                            <br/>

                                            <div class="chitietcc">
                                                <div class="content-content">
                                                    <h4 style="text-align: center;background-image: linear-gradient(to top, rgb(22 ,138, 106), #28a745);">CHI TIẾT CHỨNG CHỈ</h4>
                                                    <table id="tb_ctcc" class="table table-hover tm-table-small ">
                                                        <tr>
                                                            <th scope="col">&nbsp;</th>
                                                            <th scope="col">Thời gian</th>
                                                            <th scope="col">Tên chứng chỉ</th>
                                                            <th scope="col">Nới đào tạo</th>

                                                            <th scope="col">Điểm/Xếp loại</th>
                                                        </tr>

                                                    </table>
                                                </div>

                                            </div>


                                            <h4 style="text-align: center;background-image: linear-gradient(to top, rgb(22 ,138, 106), #28a745);">DỰ ÁN ĐÃ THỰC HIỆN</h4>
                                            <div class="chungchi">
                                                <div class="row">
                                                    <div class="form-group col-md-3">
                                                        <label>Thời gian </label>
                                                        <div class="col-xs-12 form-group">
                                                            <input type="date" name="date_project" id="date_project"
                                                                   class="form-control">

                                                            <p class="help-block text-danger"></p>
                                                            @if($errors->has('date_project'))
                                                                <p class="help-block text-danger">
                                                                    {{ $errors->first('date_project') }}
                                                                </p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label>Tên dự án</label>
                                                        <div class="col-xs-12 form-group">
                                                            <input type="text" name="name_project" id="name_project"
                                                                   class="form-control">
                                                            <p class="help-block text-danger"></p>
                                                            @if($errors->has('name_project'))
                                                                <p class="help-block text-danger">
                                                                    {{ $errors->first('name_project') }}
                                                                </p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-3">
                                                        <label>Tên công ty</label>
                                                        <div class="col-xs-12 form-group">
                                                            <input type="text" name="name_company" id="name_company"
                                                                   class="form-control">

                                                            <p class="help-block text-danger"></p>
                                                            @if($errors->has('name_company'))
                                                                <p class="help-block text-danger">
                                                                    {{ $errors->first('name_company') }}
                                                                </p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label>Nội dung công việc</label>
                                                        <div class="col-xs-12 form-group">
                                                            <input type="text" name="content_job" id="content_job"
                                                                   class="form-control">

                                                            <p class="help-block text-danger"></p>
                                                            @if($errors->has('content_job'))
                                                                <p class="help-block text-danger">
                                                                    {{ $errors->first('content_job') }}
                                                                </p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row event" STYLE="float: right;margin-right: 0.5rem">
                                                    <a id="btda" class="btn btn-primary eventadd"
                                                       value="Create">Thêm</a>
                                                </div>
                                                <BR/>
                                            </div>
                                            <br/>

                                            <div class="chitietcc">
                                                <div class="content-content">
                                                    <h4 style="text-align: center;background-image: linear-gradient(to top, rgb(22 ,138, 106), #28a745);">CHI TIẾT DỰ ÁN</h4>
                                                    <table id="tb_ctda" class="table table-hover tm-table-small ">
                                                        <tr>
                                                            <th scope="col">&nbsp;</th>
                                                            <th scope="col">Thời gian</th>
                                                            <th scope="col">Tên dự án</th>
                                                            <th scope="col">Tên công ty</th>

                                                            <th scope="col">Nội dung công việc</th>
                                                        </tr>

                                                    </table>
                                                </div>

                                            </div>


                                            <h4 style="text-align: center;background-image: linear-gradient(to top, rgb(22 ,138, 106), #28a745);">NGOẠI NGỮ</h4>
                                            <div class="ngoaingu">
                                                <div class="row">
                                                    <div class="form-group col-md-2">
                                                        <label>Ngoại ngữ </label>
                                                        <div class="col-xs-12 form-group">
                                                            <input type="text" name="language_name" id="language_name"
                                                                   class="form-control">

                                                            <p class="help-block text-danger"></p>
                                                            @if($errors->has('language_name'))
                                                                <p class="help-block text-danger">
                                                                    {{ $errors->first('language_name') }}
                                                                </p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label>Nghe</label>
                                                        <div class="col-xs-12 form-group">
                                                            <input type="text" name="listen" id="listen"
                                                                   class="form-control">
                                                            <p class="help-block text-danger"></p>
                                                            @if($errors->has('listen'))
                                                                <p class="help-block text-danger">
                                                                    {{ $errors->first('listen') }}
                                                                </p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-3">
                                                        <label>Nói</label>
                                                        <div class="col-xs-12 form-group">
                                                            <input type="text" name="speak" id="speak"
                                                                   class="form-control">

                                                            <p class="help-block text-danger"></p>
                                                            @if($errors->has('speak'))
                                                                <p class="help-block text-danger">
                                                                    {{ $errors->first('speak') }}
                                                                </p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>Đọc</label>
                                                        <div class="col-xs-12 form-group">
                                                            <input type="text" name="read" id="read"
                                                                   class="form-control">

                                                            <p class="help-block text-danger"></p>
                                                            @if($errors->has('read'))
                                                                <p class="help-block text-danger">
                                                                    {{ $errors->first('read') }}
                                                                </p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>Viết</label>
                                                        <div class="col-xs-12 form-group">
                                                            <input type="text" name="write" id="write"
                                                                   class="form-control">

                                                            <p class="help-block text-danger"></p>
                                                            @if($errors->has('write'))
                                                                <p class="help-block text-danger">
                                                                    {{ $errors->first('write') }}
                                                                </p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row event" STYLE="float: right;margin-right: 0.5rem">
                                                    <a id="btnn" class="btn btn-primary eventadd"
                                                       value="Create">Thêm</a>
                                                </div>

                                            </div>

                                            <br/>
                                            <br/>
                                            <div class="chitietnn">
                                                <div class="content-content">
                                                    <h4 style="text-align: center;background-image: linear-gradient(to top, rgb(22 ,138, 106), #28a745);">CHI TIẾT NGOẠI NGỮ</h4>
                                                    <table id="tb_ctnn" class="table table-hover tm-table-small ">
                                                        <tr>
                                                            <th scope="col">&nbsp;</th>
                                                            <th scope="col">Ngoại ngữ</th>
                                                            <th scope="col">Nghe</th>
                                                            <th scope="col">Nói</th>
                                                            <th scope="col">Đọc</th>
                                                            <th scope="col">Viết</th>
                                                        </tr>

                                                    </table>
                                                </div>

                                            </div>
                                            <p>Tôi xin cam đoan những thông tin trên là đúng</p>

                                            <hr>
                                            <button id="submit" class="btn btn-info">Nộp</button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@stop
@section('javascript')

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script>
        window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script>
    <script src="/docs/4.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous">
    </script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict'

            window.addEventListener('load', function () {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation')

                // Loop over them and prevent submission
                Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
            }, false)
        }())
    </script>

    <script>


        $(document).ready(function () {

            var i = 1;
            var list_tdhv = []
            $('#bt').click(function () {
                let tdhv = {
                    id: i,
                    thoigian: $('#dateschool').val(),
                    truong: $('#school').val(),
                    chuyennganh: $('#major').val(),
                    bangcap: $('#degree').val(),
                    loai: $('#loai').val(),
                    nameloai: $('#loai option:selected').text(),
                };
                list_tdhv.push(tdhv);
                message = "<tr><td><a class='remove' id =" + tdhv.id + "><i class='fa fa-trash'></i></a></td><td> " +
                    "<input class='list_dateschool' type='hidden' name='list_dateschool[]' " +
                    "value='" + tdhv.thoigian + "," + tdhv.truong + "," + tdhv.chuyennganh + "," + tdhv.bangcap + "," + tdhv.nameloai + "'>"
                    + tdhv.thoigian + "</td><td>" + tdhv.truong + "</td><td>" + tdhv.chuyennganh + "</td><td>" + tdhv.bangcap + "</td><td>" + tdhv.nameloai + "</td></tr>";

                $('#tb_tdhv').append(message);

                i++;

            })
            console.log(list_tdhv);
            $("#tb_tdhv").on("click", ".remove", function () {
                z = list_tdhv.findIndex(obj => obj.id == $(this).attr("id"));
                list_tdhv.splice(z, 1);
                $(this).closest("tr").remove();
            });

            var list_cc = []
            $('#btcc').click(function () {
                let chungchi = {
                    id: i,
                    thoigian: $('#date_cc').val(),
                    tenchungchi: $('#name_certificate').val(),
                    noidaotao: $('#training_places').val(),
                    diem: $('#score').val(),
                }
                list_cc.push(chungchi);
                message = "<tr><td><a class='remove' id =" + chungchi.id + "><i class='fa fa-trash'></i></a></td><td>" +
                    "<input class='list_datescc' type='hidden' name='list_datecc[]' " +
                    "value='" + chungchi.thoigian + "," + chungchi.tenchungchi + "," + chungchi.noidaotao + "," + chungchi.diem + "'>"
                    + chungchi.thoigian + "</td><td>" + chungchi.tenchungchi + "</td><td>" + chungchi.noidaotao + "</td><td>" + chungchi.diem + "</td></tr>";
                $('#tb_ctcc').append(message);
                i++;
            })
            $("#tb_ctcc").on("click", ".remove", function () {
                z = listcc.findIndex(obj => obj.id == $(this).attr("id"));
                listcc.splice(z, 1);
                $(this).closest("tr").remove();
            });
            var list_project = []
            $('#btda').click(function () {
                let project = {
                    id: i,
                    thoigian: $('#date_project').val(),
                    tenduan: $('#name_project').val(),
                    tencongty: $('#name_company').val(),
                    noidung: $('#content_job').val(),
                }
                list_project.push(project);
                console.log(list_project);
                message = "<tr><td><a class='remove' id =" + project.id + "><i class='fa fa-trash'></i></a></td><td>"
                    + "<input class='list_datesproject' type='hidden' name='list_datesproject[]' " +
                    "value='" + project.thoigian + "," + project.tenduan + "," + project.tencongty + "," + project.noidung + "'>"
                    + project.thoigian + "</td><td>" + project.tenduan + "</td><td>" + project.tencongty + "</td><td>" + project.noidung + "</td></tr>";
                $('#tb_ctda').append(message);
                i++;
            })

            $("#tb_ctda").on("click", ".remove", function () {
                z = list_project.findIndex(obj => obj.id == $(this).attr("id"));
                list_project.splice(z, 1);
                $(this).closest("tr").remove();
            });

            var list_nn = [];
            $('#btnn').click(function () {
                var ngoaingu = {
                    id: i,
                    ngoainguname: $('#language_name').val(),
                    nghe: $('#listen').val(),
                    noi: $('#speak').val(),
                    doc: $('#read').val(),
                    viet: $('#write').val(),
                };

                list_nn.push(ngoaingu);

                message = "<tr><td><a class='remove' id =" + ngoaingu.id + "><i class='fa fa-trash'></i></a></td><td>"
                    + "<input class='list_dateslanguage' type='hidden' name='list_dateslanguage[]' " +
                    "value='" + ngoaingu.ngoainguname + "," + ngoaingu.nghe + "," + ngoaingu.noi + "," + ngoaingu.doc + "," + ngoaingu.viet + "'>"
                    + ngoaingu.ngoainguname + "</td><td>" + ngoaingu.nghe + "</td><td>" + ngoaingu.noi + "</td><td>" + ngoaingu.doc + "</td><td>" + ngoaingu.viet + "</td></tr>";
                $('#tb_ctnn').append(message);
                i++;
            })

            $("#tb_ctnn").on("click", ".remove", function () {
                z = list_nn.findIndex(obj => obj.id === $(this).attr("id"));
                list_nn.splice(z, 1);
                $(this).closest("tr").remove();
            });

        });


    </script>
@stop
