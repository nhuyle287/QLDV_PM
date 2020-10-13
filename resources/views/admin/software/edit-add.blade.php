@extends('layout.master')
@section('title')
    Phần mềm
@stop
@section('head')
    <link rel="stylesheet" href="{{ asset('../css/responsive.css') }}">
@stop
@section('content')

    <section class="body-content">
        <div class="card">

            <div class="card-header card-header-new">
                Tạo/Cập nhật phần mềm
            </div>
            <div class="card-body">
                <form action="{{route('admin.softwares.store')}}" method="post">
                    <input type="hidden" name="id" value="{{isset($software->id) ? $software->id: ''}}">
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
                                        <label>Software Name <span class="aster">*</span></label>
                                        <input type="text" class="form-control" name="name"
                                               value="{{isset($software->name) ? old('name', $software->name) : old('name')}}">
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
                                        <label>Price <span class="aster">*</span></label>
                                        <input type="text" class="form-control" name="price"
                                               value="{{isset($software->price) ? old('price', $software->price) : old('price')}}">
                                        <p class="help-block text-danger"></p>
                                        @if($errors->has('price'))
                                            <p class="help-block text-danger">
                                                {{ $errors->first('price') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group">
                                        <label>Số lượng chi nhánh <span class="aster">*</span></label>
                                        <input type="number" class="form-control" name="quantity_branch"
                                               value="{{isset($software->quantity_branch) ? old('price', $software->quantity_branch) : old('quantity_branch')}}">
                                        <p class="help-block text-danger"></p>
                                        @if($errors->has('quantity_branch'))
                                            <p class="help-block text-danger">
                                                {{ $errors->first('quantity_branch') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group">
                                        <label>Số lượng nhân viên <span class="aster">*</span></label>
                                        <input type="number" class="form-control" name="quantity_staff"
                                               value="{{isset($software->quantity_staff) ? old('price', $software->quantity_staff) : old('quantity_staff')}}">
                                        <p class="help-block text-danger"></p>
                                        @if($errors->has('quantity_staff'))
                                            <p class="help-block text-danger">
                                                {{ $errors->first('quantity_staff') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group">
                                        <label>Số lượng tài khoản <span class="aster">*</span></label>
                                        <input type="number" class="form-control" name="quantity_acc"
                                               value="{{isset($software->quantity_acc) ? old('price', $software->quantity_acc) : old('quantity_acc')}}">
                                        <p class="help-block text-danger"></p>
                                        @if($errors->has('quantity_acc'))
                                            <p class="help-block text-danger">
                                                {{ $errors->first('quantity_acc') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group">
                                        <label>Số lượng sản phẩm/dịch vụ <span class="aster">*</span></label>
                                        <input type="number" class="form-control" name="quantity_product"
                                               value="{{isset($software->quantity_product) ? old('price', $software->quantity_product) : old('quantity_product')}}">
                                        <p class="help-block text-danger"></p>
                                        @if($errors->has('quantity_product'))
                                            <p class="help-block text-danger">
                                                {{ $errors->first('quantity_product') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group">
                                        <label>Số lượng hóa đơn/tháng <span class="aster">*</span></label>
                                        <input type="number" class="form-control" name="quantity_bill"
                                               value="{{isset($software->quantity_bill) ? old('price', $software->quantity_bill) : old('quantity_bill')}}">
                                        <p class="help-block text-danger"></p>
                                        @if($errors->has('quantity_bill'))
                                            <p class="help-block text-danger">
                                                {{ $errors->first('quantity_bill') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group">
                                        <label>Ghi Chú </label>
                                        <textarea id="editor1"  rows="5" type="text" class="form-control" name="notes">{{isset($software->notes) ? old('notes', $software->notes) : old('notes')}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                            </div>

                            <hr>
                            <div class="event_ float-right">
                                <button class="btn btn-default">{{ __('general.save') }}</button>
                                <a href="{{ route('admin.softwares.index') }}" class="btn btn-default">{{ __('general.back') }}</a>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@stop

