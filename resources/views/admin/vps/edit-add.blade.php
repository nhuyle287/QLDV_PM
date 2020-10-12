@extends('layout.master')
@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="page-title" style="font-weight: bold;  font-size: 200%;">Dịch Vụ VPS</h3>
                            <form action="{{route('admin.vpss.store')}}" method="post">
                                <input type="hidden" name="id" value="{{isset($vps->id) ? $vps->id: ''}}">
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
                                                    <label>Tên VPS <span class="aster">*</span></label>
                                                    <input type="text" class="form-control" name="name"
                                                           value="{{isset($vps->name) ? old('name', $vps->name) : old('name')}}">
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
                                                    <input type="text" class="form-control" name="price"
                                                           value="{{isset($vps->price) ? old('price', $vps->price) : old('price')}}">
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
                                                    <label>CPU <span class="aster">*</span></label>
                                                    <input type="text" class="form-control" name="cpu"
                                                           value="{{isset($vps->cpu) ? old('cpu', $vps->cpu) : old('cpu')}}">
                                                    <p class="help-block"></p>
                                                    @if($errors->has('cpu'))
                                                        <p class="help-block">
                                                            {{ $errors->first('cpu') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group">
                                                    <label>Dung Lượng <span class="aster">*</span></label>
                                                    <input type="text" class="form-control " name="capacity"
                                                           value="{{isset($vps->capacity) ? old('capacity', $vps->capacity) : old('capacity')}}">
                                                    <p class="help-block"></p>
                                                    @if($errors->has('capacity'))
                                                        <p class="help-block">
                                                            {{ $errors->first('capacity') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group">
                                                    <label>Ram <span class="aster">*</span></label>
                                                    <input type="text" class="form-control " name="ram"
                                                           value="{{isset($vps->ram) ? old('ram', $vps->ram) : old('ram')}}">
                                                    <p class="help-block"></p>
                                                    @if($errors->has('ram'))
                                                        <p class="help-block">
                                                            {{ $errors->first('ram') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group">
                                                    <label>Băng Thông <span class="aster">*</span></label>
                                                    <input type="text" class="form-control " name="bandwith"
                                                           value="{{isset($vps->bandwith) ? old('bandwith', $vps->bandwith) : old('bandwith')}}">
                                                    <p class="help-block"></p>
                                                    @if($errors->has('bandwith'))
                                                        <p class="help-block">
                                                            {{ $errors->first('bandwith') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group">
                                                    <label>Công nghệ ảo hóa <span class="aster">*</span></label>
                                                    <input type="text" class="form-control " name="technical"
                                                           value="{{isset($vps->technical) ? old('technical', $vps->technical) : old('technical')}}">
                                                    <p class="help-block"></p>
                                                    @if($errors->has('technical'))
                                                        <p class="help-block">
                                                            {{ $errors->first('technical') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group">
                                                    <label>Hệ điều hành <span class="aster">*</span></label>
                                                    <input type="text" class="form-control " name="operating_system"
                                                           value="{{isset($vps->operating_system) ? old('operating_system', $vps->operating_system) : old('operating_system')}}">
                                                    <p class="help-block"></p>
                                                    @if($errors->has('operating_system'))
                                                        <p class="help-block">
                                                            {{ $errors->first('operating_system') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group">
                                                    <label>Backup <span class="aster">*</span></label>
                                                    <input type="text" class="form-control " name="backup"
                                                           value="{{isset($vps->backup) ? old('backup', $vps->backup) : old('backup')}}">
                                                    <p class="help-block"></p>
                                                    @if($errors->has('backup'))
                                                        <p class="help-block">
                                                            {{ $errors->first('backup') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group">
                                                    <label>Panel <span class="aster">*</span></label>
                                                    <input type="text" class="form-control " name="panel"
                                                           value="{{isset($vps->panel) ? old('panel', $vps->panel) : old('panel')}}">
                                                    <p class="help-block"></p>
                                                    @if($errors->has('panel'))
                                                        <p class="help-block">
                                                            {{ $errors->first('panel') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group">
                                                    <label>Ghi Chú </label>
                                                    <textarea  rows="5" type="text" class="form-control" name="notes">{{isset($vps->notes) ? old('notes', $vps->notes) : old('notes')}}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">

                                            </div>
                                        </div>
                                        <hr>
                                        <button class="btn btn-primary">{{ __('general.save') }}</button>
                                        <a href="{{ route('admin.vpss.index') }}" class="btn btn-default">{{ __('general.back') }}</a>

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
