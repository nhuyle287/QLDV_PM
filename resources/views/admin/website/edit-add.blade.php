@extends('layout.master')
@section('title')
    Website
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
                            <h3 class="page-title" style="font-weight: bold;  font-size: 200%;">Dịch Vụ Website</h3>
                            <form action="{{route('admin.websites.store')}}" method="post">
                                <input type="hidden" name="id" value="{{isset($website->id) ? $website->id: ''}}">
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

                                    <div class="panel-body">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group">
                                                    <label>Website Name <span class="aster">*</span></label>
                                                    <input type="text" class="form-control" name="name"
                                                           value="{{isset($website->name) ? old('name', $website->name) : old('name')}}">
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
                                                    <label>Type Website <span class="aster">*</span></label>
                                                    <input type="text" class="form-control" name="type_website"
                                                           value="{{isset($website->type_website) ? old('type_website', $website->type_website) : old('type_website')}}">
                                                    <p class="help-block"></p>
                                                    @if($errors->has('type_website'))
                                                        <p class="help-block">
                                                            {{ $errors->first('type_website') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group">
                                                    <label>Price <span class="aster">*</span></label>
                                                    <input type="text" class="form-control" name="price"
                                                           value="{{isset($website->price) ? old('price', $website->price) : old('price')}}">
                                                    <p class="help-block"></p>
                                                    @if($errors->has('price'))
                                                        <p class="help-block">
                                                            {{ $errors->first('price') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group">
                                                    <label>Ghi Chú </label>
                                                    <textarea  rows="5" type="text" class="form-control" name="notes">{{isset($website->notes) ? old('notes', $website->notes) : old('notes')}}</textarea>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="form-group col-md-6">

                                            </div>
                                            <div class="form-group col-md-6">

                                            </div>
                                        </div>
                                        <hr>
                                      <div class="event_ float-right">
                                          <button class="btn btn-default">{{ __('general.save') }}</button>
                                          <a href="{{ route('admin.websites.index') }}" class="btn btn-default">{{ __('general.back') }}</a>

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
