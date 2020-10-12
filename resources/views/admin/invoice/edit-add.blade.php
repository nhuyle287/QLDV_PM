@extends('layout.master')
@section('content')


    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="page-title">Phần Mềm</h3>
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

                                    <div class="panel-body">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group">
                                                    <label>Tên Phần Mềm <span class="aster">*</span></label>
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
                                                    <label>Loại Phần Mềm<span class="aster">*</span></label>
                                                    <input type="text" class="form-control" name="type_software"
                                                           value="{{isset($software->type_software) ? old('type_software', $software->type_software) : old('type_software')}}">
                                                    <p class="help-block text-danger"></p>
                                                    @if($errors->has('type_software'))
                                                        <p class="help-block text-danger">
                                                            {{ $errors->first('type_software') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
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
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group">
                                                    <label>Ghi Chú </label>
                                                    <textarea  rows="5" type="text" class="form-control" name="notes">{{isset($software->notes) ? old('notes', $software->notes) : old('notes')}}</textarea>
                                                </div>
                                            </div>
                                        </div>


                                        <hr>
                                        <button class="btn btn-info">{{ __('general.save') }}</button>
                                        <a href="{{ route('admin.softwares.index') }}"
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
@stop
