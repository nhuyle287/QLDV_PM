@extends('layout.master')
@section('title')
    Đề tài
@stop
@section('css')
    <style>
        body {
            font-family: "Roboto";
        }
    </style>
@stop
@section('content')
{{--  main    --}}
<section class="content">
    <div class="">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="page-title" style="font-weight: bold;  font-size: 200%;">Đề tài</h3>
                        <form action="{{route('admin.topic.store')}}" method="post">
                            <input type="hidden" name="id" value="{{isset($topic->id) ? $topic->id: ''}}">
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

                                <div class="panel-body" >
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <div class="col-xs-12 form-group">
                                                <label>Tên đề tài <span class="aster">*</span></label>
                                                <input type="text" class="form-control" name="name"
                                                       value="{{isset($topic->name) ? old('name', $topic->name) : old('name')}}">
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
                                                <label>Danh mục đề tài <span class="aster">*</span></label>

                                                <select class="form-control" name="category_id">
                                                    @foreach($category_topic as $category)
                                                        <option  value="{{$category->category_id}}" @if($topic->id && $topic->category_id==$category->category_id) selected @endif>{{$category->name_category}}</option>
                                                    @endforeach
                                                </select>
                                                <p class="help-block text-danger"></p>
                                                @if($errors->has('category_topic'))
                                                    <p class="help-block text-danger">
                                                        {{ $errors->first('category_topic') }}
                                                    </p>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
{{--                                    <div class="row">--}}
{{--                                        <div class="form-group col-md-6">--}}
{{--                                            <div class="col-xs-12 form-group">--}}
{{--                                                <label>Start Date <span class="aster">*</span></label>--}}
{{--                                                <input type="date" class="form-control" name="start_date"--}}
{{--                                                       value="{{isset($topic->start_date) ? old('start_date', $topic->start_date) : old('start_date')}}">--}}
{{--                                                <p class="help-block text-danger"></p>--}}
{{--                                                @if($errors->has('start_date'))--}}
{{--                                                    <p class="help-block text-danger">--}}
{{--                                                        {{ $errors->first('start_date') }}--}}
{{--                                                    </p>--}}
{{--                                                @endif--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group col-md-6">--}}
{{--                                            <div class="col-xs-12 form-group">--}}
{{--                                                <label>End Date <span class="aster">*</span></label>--}}
{{--                                                <input class="form-control" name="end_date" type="date"--}}
{{--                                                       value="{{isset($topic->end_date) ? old('end_date', $topic->end_date) : old('end_date')}}">--}}
{{--                                                <p class="help-block text-danger"></p>--}}
{{--                                                @if($errors->has('end_date'))--}}
{{--                                                    <p class="help-block text-danger">--}}
{{--                                                        {{ $errors->first('end_date') }}--}}
{{--                                                    </p>--}}
{{--                                                @endif--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                     --}}
{{--                                    </div>--}}

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <div class="col-xs-12 form-group">
                                                <label>Mô tả <span class="aster"></span></label>
                                                <textarea id="description" rows="5" class="form-control " name="description"> {{isset($topic->description) ? old('description', $topic->description) : old('description')}}</textarea>
                                                <p class="help-block text-danger"></p>
                                                @if($errors->has('description'))
                                                    <p class="help-block text-danger">
                                                        {{ $errors->first('description') }}
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="col-xs-12 form-group">
                                                <label>Hỗ trợ <span class="aster"></span></label>
                                                <select class="form-control" name="support">
                                                    @foreach($support_topic as $sup)
                                                        <option  value="{{$sup}}" @if($topic->id && $sup==$topic->support) selected @endif>{{ucfirst(array_search($sup,$support_topic))}}</option>
                                                    @endforeach
                                                </select>

                                                <p class="help-block text-danger"></p>
                                                @if($errors->has('support'))
                                                    <p class="help-block text-danger">
                                                        {{ $errors->first('support') }}
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">

                                        </div>
                                    </div>
                                    <hr>
                                   <div class="envent_ float-right">
                                       <button class="btn btn-default">{{ __('general.save') }}</button>
                                       <a href="{{ route('admin.topic.index') }}" class="btn btn-default">{{ __('general.back') }}</a>

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
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script> CKEDITOR.replace('description'); </script>

@stop
