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
                Đăng ký dịch vụ email
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
                                        <label class="">Khách hàng
                                            <span class="aster">*</span></label>
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
                                        <label>Tên <span class="aster">*</span></label>
                                        <select onchange="selectEmail(this)" type="text"
                                                class="form-control"
                                                name="id_email"
                                                value="">
                                            <option value="">Choose Email</option>
                                            @foreach($email as $e)
                                                <option value="{{$e->id}}"
                                                        @if(isset($register_service->id) && $register_service->id_email== $e->id)
                                                        selected
                                                        @endif
                                                        data-price="{{$e->price}}"
                                                        data-capacity="{{$e->capacity}}"
                                                        data-email-number="{{$e->email_number}}"
                                                        data-email-forwarder="{{$e->email_forwarder}}"
                                                        data-email-list="{{$e->email_list}}"
                                                        data-parked-domains="{{$e->parked_domains}}"
                                                        data-notes="{{$e->notes}}"
                                                >{{$e->name}}</option>
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
                                        <label>Giá <span class="aster">*</span></label>
                                        <input id="price_email" type="text" class="form-control"
                                               name="price" readonly
                                               value="">
                                        <p class="help-block text-danger"></p>
                                        @if($errors->has('price'))
                                            <p class="help-block text-danger">
                                                {{ $errors->first('price') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group">
                                        <label>Dung Lượng <span class="aster">*</span></label>
                                        <input id="capacity_email" type="text" class="form-control"
                                               name="capacity" readonly
                                               value="">
                                        <p class="help-block text-danger"></p>
                                        @if($errors->has('capacity'))
                                            <p class="help-block text-danger">
                                                {{ $errors->first('capacity') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group">
                                        <label>Email Number <span class="aster">*</span></label>
                                        <input id="email_number" type="text" class="form-control "
                                               name="email_number"
                                               readonly
                                               value="">
                                        {{--                            old nếu tồn tại dữ liệu cũ thì show ra , còn không thì để rỗng--}}
                                        <p class="help-block text-danger"></p>
                                        @if($errors->has('email_number'))
                                            <p class="help-block text-danger">
                                                {{ $errors->first('email_number') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group">
                                        <label>Email Forwarder <span class="aster">*</span></label>
                                        <input id="email_forwarder" type="text" class="form-control "
                                               name="email_forwarder"
                                               readonly
                                               value="">
                                        <p class="help-block text-danger"></p>
                                        @if($errors->has('email_forwarder'))
                                            <p class="help-block text-danger">
                                                {{ $errors->first('email_forwarder') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group">
                                        <label>Email List <span class="aster">*</span></label>
                                        <input id="email_list" type="text" class="form-control "
                                               name="email_list" readonly
                                               value="">
                                        <p class="help-block text-danger"></p>
                                        @if($errors->has('email_list'))
                                            <p class="help-block text-danger">
                                                {{ $errors->first('email_list') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group">
                                        <label>Parked-domains <span class="aster">*</span></label>
                                        <input id="parked_domains_email" type="text" class="form-control "
                                               name="parked_domains" readonly
                                               value="">
                                        <p class="help-block text-danger"></p>
                                        @if($errors->has('parked_domains'))
                                            <p class="help-block text-danger">
                                                {{ $errors->first('parked_domains') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group">
                                        <label>Địa chỉ domain <span class="aster">*</span></label>
                                        <input id="address_domain4" type="text"
                                               class="form-control "
                                               name="address_domain4"
                                               value="">
                                        <p class="help-block text-danger"></p>
                                        @if($errors->has('address_domain4'))
                                            <p class="help-block text-danger">
                                                {{ $errors->first('address_domain4') }}
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
                                            <input class="form-control" id="start_date4" name="start_date"
                                                   value="" type="text"/>
                                            <div class="input-group-addon">
                                            </div>
                                            <span class="input-group-text"><i
                                                    class="far fa-calendar-alt"></i></span>
                                        </div>

                                        <p class="help-block text-danger"></p>
                                        @if($errors->has('start_date4'))
                                            <p class="help-block text-danger">
                                                {{ $errors->first('start_date4') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>

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
        $(document).ready(function () {

            $("#start_date4").datepicker({
                format: 'dd-mm-yyyy ',
                autoclose: true,
            }).on('changeDate', function (selected) {
                var minDate = new Date(selected.date.valueOf());
                $('#end_date4').datepicker('setStartDate', minDate);
            });

            $("#end_date4").datepicker({
                format: 'dd-mm-yyyy',
                autoclose: true,
            }).on('changeDate', function (selected) {
                var minDate = new Date(selected.date.valueOf());
                $('#start_date4').datepicker('setEndDate', minDate);
            });

            $('.js-example-basic-single').select2();
            $('.abcdef').each(function () {
                $(this).on('click', function () {
                    var backColor = $(this).css('background-color');
                    if (backColor === 'rgb(233, 236, 239)') {
                        $(this).css('background-color', 'LightGray');
                    } else {
                        $('.abcdef').css('background-color', 'LightGray');
                        $(this).css('background-color', '#e9ecef');
                    }
                })
            });


        });

    </script>

@stop

