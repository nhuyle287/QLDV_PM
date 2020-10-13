@extends('layout.master')
@section('title')
    SSL
@stop
@section('head')
    <link rel="stylesheet" href="{{ asset('../css/responsive.css') }}">
@stop
@section('content')

    <section class="body-content">
        <div class="card">

            <div class="card-header card-header-new">
                Tạo/Cập nhật SSL
            </div>
            <div class="card-body">
                <form action="{{route('admin.ssls.store')}}" method="post">
                    <input type="hidden" name="id" value="{{isset($ssl->id) ? $ssl->id: ''}}">
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
                                        <label>Tên <span class="aster">*</span></label>
                                        <input type="text" class="form-control" name="name"
                                               value="{{isset($ssl->name) ? old('name', $ssl->name) : old('name')}}">
                                        <p class="help-block"></p>
                                        @if($errors->has('name'))
                                            <p class="help-block">
                                                {{ $errors->first('name') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group">
                                        <label>Giá <span class="aster">*</span></label>
                                        <input type="number" class="form-control" name="price"
                                               value="{{isset($ssl->price) ? old('price', $ssl->price) : old('price')}}">
                                        <p class="help-block"></p>
                                        @if($errors->has('price'))
                                            <p class="help-block">
                                                {{ $errors->first('price') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group">
                                        <label>Insurance Policy <span class="aster">*</span></label>
                                        <input type="text" class="form-control" name="insurance_policy"
                                               value="{{isset($ssl->insurance_policy) ? old('insurance_policy', $ssl->insurance_policy) : old('insurance_policy')}}">
                                        <p class="help-block"></p>
                                        @if($errors->has('insurance_policy'))
                                            <p class="help-block">
                                                {{ $errors->first('insurance_policy') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group">
                                        <label>Domain Number <span class="aster">*</span></label>
                                        <input type="text" class="form-control " name="domain_number"
                                               value="{{isset($ssl->domain_number) ? old('email_number', $ssl->domain_number) : old('domain_number')}}">
                                        {{--                            old nếu tồn tại dữ liệu cũ thì show ra , còn không thì để rỗng--}}
                                        <p class="help-block"></p>
                                        @if($errors->has('domain_number'))
                                            <p class="help-block">
                                                {{ $errors->first('domain_number') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group">
                                        <label>Reliability <span class="aster">*</span></label>
                                        <input type="text" class="form-control " name="reliability"
                                               value="{{isset($ssl->reliability) ? old('reliability', $ssl->reliability) : old('reliability')}}">
                                        {{--                            old nếu tồn tại dữ liệu cũ thì show ra , còn không thì để rỗng--}}
                                        <p class="help-block"></p>
                                        @if($errors->has('reliability'))
                                            <p class="help-block">
                                                {{ $errors->first('reliability') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group">
                                        <label>Green Bar <span class="aster">*</span></label>
                                        <input type="text" class="form-control " name="green_bar"
                                               value="{{isset($ssl->green_bar) ? old('green_bar', $ssl->green_bar) : old('green_bar')}}">
                                        <p class="help-block"></p>
                                        @if($errors->has('green_bar'))
                                            <p class="help-block">
                                                {{ $errors->first('green_bar') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group">
                                        <label>Sans <span class="aster">*</span></label>
                                        <input type="text" class="form-control " name="sans"
                                               value="{{isset($ssl->sans) ? old('sans', $ssl->sans) : old('sans')}}">
                                        <p class="help-block"></p>
                                        @if($errors->has('sans'))
                                            <p class="help-block">
                                                {{ $errors->first('sans') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group">
                                        <label>Ghi Chú </label>
                                        <textarea  rows="5" type="text" class="form-control" name="notes">{{isset($ssl->notes) ? old('notes', $ssl->notes) : old('notes')}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">

                                </div>
                            </div>
                            <hr>
                            <div class="event_ float-right">
                                <button class="btn btn-default">{{ __('general.save') }}</button>
                                <a href="{{ route('admin.ssls.index') }}" class="btn btn-default">{{ __('general.back') }}</a>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@stop

