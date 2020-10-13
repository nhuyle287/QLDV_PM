@extends('layout.master')
@section('title')
    Khách hàng
@stop
@section('head')
    <link rel="stylesheet" href="{{ asset('../css/responsive.css') }}">
@stop
@section('content')

    <section class="body-content">
        <div class="card">

            <div class="card-header card-header-new">
                {{ __('customer.create') }}
            </div>
            <div class="card-body">
                <form action="{{route('admin.customers.store')}}" method="post">
                    <input type="hidden" name="id" value="{{isset($customer->id) ? $customer->id: ''}}">
                    @csrf
                    <div class="clearfix">
                        <div class="panel-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group">
                                        <label>Họ và tên *</label>
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
                                {{--                                        --}}
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <div class="col-xs-12 form-group">
                                        <label>Địa Chỉ </label>
                                        <input rows="3" class="form-control" name="address"
                                               value="{{isset($customer->address) ? old('address', $customer->address) : old('address')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group">
                                        <label>Công ty (cửa hàng)</label>
                                        <input type="text" class="form-control "
                                               name="nameStore"
                                               value="{{isset($customer->nameStore) ? old('nameStore', $customer->nameStore) : old('nameStore')}}">
                                        <p class="help-block text-danger"></p>
                                        @if($errors->has('nameStore'))
                                            <p class="help-block text-danger">
                                                {{ $errors->first('nameStore') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group">
                                        <label>Chức vụ </label>
                                        <input type="text" class="form-control "
                                               name="position"
                                               value="{{isset($customer->position) ? old('position', $customer->position) : old('position')}}">
                                        <p class="help-block text-danger"></p>
                                        @if($errors->has('position'))
                                            <p class="help-block text-danger">
                                                {{ $errors->first('position') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="form-row">
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


                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group">
                                        <label>Số Fax </label>
                                        <input type="text" class="form-control" name="fax_number"
                                               value="{{isset($customer->fax_number) ? old('fax_number', $customer->fax_number) : old('fax_number')}}">
                                        <p class="help-block text-danger"></p>
                                        @if($errors->has('fax_number'))
                                            <p class="help-block text-danger">
                                                {{ $errors->first('fax_number') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>


                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group">
                                        <label>Số Tài Khoản </label>
                                        <input type="text" class="form-control" name="account_number"
                                               value="{{isset($customer->account_number) ? old('account_number', $customer->account_number) : old('account_number')}}">
                                        <p class="help-block text-danger"></p>
                                        @if($errors->has('account_number'))
                                            <p class="help-block text-danger">
                                                {{ $errors->first('account_number') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group">
                                        <label>Mở tại </label>
                                        <input type="text" class="form-control "
                                               name="open_at"
                                               value="{{isset($customer->open_at) ? old('open_at', $customer->open_at) : old('open_at')}}">
                                    </div>
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group">
                                        <label>Số thuế </label>
                                        <input type="text" class="form-control "
                                               name="tax_number"
                                               value="{{isset($customer->tax_number) ? old('tax_number', $customer->tax_number) : old('tax_number')}}">
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

                            <hr>
                            <div class="event_ ">
                                <button class="btn btn-default">{{ __('general.save') }}</button>
                                <a href="{{ route('admin.customers.index') }}"
                                   class="btn btn-default">{{ __('general.back') }}</a>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@stop
