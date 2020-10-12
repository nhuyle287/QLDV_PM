@extends('layout.master')
@section('css')
    <style>
        body {
            font-family: "Roboto";
        }
    </style>
@stop
@section('content')
    <div class="content">
        <h3 class="page-title">Mục đích sản phẩm</h3>
        <form action="{{route('admin.roles.store')}}" method="post">
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
                            <label>Tên Mục Đích *</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label>Mô tả </label>
                            <textarea rows="3" class="form-control"></textarea>
                        </div>
                    </div>

                    <hr>
                    <button class="btn btn-primary">{{ __('general.save') }}</button>
                    <a href="{{ route('admin.purposes.index') }}" class="btn btn-default">{{ __('general.back') }}</a>
                </div>
            </div>
        </form>
    </div>
@stop
