@extends('layout.master')
@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="page-title" style="font-weight: bold;  font-size: 200%;">Nhân Viên</h3>
                            <form action="{{route('admin.staffs.store')}}" method="post">
                                <input type="hidden" name="id" value="{{isset($staff->id) ? $staff->id: ''}}">
                                @csrf
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
                                    {{--                                    <div class="panel-heading">--}}
                                    {{--                                        {{ __('general.create') }}--}}
                                    {{--                                    </div>--}}

                                    <div class="panel-body" >
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group">
                                                    <label>Staff Name <span class="aster">*</span></label>
                                                    <input type="text" class="form-control" name="name"
                                                           value="{{isset($staff->name) ? old('name', $staff->name) : old('name')}}">
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
                                                    <label>Address <span class="aster">*</span></label>
                                                    <input type="text" class="form-control" name="address"
                                                           value="{{isset($staff->address) ? old('address', $staff->address) : old('address')}}">
                                                    <p class="help-block text-danger"></p>
                                                    @if($errors->has('address'))
                                                        <p class="help-block text-danger">
                                                            {{ $errors->first('address') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group">
                                                    <label>Email <span class="aster">*</span></label>
                                                    <input type="text" class="form-control" name="email"
                                                           value="{{isset($staff->email) ? old('email', $staff->email) : old('email')}}">
                                                    <p class="help-block text-danger"></p>
                                                    @if($errors->has('email'))
                                                        <p class="help-block text-danger">
                                                            {{ $errors->first('email') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group">
                                                    <label>Birthday <span class="aster">*</span></label>
                                                    <input type="text" class="form-control dateTimeBirthday" name="birthday"
                                                           value="{{isset($staff->birthday) ? old('birthday', $staff->birthday) : old('birthday')}}">
                                                    <p class="help-block text-danger"></p>
                                                    @if($errors->has('birthday'))
                                                        <p class="help-block text-danger">
                                                            {{ $errors->first('birthday') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group">
                                                    <label>Phone Number <span class="aster">*</span></label>
                                                    <input type="text" class="form-control" name="phone_number"
                                                           value="{{isset($staff->phone_number) ? old('phone_number', $staff->phone_number) : old('phone_number')}}">
                                                    <p class="help-block text-danger"></p>
                                                    @if($errors->has('phone_number'))
                                                        <p class="help-block text-danger">
                                                            {{ $errors->first('phone_number') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group">
                                                    <label for="type_staff">Chọn loại nhân viên:</label>
                                                    <select class="mdb-select colorful-select dropdown-info mx-2" name="type_staff" id="type_staff" >
                                                        <option value="" disabled selected>Chọn loại cho nhân viên</option>
                                                        @foreach($type as $i)

                                                        <option value="{{$i->id}}">{{$i->name}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">

                                            </div>
                                        </div>
                                        <hr>
                                        <button class="btn btn-primary">{{ __('general.save') }}</button>
                                        <a href="{{ route('admin.staffs.index') }}" class="btn btn-default">{{ __('general.back') }}</a>

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
