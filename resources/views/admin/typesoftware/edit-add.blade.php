@extends('layout.master')
@section('title')
    Loại phần mềm
@stop
@section('head')
    <link rel="stylesheet" href="{{ asset('../css/responsive.css') }}">
@stop
@section('content')

    <section class="body-content">
        <div class="card">

            <div class="card-header card-header-new">
                {{ __('typesoftware.create') }}
            </div>
            <div class="card-body">
                <form action="{{route('admin.typesoftwares.store')}}" method="post">
                    <input type="hidden" name="id" value="{{isset($type_software->id) ? $type_software->id: ''}}">
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
                                <div class="form-group col-md-12">
                                    <div class="col-xs-12 form-group">
                                        <label>Tên Loại </label>
                                        <input type="text" class="form-control" name="name"
                                               value="{{isset($type_software->name) ? old('name', $type_software->name) : old('name')}}">
                                        <p class="help-block text-danger"></p>
                                        @if($errors->has('name'))
                                            <p class="help-block text-danger">
                                                {{ $errors->first('name') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="form-group col-md-12">
                                    <div class="col-xs-12 form-group">
                                        <label>Mô Tả </label>
                                        <textarea id="editor1" rows="5" type="text" class="form-control" name="description">
                                {{isset($type_software->description) ? old('notes', $type_software->description) : old('description')}}</textarea>
                                    </div>
                                </div>

                            </div>
                            <hr>
                            <div class="event_ float-right">
                                <button class="btn btn-default">{{ __('general.save') }}</button>
                                <a href="{{ route('admin.typesoftwares.index') }}"
                                   class="btn btn-default">{{ __('general.back') }}</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
        <script> CKEDITOR.replace('editor1'); </script>
    </section>
@stop


