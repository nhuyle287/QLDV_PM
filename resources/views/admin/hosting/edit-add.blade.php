@extends('layout.master')
@section('title')
    Hosting
@stop
@section('head')
    <link rel="stylesheet" href="{{ asset('../css/responsive.css') }}">
@stop
@section('content')

    <section class="body-content">
        <div class="card">

            <div class="card-header card-header-new">
               Tạo/Cập nhật hosting
            </div>
            <div class="card-body">
                <form action="{{route('admin.hostings.store')}}" method="post">
                    <input type="hidden" name="id" value="{{isset($hosting->id) ? $hosting->id: ''}}">
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
                        <div class="panel-heading">

                        </div>

                        <div class="panel-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group">
                                        <label>Tên Hosting <span class="aster">*</span></label>
                                        <input type="text" class="form-control" name="name"
                                               value="{{isset($hosting->name) ? old('name', $hosting->name) : old('name')}}">
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
                                        <label>Giá <span class="aster">*</span></label>
                                        <input type="text" class="form-control" name="price"
                                               value="{{isset($hosting->price) ? old('price', $hosting->price) : old('price')}} ">
                                        <p class="help-block text-danger"></p>
                                        @if($errors->has('price'))
                                            <p class="help-block text-danger">
                                                {{ $errors->first('price') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group">
                                        <label>Dung Lượng <span class="aster">*</span></label>
                                        <input type="text" class="form-control" name="capacity"
                                               value="{{isset($hosting->capacity) ? old('capacity', $hosting->capacity) : old('capacity')}}">
                                        <p class="help-block text-danger"></p>
                                        @if($errors->has('capacity'))
                                            <p class="help-block text-danger">
                                                {{ $errors->first('capacity') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group">
                                        <label>Băng Thông <span class="aster">*</span></label>
                                        <input type="text" class="form-control " name="bandwith"
                                               value="{{isset($hosting->bandwith) ? old('bandwith', $hosting->bandwith) : old('bandwith')}}">
                                        {{--                            old nếu tồn tại dữ liệu cũ thì show ra , còn không thì để rỗng--}}
                                        <p class="help-block text-danger"></p>
                                        @if($errors->has('bandwith'))
                                            <p class="help-block text-danger">
                                                {{ $errors->first('bandwith') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group">
                                        <label>Sub-Domain <span class="aster">*</span></label>
                                        <input type="text" class="form-control " name="sub_domain"
                                               value="{{isset($hosting->sub_domain) ? old('sub_domain', $hosting->sub_domain) : old('sub_domain')}}">
                                        <p class="help-block text-danger"></p>
                                        @if($errors->has('sub_domain'))
                                            <p class="help-block text-danger">
                                                {{ $errors->first('sub_domain') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group">
                                        <label>Email <span class="aster">*</span></label>
                                        <input type="text" class="form-control " name="email"
                                               value="{{isset($hosting->email) ? old('email', $hosting->email) : old('email')}}">
                                        <p class="help-block text-danger"></p>
                                        @if($errors->has('email'))
                                            <p class="help-block text-danger">
                                                {{ $errors->first('email') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group">
                                        <label>FTP <span class="aster">*</span></label>
                                        <input type="text" class="form-control " name="ftp"
                                               value="{{isset($hosting->ftp) ? old('ftp', $hosting->ftp) : old('ftp')}}">
                                        <p class="help-block text-danger"></p>
                                        @if($errors->has('ftp'))
                                            <p class="help-block text-danger">
                                                {{ $errors->first('ftp') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group">
                                        <label>Database <span class="aster">*</span></label>
                                        <input type="text" class="form-control " name="database"
                                               value="{{isset($hosting->database) ? old('database', $hosting->database) : old('database')}}">
                                        <p class="help-block text-danger"></p>
                                        @if($errors->has('database'))
                                            <p class="help-block text-danger">
                                                {{ $errors->first('database') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group">
                                        <label>Addon-domain <span class="aster">*</span></label>
                                        <input type="text" class="form-control " name="adddon_domain"
                                               value="{{isset($hosting->adddon_domain) ? old('adddon_domain', $hosting->adddon_domain) : old('adddon_domain')}}">
                                        <p class="help-block text-danger"></p>
                                        @if($errors->has('adddon_domain'))
                                            <p class="help-block text-danger">
                                                {{ $errors->first('adddon_domain') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group">
                                        <label>Park-domain <span class="aster">*</span></label>
                                        <input type="text" class="form-control " name="park_domain"
                                               value="{{isset($hosting->park_domain) ? old('park_domain', $hosting->park_domain) : old('park_domain')}}">
                                        <p class="help-block text-danger"></p>
                                        @if($errors->has('park_domain'))
                                            <p class="help-block text-danger">
                                                {{ $errors->first('park_domain') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">

                                <div class="col-xl-12 form-group">
                                    <label>Ghi Chú </label>
                                    <textarea  rows="5" type="text" class="form-control" name="notes">{{isset($hosting->notes) ? old('notes', $hosting->notes) : old('notes')}}</textarea>
                                </div>

                            </div>

                            <hr>
                            <div class="event_ float-right">
                                <button class="btn btn-default">{{ __('general.save') }}</button>
                                <a href="{{ route('admin.hostings.index') }}"
                                   class="btn btn-default">{{ __('general.back') }}</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@stop

