@extends('layout.master')
@section('title')
    Đăng ký phần mềm
@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('../css/responsive.css') }}">
    <style>
        .hide{
            display: none;
        }
    </style>
@stop
@section('content')
    <section class="body-content">
        <div class="card">
            <div class="card-header card-header-new">
                Đăng ký/cập nhật phần mềm
            </div>
            <div class="card-body">
                <form action="{{route('admin.register-softs.store')}}" method="post">

                    <input type="hidden" name="id"
                           value="{{isset($register_soft->id) ? $register_soft->id: ''}}">
                    @csrf


                    <div class="clearfix">
                        <div class="panel-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group">
                                        <label class="">Khách hàng
                                            <span class="aster">*</span></label>
                                        <select class="js-example-basic-single form-control"
                                                name="id_customer">
                                            @foreach($customer as $i)

                                                <option value="{{$i->id}}"
                                                        @if(isset($register_soft->id) && $register_soft->id_customer == $i->id)
                                                        selected
                                                    @endif > {{$i->name}} - {{$i->email}}</option>
                                            @endforeach
                                        </select>
                                        <p class="help-block text-danger"></p>
                                        @if($errors->has('id_customer'))
                                            <p class="help-block text-danger">
                                                {{ $errors->first('id_customer') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group">
                                        <label class="">Nhân viên
                                            <span class="aster">*</span></label>
                                        <select class="js-example-basic-single form-control"
                                                name="id_staff">
                                            @foreach($staff as $i)

                                                <option value="{{$i->id}}"
                                                        @if(isset($register_soft->id) && $register_soft->id_staff == $i->id)
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
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group ">
                                        <label style="margin-top: 20px;" class="registerservice1">Gói phần
                                            mềm <span class="aster">*</span></label>
                                        <select class="js-example-basic-single form-control"
                                                name="id_software">
                                            @foreach($software as $i)

                                                <option value="{{$i->id}}"
                                                        @if(isset($register_soft->id) && $register_soft->id_software == $i->id)
                                                        selected
                                                    @endif > {{$i->name}}</option>
                                            @endforeach
                                        </select>
                                        <p class="help-block text-danger"></p>
                                        @if($errors->has('id_software'))
                                            <p class="help-block text-danger">
                                                {{ $errors->first('id_software') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group">
                                        <label style="margin-top: 20px;" class="registerservice1">Loại phần
                                            mềm <span class="aster">*</span></label>
                                        <select class="js-example-basic-single form-control"
                                                name="id_typesoftware">
                                            @foreach($type_software as $i)

                                                <option value="{{$i->id}}"
                                                        @if(isset($register_soft->id) && $register_soft->id_typesoftware == $i->id)
                                                        selected
                                                    @endif > {{$i->name}}</option>
                                            @endforeach
                                        </select>
                                        <p class="help-block text-danger"></p>
                                        @if($errors->has('id_typesoftware'))
                                            <p class="help-block text-danger">
                                                {{ $errors->first('id_typesoftware') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group">
                                        <label style="margin-top: 20px;" class="registerservice1">Địa chỉ
                                            miền <span class="aster">*</span></label>
                                        <input class="form-control" name="address_domain"
                                               value="{{isset($register_soft->address_domain) ? old('address_domain', $register_soft->address_domain) : old('address_domain')}}">
                                        <p class="help-block text-danger"></p>
                                        @if($errors->has('address_domain'))
                                            <p class="help-block text-danger">
                                                {{ $errors->first('address_domain') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group">
                                        <label style="margin-top: 20px;" class="registerservice1">Trạng thái
                                            <span class="aster">*</span></label>
                                        <select class="form-control" name="status" id="status">
                                            <option>Chọn trạng thái</option>
                                            <option value="Chính thức"
                                                    @if(isset($register_soft->status)&&$register_soft->status=='Chính thức')
                                                    selected
                                                @endif > Chính Thức
                                            </option>
                                            <option value="Dùng thử"
                                                    @if(isset($register_soft->status)&&$register_soft->status=='Dùng thử')
                                                    selected
                                                @endif > Dùng Thử
                                            </option>
                                        </select>
                                        <p class="help-block text-danger"></p>
                                        @if($errors->has('status'))
                                            <p class="help-block text-danger">
                                                {{ $errors->first('status') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-row" id="date">
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group">
                                        <label class="">Thời gian sử dụng <span
                                                class="aster">*</span></label>
                                        <div class="input-group">
                                            <select class="js-example-basic-single form-control"
                                                    name="date_using" style="width: 100%">

                                                <option value="12" selected>12 tháng</option>
                                                <option value="24">24 tháng</option>
                                                <option value="36">36 tháng</option>
                                                <option value="48">48 tháng</option>
                                                <option value="60">60 tháng</option>
                                                <option value="72">72 tháng</option>
                                            </select>
                                        </div>
                                        <p class="help-block text-danger"></p>

                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group ">
                                        <label class="">Ngày bắt đầu <span
                                                class="aster">*</span></label>
                                        <div class="input-group">
                                            <input class="form-control" id="start_date" name="start_date"
                                                   value="{{isset($register_soft->start_date) ?date('Y-m-d\TH:i', strtotime($register_soft->start_date)) : ''}}"
                                                   type="text"/>
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
                                {{--                                            <div class="form-group col-md-6">--}}
                                {{--                                                <div class="col-xs-12 form-group">--}}
                                {{--                                                    <label class="registerservice1">Ngày kết thúc <span--}}
                                {{--                                                            class="aster">*</span></label>--}}
                                {{--                                                    <div class="input-group">--}}
                                {{--                                                        <input class="form-control" id="end_date" name="end_date"--}}
                                {{--                                                               value="{{isset($register_soft->end_date) ?--}}
                                {{--                                   date('Y-m-d\TH:i', strtotime($register_soft->end_date)) : ''}}" type="text"/>--}}
                                {{--                                                        <div class="input-group-addon">--}}
                                {{--                                                        </div>--}}
                                {{--                                                        <span class="input-group-text"><i--}}
                                {{--                                                                class="far fa-calendar-alt"></i></span>--}}
                                {{--                                                    </div>--}}
                                {{--                                                    <p class="help-block text-danger"></p>--}}
                                {{--                                                    @if($errors->has('end_date'))--}}
                                {{--                                                        <p class="help-block text-danger">--}}
                                {{--                                                            {{ $errors->first('end_date') }}--}}
                                {{--                                                        </p>--}}
                                {{--                                                    @endif--}}
                                {{--                                                </div>--}}
                                {{--                                            </div>--}}
                            </div>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <div class="col-xs-12 form-group">
                                        <label class="registerservice1">Ghi Chú </label>
                                        <textarea rows="5" type="text" class="form-control"
                                                  name="notes">{{isset($register_soft->notes) ? old('notes', $register_soft->notes) : old('notes')}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <button class="btn btn-info">{{ __('general.save') }}</button>
                            <a href="{{ route('admin.list-services.index') }}"
                               class="btn btn-default">{{ __('general.back') }}</a>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </section>
@stop
@section('javascript')
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function () {
            $('#status').on('change', function () {
                let status = $('#status').val();
                if (status !== 'Chính thức') {
                    $('#date').addClass('hide');
                } else {
                    $('#date').removeClass('hide');
                }
            })
            let status = $('#status').val();
            if (status !== 'Chính thức') {
                $('#date').addClass('hide');
            } else {
                $('#date').removeClass('hide');
            }

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
        });
    </script>
@stop

