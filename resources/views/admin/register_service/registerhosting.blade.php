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
                Đăng ký dịch vụ hosting
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
                                        <label class="">Khách hàng <span
                                                class="aster">*</span></label>
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
                                        <label>Tên Hosting <span class="aster">*</span></label>
                                        <select onchange="selectHosting(this)"
                                                type="text"
                                                class="form-control"
                                                name="id_hosting"
                                                value=" ">
                                            <option value=" ">Choose Hosting</option>
                                            @foreach($hosting as $ht)
                                                <option value="{{$ht->id}}"
                                                        @if(isset($register_service->id) && $register_service->id_hosting == $ht->id)
                                                        selected
                                                        @endif
                                                        data-price="{{$ht->price}}"
                                                        data-capacity="{{$ht->capacity}}"
                                                        data-bandwith="{{$ht->bandwith}}"
                                                        data-sub-domain="{{$ht->sub_domain}}"
                                                        data-email="{{$ht->email}}"
                                                        data-ftp="{{$ht->ftp}}"
                                                        data-database="{{$ht->database}}"
                                                        data-adddon-domain="{{$ht->adddon_domain}}"
                                                        data-park-domain="{{$ht->park_domain}}"
                                                        data-notes="{{$ht->notes}}"
                                                >{{$ht->name}}</option>
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
                                        <label>Price <span
                                                class="aster">*</span></label>
                                        <input id="price" type="text"
                                               class="form-control"
                                               name="price" readonly
                                               value=" @foreach($hosting as $ht)@if(isset($register_service->id) && $register_service->id_hosting == $ht->id) {{$ht->price}} @endif @endforeach">
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
                                        <label>Dung Lượng <span
                                                class="aster">*</span></label>
                                        <input id="capacity" type="text"
                                               class="form-control"
                                               name="capacity" readonly
                                               value="@foreach($hosting as $ht)@if(isset($register_service->id) && $register_service->id_hosting == $ht->id) {{$ht->capacity}} @endif @endforeach">
                                        <p class="help-block text-danger"></p>
                                        @if($errors->has('capacity'))
                                        </p>
                                        <p class="help-block text-danger">
                                        {{ $errors->first('capacity') }}
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group">
                                        <label>Băng Thông <span
                                                class="aster">*</span></label>
                                        <input id="bandwith" type="text"
                                               class="form-control "
                                               name="bandwith" readonly
                                               value="@foreach($hosting as $ht)@if(isset($register_service->id) && $register_service->id_hosting == $ht->id) {{$ht->bandwith}} @endif @endforeach">
                                        <p class="help-block text-danger"></p>
                                        @if($errors->has('bandwith'))
                                            <p class="help-block text-danger">
                                                {{ $errors->first('bandwith') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group">
                                        <label>Sub-domain <span
                                                class="aster">*</span></label>
                                        <input id="sub_domain" type="text"
                                               class="form-control "
                                               name="sub_domain" readonly
                                               value="@foreach($hosting as $ht)@if(isset($register_service->id) && $register_service->id_hosting == $ht->id) {{$ht->sub_domain}} @endif @endforeach">
                                        <p class="help-block text-danger"></p>
                                        @if($errors->has('sub_domain'))
                                            <p class="help-block text-danger">
                                                {{ $errors->first('sub_domain') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group">
                                        <label>Email <span
                                                class="aster">*</span></label>
                                        <input id="email" type="text"
                                               class="form-control "
                                               name="email" readonly
                                               value="@foreach($hosting as $ht)@if(isset($register_service->id) && $register_service->id_hosting == $ht->id) {{$ht->email}} @endif @endforeach">
                                        <p class="help-block text-danger"></p>
                                        @if($errors->has('email'))
                                            <p class="help-block text-danger">
                                                {{ $errors->first('email') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group">
                                        <label>FTP <span class="aster">*</span></label>
                                        <input id="ftp" type="text"
                                               class="form-control "
                                               name="ftp" readonly
                                               value="@foreach($hosting as $ht)@if(isset($register_service->id) && $register_service->id_hosting == $ht->id) {{$ht->ftp}} @endif @endforeach">
                                        <p class="help-block text-danger"></p>
                                        @if($errors->has('ftp'))
                                            <p class="help-block text-danger">
                                                {{ $errors->first('ftp') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group">
                                        <label>Database <span
                                                class="aster">*</span></label>
                                        <input id="database" type="text"
                                               class="form-control "
                                               name="database" readonly
                                               value="@foreach($hosting as $ht)@if(isset($register_service->id) && $register_service->id_hosting == $ht->id) {{$ht->database}} @endif @endforeach">
                                        <p class="help-block text-danger"></p>
                                        @if($errors->has('database'))
                                            <p class="help-block text-danger">
                                                {{ $errors->first('database') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group">
                                        <label>Addon-domain <span class="aster">*</span></label>
                                        <input id="adddon_domain" type="text"
                                               class="form-control "
                                               name="adddon_domain"
                                               readonly
                                               value="@foreach($hosting as $ht)@if(isset($register_service->id) && $register_service->id_hosting == $ht->id) {{$ht->adddon_domain}} @endif @endforeach">
                                        <p class="help-block text-danger"></p>
                                        @if($errors->has('adddon_domain'))
                                            <p class="help-block text-danger">
                                                {{ $errors->first('adddon_domain') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group">
                                        <label>Park-domain <span class="aster">*</span></label>
                                        <input id="park_domain" type="text"
                                               class="form-control " name="park_domain"
                                               readonly
                                               value="@foreach($hosting as $ht)@if(isset($register_service->id) && $register_service->id_hosting == $ht->id) {{$ht->park_domain}} @endif @endforeach">
                                        <p class="help-block text-danger"></p>
                                        @if($errors->has('park_domain'))
                                            <p class="help-block text-danger">
                                                {{ $errors->first('park_domain') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Địa chỉ domain <span class="aster">*</span></label>
                                    <input id="address_domain2" type="text"
                                           class="form-control "
                                           name="address_domain2"
                                           value="">
                                    <p class="help-block text-danger"></p>
                                    @if($errors->has('address_domain2'))
                                        <p class="help-block text-danger">
                                            {{ $errors->first('address_domain2') }}
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

                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="col-xs-12 form-group ">
                                        <label class="">Ngày bắt đầu <span class="aster">*</span></label>
                                        <div class="input-group">
                                            <input class="form-control" id="start_date2" name="start_date" type="text"/>
                                            <div class="input-group-addon">
                                            </div>
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <p class="help-block text-danger"></p>
                                        @if($errors->has('start_date2'))
                                            <p class="help-block text-danger">
                                                {{ $errors->first('start_date2') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                {{--                                                        <div class="form-group col-md-6">--}}
                                {{--                                                            <div class="col-xs-12 form-group">--}}
                                {{--                                                                <label class="registerservice1">Ngày kết thúc <span class="aster">*</span></label>--}}
                                {{--                                                                <div class="input-group">--}}
                                {{--                                                                    <input class="form-control" id="end_date2" name="end_date2" type="text"/>--}}
                                {{--                                                                    <div class="input-group-addon">--}}
                                {{--                                                                    </div>--}}
                                {{--                                                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>--}}
                                {{--                                                                </div>--}}
                                {{--                                                                <p class="help-block text-danger"></p>--}}
                                {{--                                                                @if($errors->has('end_date2'))--}}
                                {{--                                                                    <p class="help-block text-danger">--}}
                                {{--                                                                        {{ $errors->first('end_date2') }}--}}
                                {{--                                                                    </p>--}}
                                {{--                                                                @endif--}}
                                {{--                                                            </div>--}}
                                {{--                                                        </div>--}}
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
                    </div>


                    <!--/.Accordion wrapper-->


                    <hr>
                    <div class="event_">
                        <button class="btn btn-default">{{ __('general.save') }}</button>
                        <a href="{{ route('admin.list-services.index') }}"
                           class="btn btn-default">{{ __('general.back') }}</a>
                    </div>


                </form>
            </div>

        </div>


    </section>
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function () {
            $("#start_date2").datepicker({
                format: 'dd-mm-yyyy ',
                autoclose: true,
            }).on('changeDate', function (selected) {
                var minDate = new Date(selected.date.valueOf());
                $('#end_date2').datepicker('setStartDate', minDate);
            });

            $("#end_date2").datepicker({
                format: 'dd-mm-yyyy',
                autoclose: true,
            }).on('changeDate', function (selected) {
                var minDate = new Date(selected.date.valueOf());
                $('#start_date2').datepicker('setEndDate', minDate);
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

