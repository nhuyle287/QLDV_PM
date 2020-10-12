@extends('layout.master')
@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="page-title" style="font-weight: bold;  font-size: 200%;">Khách hàng</h3>
                            <form action="{{route('admin.customers.store')}}" method="post">
                                <input type="hidden" name="id" value="{{isset($customer->id) ? $customer->id: ''}}">
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
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group">
                                                    <label>Họ Và Tên Khách Hàng *</label>
                                                    <input type="text" class="form-control" name="name"
                                                           value="{{isset($customer->name) ? old('name', $customer->name) : old('name')}}">
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
                                                    <label>Số Điện Thoại *</label>
                                                    <input type="text" class="form-control" name="phone_number"
                                                           value="{{isset($customer->phone_number) ? old('phone_number', $customer->phone_number) : old('phone_number')}}">
                                                    <p class="help-block text-danger"></p>
                                                    @if($errors->has('phone_number'))
                                                        <p class="help-block text-danger">
                                                            {{ $errors->first('phone_number') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group">
                                                    <label>Email *</label>
                                                    <input type="text" class="form-control" name="email"
                                                           value="{{isset($customer->email) ? old('email', $customer->email) : old('email')}}">
                                                    <p class="help-block text-danger"></p>
                                                    @if($errors->has('email'))
                                                        <p class="help-block text-danger">
                                                            {{ $errors->first('email') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group">
                                                    <label>Địa Chỉ </label>
                                                    <input rows="3" class="form-control" name="address"
                                                           value="{{isset($customer->address) ? old('address', $customer->address) : old('address')}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group">
                                                    <label>Ngày Sinh *</label>
                                                    <input type="datetime-local" class="form-control "
                                                           name="birthday"
                                                           value="{{isset($customer->birthday) ?
                                   date('Y-m-d\TH:i', strtotime($customer->birthday)) : ''}}">
                                                    <p class="help-block text-danger"></p>
                                                    @if($errors->has('birthday'))
                                                        <p class="help-block text-danger">
                                                            {{ $errors->first('birthday') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group">
                                                    <label>Ghi Chú </label>
                                                    <textarea rows="5" type="text" class="form-control" name="notes">
                                {{isset($customer->notes) ? old('notes', $customer->notes) : old('notes')}}</textarea>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">

                                        </div>

                                        <hr>
                                        <button class="btn btn-info">{{ __('general.save') }}</button>
                                        <a href="{{ route('admin.customers.index') }}"
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
