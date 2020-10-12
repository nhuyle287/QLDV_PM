@extends('layout.master')
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
                            <h3 class="page-title" style="font-weight: bold;  font-size: 200%;">Loại Nhân Viên</h3>
                            <form action="{{route('admin.typestaffs.store')}}" method="post">
                                <input type="hidden" name="id" value="{{isset($type_staff->id) ? $type_staff->id: ''}}">
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
                                                           value="{{isset($type_staff->name) ? old('name', $type_staff->name) : old('name')}}">
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
                                                    <textarea  rows="5" type="text" class="form-control" name="description">
                                {{isset($type_staff->description) ? old('notes', $type_staff->description) : old('description')}}</textarea>
                                                </div>
                                            </div>

                                        </div>
                                        <hr>
                                        <button class="btn btn-info">{{ __('general.save') }}</button>
                                        <a href="{{ route('admin.typestaffs.index') }}"
                                           class="btn btn-default">{{ __('general.back') }}</a>
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

{{--    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>--}}
{{--    <script> CKEDITOR.replace('editor1'); </script>--}}

@stop
