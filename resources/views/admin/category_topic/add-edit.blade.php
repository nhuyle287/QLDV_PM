@extends('layout.master')
@section('title')
    Danh mục đề tài
@stop
@section('head')
    <link rel="stylesheet" href="{{ asset('../css/responsive.css') }}">
@stop
@section('content')

    <section class="body-content">
        <div class="card">

            <div class="card-header card-header-new">
                Cập nhật danh mục đề tài
            </div>
            <div class="card-body">
                <form action="{{route('admin.category-topic.store')}}" method="post">
                    <input type="hidden" name="category_id"
                           value="{{isset($category_topic->category_id) ? $category_topic->category_id: ''}}">
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

                        <div class="panel-body">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-xs-12 d-flex flex-lg-nowrap">

                                    <label class="col-md-3">Tên danh mục đề tài<span class="aster">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="name_category"
                                               value="{{isset($category_topic->name_category) ? old('name_category', $category_topic->name_category) : old('name_category')}}">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    @if($errors->has('name_category'))
                                        <p class="help-block text-danger">
                                            {{ $errors->first('name_category') }}
                                        </p>
                                    @endif

                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">

                                </div>
                            </div>
                            <hr>
                            <div class="float-right">
                                <button class="btn btn-default">{{ __('general.save') }}</button>
                                <a href="{{ route('admin.category-topic.index') }}"
                                   class="btn btn-default">{{ __('general.back') }}</a>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>

    </section>
@stop

