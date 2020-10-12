@extends('layout.master')
@section('title')
    Sản phẩm
@stop
@section('css')
    <style>
        body {
            font-family: "Roboto";
        }
    </style>
@stop
@section('content')
    <div class="content">
        <h3 class="page-title">Sản Phẩm</h3>
        <form action="{{route('admin.customers.store')}}" method="post">
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
                    {{ __('general.create') }}
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label>Tên Sản Phẩm *</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label>Mã Sản Phẩm *</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label>Nhà Cung Cấp *</label>
                            <select class="form-control select2">
                                <option value="volvo">Volvo</option>
                                <option value="saab">Saab</option>
                                <option value="opel">Opel</option>
                                <option value="audi">Audi</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label>Đơn Vị Tính *</label>
                            <select class="form-control select2">
                                <option value="volvo">Volvo</option>
                                <option value="saab">Saab</option>
                                <option value="opel">Opel</option>
                                <option value="audi">Audi</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label>Giá Sản Phẩm </label>
                            <input type="text" class="form-control" name="title">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label>Mô Tả * </label>
                            <textarea rows="3" class="form-control"></textarea>
                        </div>
                    </div>

                    <hr>
                    <button class="btn btn-primary">{{ __('general.save') }}</button>
                    <a href="{{route('admin.products.index')}}" class="btn btn-default">{{ __('general.back') }}</a>
                </div>
            </div>
        </form>
    </div>
@stop
