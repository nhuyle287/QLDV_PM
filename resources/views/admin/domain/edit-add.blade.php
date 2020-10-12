@extends('layout.master')
@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="page-title"  style="font-weight: bold;  font-size: 200%;">Domain</h3>
                            <form action="{{route('admin.domains.store')}}" method="post">
                                <input type="hidden" name="id" value="{{isset($domain->id) ? $domain->id: ''}}">
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
                                                    <label>Tên Miền <span class="aster">*</span></label>
                                                    <input type="text" class="form-control" name="name"
                                                           value="{{isset($domain->name) ? old('name', $domain->name) : old('name')}}">
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
                                                    <label>Phí Đăng Ký <span class="aster">*</span></label>
                                                    <input type="text" class="form-control" name="fee_register"
                                                           value="{{isset($domain->fee_register) ? old('fee_register', $domain->fee_register) : old('fee_register')}}">
                                                    <p class="help-block text-danger"></p>
                                                    @if($errors->has('fee_register'))
                                                        <p class="help-block text-danger">
                                                            {{ $errors->first('fee_register') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group">
                                                    <label>Phí Duy Trì <span class="aster">*</span></label>
                                                    <input type="text" class="form-control" name="fee_remain"
                                                           value="{{isset($domain->fee_remain) ? old('fee_remain', $domain->fee_remain) : old('fee_remain')}}">
                                                    <p class="help-block text-danger"></p>
                                                    @if($errors->has('fee_remain'))
                                                        <p class="help-block text-danger">
                                                            {{ $errors->first('fee_remain') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group">
                                                    <label>Phí Chuyển <span class="aster">*</span></label>
                                                    <input type="text" class="form-control " name="fee_tranformation"
                                                           value="{{isset($domain->fee_tranformation) ? old('fee_tranformation', $domain->fee_tranformation) : old('fee_tranformation')}}">
                                                    <p class="help-block text-danger"></p>
                                                    @if($errors->has('fee_tranformation'))
                                                        <p class="help-block text-danger">
                                                            {{ $errors->first('fee_tranformation') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group">
                                                    <label>Ghi Chú </label>
                                                    <textarea rows="5" type="text" class="form-control"
                                                              name="notes">{{isset($domain->notes) ? old('notes', $domain->notes) : old('notes')}}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">

                                            </div>
                                        </div>

                                        <hr>
                                        <button class="btn btn-info">{{ __('general.save') }}</button>
                                        <a href="{{ route('admin.domains.index') }}"
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
