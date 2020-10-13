@extends('layout.master')
@section('title')
    Đăng ký dịch vụ
@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('../css/responsive.css') }}">
@stop
@section('content')

    <section class="body-content">
        <div class="card">
            <div class="card-header card-header-new">
                Đăng ký dịch vụ tên miền
            </div>
            <div class="card-body">
                <form action="{{route('admin.list-services.post')}}" method="post">
                    <input type="hidden" name="id"
                           value="{{isset($register_service->id) ? $register_service->id: ''}}">
                    @csrf
                    <div class="clearfix">
                        <div class="panel-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group">
                                        <label
                                               class="">Khách hàng <span
                                                class="aster">*</span></label>
                                        <select class="js-example-basic-single form-control"
                                                name="id_customer">
                                            @foreach($customer as $cus)
                                                <option value="{{$cus->id}}"> {{$cus->name}}
                                                    - {{$cus->email}}</option>
                                            @endforeach
                                        </select>
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
                                        <label
                                               class="  ">Nhân viên <span
                                                class="aster">*</span></label>
                                        <select class="js-example-basic-single form-control"
                                                name="id_staff">
                                            @foreach($staff as $i)

                                                <option value="{{$i->id}}"
                                                        @if(isset($register_service->id) && $register_service->id_staff == $i->id)
                                                        selected
                                                    @endif > {{$i->name}} - {{$i->email}}</option>
                                            @endforeach
                                        </select>
                                        <p class="help-block text-danger"></p>
                                        @if($errors->has('id_staff'))
                                            <p class="help-block text-danger">
                                                {{ $errors->first('id_staff') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <!--Grid row-->
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group">
                                        <label>Tên Miền <span
                                                class="aster">*</span></label>
                                        <select onchange="selectDomain(this)"
                                                class="form-control"
                                                name="id_domain">
                                            <option value="">Choose domain</option>
                                            @foreach($domain as $dm)
                                                <option value="{{$dm->id}}"
                                                        @if(isset($register_service->id) && $register_service->id_domain == $dm->id)
                                                        selected
                                                        @endif
                                                        data-fee-register="{{$dm->fee_register}}"
                                                        data-fee-remain="{{$dm->fee_remain}}"
                                                        data-fee-tranformation="{{$dm->fee_tranformation}}"
                                                        data-notes="{{$dm->notes}}"
                                                >{{$dm->name}}</option>
                                            @endforeach
                                        </select>
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
                                        <input id="fee-register" type="text"
                                               class="form-control" name="fee_register"
                                               readonly
                                               value=" @foreach($domain as $dm)@if(isset($register_service->id) && $register_service->id_domain == $dm->id) {{$dm->fee_register}} @endif @endforeach">
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
                                        <input id="fee-remain" type="text"
                                               class="form-control"
                                               name="fee_remain" readonly
                                               value="@foreach($domain as $dm)@if(isset($register_service->id) && $register_service->id_domain == $dm->id) {{$dm->fee_remain}} @endif @endforeach">
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
                                        <input id="fee-tranformation" type="text"
                                               class="form-control "
                                               name="fee_tranformation" readonly
                                               value="@foreach($domain as $dm)@if(isset($register_service->id) && $register_service->id_domain == $dm->id) {{$dm->fee_tranformation}} @endif @endforeach">
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
                                <div class="form-group col-md-12">
                                    <label>Địa chỉ domain <span class="aster">*</span></label>
                                    <input id="address_domain1" type="text"
                                           class="form-control "
                                           name="address_domain1"
                                           value="">
                                    <p class="help-block text-danger"></p>
                                    @if($errors->has('address_domain1'))
                                        <p class="help-block text-danger">
                                            {{ $errors->first('address_domain1') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group">
                                        <label class="">Thời gian sử dụng <span
                                                class="aster">*</span></label>

                                        <select class="js-example-basic-single form-control"
                                                name="date_using">

                                            <option value="12" selected>12 tháng</option>
                                            <option value="24">24 tháng</option>
                                            <option value="36">36 tháng</option>
                                            <option value="48">48 tháng</option>
                                            <option value="60">60 tháng</option>
                                            <option value="72">72 tháng</option>
                                        </select>

                                        <p class="help-block text-danger"></p>
                                        @if($errors->has('end_date'))
                                            <p class="help-block text-danger">
                                                {{ $errors->first('end_date') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group ">
                                        <label class="">Ngày bắt đầu <span
                                                class="aster">*</span></label>
                                        <div class="input-group">
                                            <input class="form-control" id="start_date"
                                                   name="start_date" type="text"/>
                                            <div class="input-group-addon">
                                            </div>
                                            <span class="input-group-text"><i
                                                    class="far fa-calendar-alt"></i></span>
                                        </div>

                                        <p class="help-block text-danger"></p>
                                        @if($errors->has('start_date'))
                                            <p class="help-block text-danger">
                                                {{ $errors->first('start_date') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <div class="col-xs-12 form-group">
                                        <label class="registerservice1">Ghi Chú </label>
                                        <div class="input-group">
                                                    <textarea rows="5" type="text" class="form-control"
                                                              name="notes">{{isset($register_service->notes) ? old('notes', $register_service->notes) : old('notes')}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <hr>
                            <div class="event_">
                                <button class="btn btn-default">{{ __('general.save') }}</button>
                                <a href="{{ route('admin.list-services.index') }}"
                                   class="btn btn-default">{{ __('general.back') }}</a>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>

    </section>

    <script>

        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function () {
            $("#start_date").datepicker({
                format: 'dd-mm-yyyy ',
                autoclose: true,
            }).on('changeDate', function (selected) {
                var minDate = new Date(selected.date.valueOf());
                $('#end_date').datepicker('setStartDate', minDate);
            });

            $("#end_date").datepicker({
                format: 'dd-mm-yyyy',
                autoclose: true,
            }).on('changeDate', function (selected) {
                var minDate = new Date(selected.date.valueOf());
                $('#start_date').datepicker('setEndDate', minDate);
            });

            $('.js-example-basic-single').select2();


        })


    </script>

@stop

