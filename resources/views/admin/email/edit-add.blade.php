@extends('layout.master')
@section('title')
    Email
@stop
@section('css')
    <style>
        body {
            font-family: "Roboto";
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
                            <h3  class="page-title"  style="font-weight: bold;  font-size: 200%;">Dịch Vụ Email</h3>
                            <form action="{{route('admin.emails.store')}}" method="post">
                                <input type="hidden" name="id" value="{{isset($email->id) ? $email->id: ''}}">
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

                                    <div class="panel-body"  >
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group">
                                                    <label>Tên <span class="aster">*</span></label>
                                                    <input type="text" class="form-control" name="name"
                                                           value="{{isset($email->name) ? old('name', $email->name) : old('name')}}">
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
                                                           value="{{isset($email->price) ? old('price', $email->price) : old('price')}}">
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
                                                           value="{{isset($email->capacity) ? old('capacity', $email->capacity) : old('capacity')}}">
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
                                                    <label>Email Number <span class="aster">*</span></label>
                                                    <input type="text" class="form-control " name="email_number"
                                                           value="{{isset($email->email_number) ? old('email_number', $email->email_number) : old('email_number')}}">
                                                    {{--                            old nếu tồn tại dữ liệu cũ thì show ra , còn không thì để rỗng--}}
                                                    <p class="help-block text-danger"></p>
                                                    @if($errors->has('email_number'))
                                                        <p class="help-block text-danger">
                                                            {{ $errors->first('email_number') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group">
                                                    <label>Email Forwarder <span class="aster">*</span></label>
                                                    <input type="text" class="form-control " name="email_forwarder"
                                                           value="{{isset($email->email_forwarder) ? old('email_forwarder', $email->email_forwarder) : old('email_forwarder')}}">
                                                    <p class="help-block text-danger"></p>
                                                    @if($errors->has('email_forwarder'))
                                                        <p class="help-block text-danger">
                                                            {{ $errors->first('email_forwarder') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group">
                                                    <label>Email List <span class="aster">*</span></label>
                                                    <input type="text" class="form-control " name="email_list"
                                                           value="{{isset($email->email_list) ? old('email_list', $email->email_list) : old('email_list')}}">
                                                    <p class="help-block text-danger"></p>
                                                    @if($errors->has('email_list'))
                                                        <p class="help-block text-danger">
                                                            {{ $errors->first('email_list') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group">
                                                    <label>Parked-domains <span class="aster">*</span></label>
                                                    <input type="text" class="form-control " name="parked_domains"
                                                           value="{{isset($email->parked_domains) ? old('parked_domains', $email->parked_domains) : old('parked_domains')}}">
                                                    <p class="help-block text-danger"></p>
                                                    @if($errors->has('parked_domains'))
                                                        <p class="help-block text-danger">
                                                            {{ $errors->first('parked_domains') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group">
                                                    <label>Ghi Chú </label>
                                                    <textarea rows="5" type="text" class="form-control"
                                                              name="notes">{{isset($email->notes) ? old('notes', $email->notes) : old('notes')}}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="event_ float-right">
                                            <button class="btn btn-default">{{ __('general.save') }}</button>
                                            <a href="{{ route('admin.emails.index') }}"
                                               class="btn btn-default">{{ __('general.back') }}</a>
                                        </div>
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
