@extends('layout.master')
@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="page-title" style="font-weight: bold; font-size: 200%;">Sinh viên</h3>
                            <form action="{{route('admin.internship.store')}}" novalidate method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="internship_id" value="{{isset($internship->internship_id) ? $internship->internship_id: ''}}">


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

                                    <div class="panel-body" >
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group">
                                                    <label>Tên Sinh viên *</label>
                                                    <input type="text" class="form-control" name="name"
                                                           value="{{isset($internship->name) ? old('name', $internship->name) : old('name')}}">
                                                    <p class="help-block text-danger"></p>
                                                    @if($errors->has('name'))
                                                        <p class="help-block text-danger">
                                                            {{ $errors->first('name') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group">
                                                    <label>Email *</label>
                                                    <input type="text" class="form-control" name="email"
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


                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group">
                                                    <label>Số điện thoại *</label>
                                                    <input type="text" class="form-control" name="phone"
                                                           value="{{isset($internship->phone) ? old('phone', $internship->phone) : old('phone')}}">
                                                    <p class="help-block text-danger"></p>
                                                    @if($errors->has('phone'))
                                                        <p class="help-block text-danger">
                                                            {{ $errors->first('phone') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group">
                                                    <label>Giới tính *</label>
                                                    <input type="text" class="form-control" name="gender"
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
                                                    <label>Địa chỉ hiện tại *</label>
                                                    <input type="text" class="form-control" name="addresscurrent"
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
                                                <div class="form-group col-md-6">
                                                    <div class="col-xs-12 form-group">
                                                        <label>Ngày Sinh *</label>
                                                        <input type="date" class="form-control "
                                                               name="birthday"
                                                               value="{{isset($internship->birthday) ? old('birthday', $internship->birthday) : old('birthday')}}">
                                                        <p class="help-block text-danger"></p>
                                                        @if($errors->has('birthday'))
                                                            <p class="help-block text-danger">
                                                                {{ $errors->first('birthday') }}
                                                            </p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="col-xs-12 form-group">
                                                        <label>CMND *</label>
                                                        <input type="text" class="form-control" name="cmnd"
                                                               value="{{isset($internship->cmnd) ? old('cmnd', $internship->cmnd) : old('cmnd')}}">
                                                        <p class="help-block text-danger"></p>
                                                        @if($errors->has('cmnd'))
                                                            <p class="help-block text-danger">
                                                                {{ $errors->first('cmnd') }}
                                                            </p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>


                                        <div class="row">


                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group">
                                                    <label>Ngày cấp *</label>
                                                    <input type="date" class="form-control" name="range_date"
                                                           value="{{isset($internship->range_date) ? old('range_date', $internship->range_date) : old('range_date')}}">
                                                    <p class="help-block text-danger"></p>
                                                    @if($errors->has('range_date'))
                                                        <p class="help-block text-danger">
                                                            {{ $errors->first('range_date') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                                <div class="form-group col-md-6">
                                                    <div class="col-xs-12 form-group">
                                                        <label>Nơi cấp *</label>
                                                        <input type="text" class="form-control" name="issued_by"
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
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group">
                                                    <label>Họ tên người thân *</label>
                                                    <input type="text" class="form-control" name="name_family"
                                                           value="{{isset($internship->name_family) ? old('name_family', $internship->name_family) : old('name_family')}}">
                                                    <p class="help-block text-danger"></p>
                                                    @if($errors->has('name_family'))
                                                        <p class="help-block text-danger">
                                                            {{ $errors->first('name_family') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group">
                                                    <label>Số điện thoại người thân *</label>
                                                    <input type="tel" class="form-control "
                                                           name="phone_family"
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

                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <div class="col-xs-12 form-group">
                                                    <label>Ngày bắt đầu *</label>
                                                    <input type="date" class="form-control" name="start_date"
                                                           value="{{isset($internship->start_date) ? old('start_date', $internship->start_date) : old('start_date')}}">
                                                    <p class="help-block text-danger"></p>
                                                    @if($errors->has('start_date'))
                                                        <p class="help-block text-danger">
                                                            {{ $errors->first('start_date') }}
                                                        </p>
                                                    @endif
                                                </div>


                                        </div>
                                            <div class="form-group col-md-4">
                                                <div class="col-xs-12 form-group">
                                                    <label>Ngày nộp *</label>
                                                    <input type="date" class="form-control" name="date_create" readonly
                                                           value="{{isset($internship->date_create) ? old('date_create', $internship->date_create) : old('date_create')}}">
                                                    <p class="help-block text-danger"></p>
                                                    @if($errors->has('date_create'))
                                                        <p class="help-block text-danger">
                                                            {{ $errors->first('date_create') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Image *</label>
                                                <div class="col-xs-12 form-group">
                                                    <input type="file" class="form-control" name="anh"  >
                                                    <input type="hidden" name="tenanh"  value="{{$internship->image}}">
                                                    <img src="{{URL::asset("images/internship/{$internship->image}")}}" style="width: 70px;height: 90px"
                                                       alt="error" />
                                                    <p class="help-block text-danger"></p>
                                                    @if($errors->has('image'))
                                                        <p class="help-block text-danger ">
                                                            {{ $errors->first('image') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group">
                                                    <label>Vị trí ứng tuyển *</label>
                                                    <input type="text" class="form-control" name="position" id="position"
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
                                                <label>
                                                    Trạng thái
                                                </label>
                                                <select class="form-control" name="status">
                                                    @foreach($status_internship as $status)
                                                    <option  value="{{$status}}" @if($internship->internship_id && $status==$internship->status) selected @endif>{{ucfirst(array_search($status,$status_internship))}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>



                                        <hr>
                                        <button class="btn btn-info">{{ __('general.save') }}</button>
                                        <a href="{{ route('admin.internship.index') }}"
                                           class="btn btn-default">{{ __('general.back') }}</a>
                                    </div>
                                </div>
                            </form>
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
