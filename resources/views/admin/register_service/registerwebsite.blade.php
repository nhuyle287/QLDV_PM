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
                Đăng ký dịch vụ website
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
                                        <label  class="">Khách hàng <span class="aster">*</span></label>
                                        <select class="js-example-basic-single form-control" name="id_customer">
                                            @foreach($customer as $cus)
                                                <option value="{{$cus->id}}"> {{$cus->name}} - {{$cus->email}}</option>
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
                                               class="">Nhân viên <span
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
                                        <label>Website Name <span class="aster">*</span></label>
                                        <select onchange="selectWebsite(this)" class="form-control"
                                                name="id_website">
                                            <option value="">Choose Website</option>
                                            @foreach($website as $w)
                                                <option value="{{$w->id}}"
                                                        @if(isset($register_service->id) && $register_service->id_website == $w->id)
                                                        selected
                                                        @endif
                                                        data-type-website="{{$w->type_website}}"
                                                        data-price="{{$w->price}}"
                                                        data-notes="{{$w->notes}}"
                                                >{{$w->name}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('name'))
                                            <p class="help-block text-danger">
                                                {{ $errors->first('name') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group">
                                        <label>Type Website <span class="aster">*</span></label>
                                        <input id="type_website" type="text" class="form-control" name="type_website"
                                               readonly
                                               value="">
                                        <p class="help-block text-danger"></p>
                                        @if($errors->has('type_website'))
                                            <p class="help-block text-danger">
                                                {{ $errors->first('type_website') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group">
                                        <label>Price <span class="aster">*</span></label>
                                        <input id="price_website" type="text" class="form-control" name="price" readonly
                                               value="">
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
                                        <label>Địa chỉ domain <span class="aster">*</span></label>
                                        <input id="address_domain6" type="text"
                                               class="form-control "
                                               name="address_domain6"
                                               value="">
                                        <p class="help-block text-danger"></p>
                                        @if($errors->has('address_domain6'))
                                            <p class="help-block text-danger">
                                                {{ $errors->first('address_domain6') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">

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
                                        <label class="">Ngày bắt đầu <span class="aster">*</span></label>
                                        <div class="input-group">
                                            <input class="form-control" id="start_date6" name="start_date" type="text"/>
                                            <div class="input-group-addon">
                                            </div>
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <p class="help-block text-danger"></p>
                                        @if($errors->has('start_date6'))
                                            <p class="help-block text-danger">
                                                {{ $errors->first('start_date6') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                {{--                                                        <div class="form-group col-md-6">--}}
                                {{--                                                            <div class="col-xs-12 form-group">--}}
                                {{--                                                                <label class="registerservice1">Ngày kết thúc <span class="aster">*</span></label>--}}
                                {{--                                                                <div class="input-group">--}}
                                {{--                                                                    <input class="form-control" id="end_date6" name="end_date6" type="text"/>--}}
                                {{--                                                                    <div class="input-group-addon">--}}
                                {{--                                                                    </div>--}}
                                {{--                                                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>--}}
                                {{--                                                                </div>--}}
                                {{--                                                                <p class="help-block text-danger"></p>--}}
                                {{--                                                                @if($errors->has('end_date6'))--}}
                                {{--                                                                    <p class="help-block text-danger">--}}
                                {{--                                                                        {{ $errors->first('end_date6') }}--}}
                                {{--                                                                    </p>--}}
                                {{--                                                                @endif--}}
                                {{--                                                            </div>--}}
                                {{--                                                        </div>--}}
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">

                                </div>
                                <div class="form-group col-md-6">

                                </div>
                            </div>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <div class="col-xs-12 form-group">
                                        <label class="registerservice1">Ghi Chú </label>
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


                </form>

            </div>

        </div>

    </section>
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {

            $("#start_date6").datepicker({
                format: 'dd-mm-yyyy ',
                autoclose: true,
            }).on('changeDate', function (selected) {
                var minDate = new Date(selected.date.valueOf());
                $('#end_date6').datepicker('setStartDate', minDate);
            });

            $("#end_date6").datepicker({
                format: 'dd-mm-yyyy',
                autoclose: true,
            }).on('changeDate', function (selected) {
                var minDate = new Date(selected.date.valueOf());
                $('#start_date6').datepicker('setEndDate', minDate);
            });

            //
            $('.js-example-basic-single').select2();
            $('.abcdef').each(function () {
                $(this).on('click', function () {
                    var backColor = $(this).css('background-color');
                    if (backColor === 'rgb(233, 236, 239)') {
                        $(this).css('background-color', 'LightGray');
                    }
                    else {
                        $('.abcdef').css('background-color', 'LightGray');
                        $(this).css('background-color', '#e9ecef');
                    }
                })
            });


        });

    </script>

@stop

