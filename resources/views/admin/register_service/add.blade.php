@extends('layout.master')
@section('css')
    <style>
        body {
            font-family: "Roboto";
        }
    </style>
@stop
@section('content')


    <!-- Main content -->
    <section class="content ">
        <div class="">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="titleheader">Đăng ký dịch vụ</h1>
                            <form action="{{route('admin.list-services.post')}}" method="post">
                                <p class="help-block text-danger"></p>
                                @if($errors->has('id_domain'))
                                    <p class="help-block text-danger">
                                        {{ $errors->first('id_domain') }}
                                    </p>
                                @endif
                                <input type="hidden" name="id"
                                       value="{{isset($register_service->id) ? $register_service->id: ''}}">
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
                                    <div class="panel-body">
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <div class="col-xs-12 form-group">
                                                    <label style="margin-top: 20px;" class="registerservice1">Khách hàng <span class="aster">*</span></label>
                                                    <select class="js-example-basic-single form-control" name="id_customer">
                                                        @foreach($customer as $cus)

                                                            <option value="{{$cus->id}}"> {{$cus->name}}-{{$cus->email}}</option>
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

                                        </div>
                                        {{-- ví dụ nha--}}
                                        <div class="accordion md-accordion accordion-blocks" id="accordionEx78"
                                             role="tablist"
                                             aria-multiselectable="true">

                                            <!-- Accordion card -->
                                            <div class="form-row ">
                                                <div class="form-group col-md-6">
                                                    {{--  Domain--}}
                                                    <div id="color1" class="card abcdef" >

                                                        <!-- Card header -->
                                                        <div class="card-header" role="tab" id="heading79">

                                                            <!--Options-->


                                                            <!-- Heading -->
                                                            <a data-toggle="collapse" data-parent="#accordionEx78"
                                                               href="#collapse79" aria-expanded="true"
                                                               aria-controls="collapse79" class="active">
                                                                <h5 class="mt-1 mb-0">
                                                                    <label class="registerservice">Domain</label>

                                                                </h5>
                                                            </a>

                                                        </div>

                                                        <!-- Card body -->

                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6 abcde">
                                                    {{-- Hosting--}}
                                                    <div id="color2" class="card abcdef" >

                                                        <!-- Card header -->
                                                        <div class="card-header" role="tab" id="headingUnfiled">

                                                            <!--Options-->


                                                            <!-- Heading -->
                                                            <a data-toggle="collapse" data-parent="#accordionEx78"
                                                               href="#collapseUnfiled" aria-expanded="true"
                                                               aria-controls="collapseUnfiled"  >
                                                                <h5 class="mt-1 mb-0 abc">
                                                                    <label class="registerservice">Hosting</label>

                                                                </h5>
                                                            </a>

                                                        </div>

                                                        <!-- Card body -->
{{--                                                        Lấy khỏi đây--}}
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <div id="collapse79" class="collapse " role="tabpanel"
                                                         aria-labelledby="heading79"
                                                         data-parent="#accordionEx78">
                                                        <div class="card-body">

                                                            <!--Top Table UI-->
                                                            <div class="table-ui p-2 mb-3 mx-3 mb-4" >

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
                                                                        <div class="col-xs-12 form-group ">
                                                                            <label class="">Ngày bắt đầu <span class="aster">*</span></label>
                                                                            <input type="datetime-local" class="form-control " name="start_date"
                                                                                   value="">
                                                                            <p class="help-block text-danger"></p>
                                                                            @if($errors->has('start_date'))
                                                                                <p class="help-block text-danger">
                                                                                    {{ $errors->first('start_date') }}
                                                                                </p>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <div class="col-xs-12 form-group">
                                                                            <label class="">Ngày kết thúc <span class="aster">*</span></label>
                                                                            <input type="datetime-local" class="form-control " name="end_date"
                                                                                   value="">
                                                                            <p class="help-block text-danger"></p>
                                                                            @if($errors->has('end_date'))
                                                                                <p class="help-block text-danger">
                                                                                    {{ $errors->first('end_date') }}
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

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    {{--                                                    Để vào đây--}}
                                                    <div id="collapseUnfiled" class="collapse" role="tabpanel"
                                                         aria-labelledby="headingUnfiled"
                                                         data-parent="#accordionEx78">
                                                        <div class="card-body">

                                                            <!--Top Table UI-->
                                                            <div class="table-ui p-2 mb-3 mx-3 mb-4" >

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
                                                                        <div class="col-xs-12 form-group ">
                                                                            <label class="registerservice1">Ngày bắt đầu <span class="aster">*</span></label>
                                                                            <input type="datetime-local" class="form-control " name="start_date2"
                                                                                   value="">
                                                                            <p class="help-block text-danger"></p>
                                                                            @if($errors->has('start_date2'))
                                                                                <p class="help-block text-danger">
                                                                                    {{ $errors->first('start_date2') }}
                                                                                </p>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <div class="col-xs-12 form-group">
                                                                            <label class="registerservice1">Ngày kết thúc <span class="aster">*</span></label>
                                                                            <input type="datetime-local" class="form-control " name="end_date2"
                                                                                   value="">
                                                                            <p class="help-block text-danger"></p>
                                                                            @if($errors->has('end_date2'))
                                                                                <p class="help-block text-danger">
                                                                                    {{ $errors->first('end_date2') }}
                                                                                </p>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    {{-- Vps--}}
                                                    <div id="color3" class="card abcdef">

                                                        <!-- Card header -->
                                                        <div class="card-header" role="tab" id="heading80">

                                                            <!--Options-->


                                                            <!-- Heading -->
                                                            <a data-toggle="collapse" data-parent="#accordionEx78"
                                                               href="#collapse80" aria-expanded="true"
                                                               aria-controls="collapse80">
                                                                <h5 class="mt-1 mb-0">
                                                                    <label class="registerservice">VPS</label>

                                                                </h5>
                                                            </a>

                                                        </div>

                                                        <!-- Card body -->

                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    {{-- Email--}}
                                                    <div id="color4" class="card abcdef">

                                                        <!-- Card header -->
                                                        <div class="card-header" role="tab" id="heading81">

                                                            <!--Options-->


                                                            <!-- Heading -->
                                                            <a data-toggle="collapse" data-parent="#accordionEx78"
                                                               href="#collapse81" aria-expanded="true"
                                                               aria-controls="collapse81">
                                                                <h5 class="mt-1 mb-0">
                                                                    <label class="registerservice">Email</label>

                                                                </h5>
                                                            </a>

                                                        </div>

                                                        <!-- Card body -->

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    {{--                                                    Để vào đây--}}
                                                    <div id="collapse80" class="collapse" role="tabpanel"
                                                         aria-labelledby="heading80"
                                                         data-parent="#accordionEx78">
                                                        <div class="card-body">

                                                            <!--Top Table UI-->
                                                            <div class="table-ui p-2 mb-3 mx-3 mb-4" >

                                                                <!--Grid row-->
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-6">
                                                                        <div class="col-xs-12 form-group">
                                                                            <label>Tên VPS <span
                                                                                    class="aster">*</span></label>
                                                                            <select onchange="selectVPS(this)" type="text"
                                                                                    class="form-control" name="id_vps"
                                                                                    value="">
                                                                                <option value="">Choose VPS</option>
                                                                                @foreach($vps as $vp)
                                                                                    <option value="{{$vp->id}}"
                                                                                            @if(isset($register_service->id) && $register_service->id_vps == $vp->id)
                                                                                            selected
                                                                                            @endif
                                                                                            data-price="{{$vp->price}}"
                                                                                            data-cpu="{{$vp->cpu}}"
                                                                                            data-capacity="{{$vp->capacity}}"
                                                                                            data-ram="{{$vp->ram}}"
                                                                                            data-bandwith="{{$vp->bandwith}}"
                                                                                            data-technical="{{$vp->technical}}"
                                                                                            data-operating-system="{{$vp->operating_system}}"
                                                                                            data-backup="{{$vp->backup}}"
                                                                                            data-panel="{{$vp->panel}}"
                                                                                            data-notes="{{$vp->notes}}"
                                                                                    >{{$vp->name}}</option>
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
                                                                            <label>Giá <span
                                                                                    class="aster">*</span></label>
                                                                            <input id="price_hosting" type="text"
                                                                                   class="form-control" name="price"
                                                                                   readonly
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
                                                                            <label>CPU <span class="aster">*</span></label>
                                                                            <input id="cpu" type="text"
                                                                                   class="form-control" name="cpu"
                                                                                   readonly
                                                                                   value="">
                                                                            <p class="help-block text-danger"></p>
                                                                            @if($errors->has('cpu'))
                                                                                <p class="help-block text-danger">
                                                                                    {{ $errors->first('cpu') }}
                                                                                </p>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <div class="col-xs-12 form-group">
                                                                            <label>Dung Lượng <span
                                                                                    class="aster">*</span></label>
                                                                            <input id="capacity_hosting" type="text"
                                                                                   class="form-control "
                                                                                   name="capacity"
                                                                                   readonly
                                                                                   value="">
                                                                            <p class="help-block text-danger"></p>
                                                                            @if($errors->has('capacity'))
                                                                                <p class="help-block text-danger">
                                                                                    {{ $errors->first('capacity') }}
                                                                                </p>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-row">
                                                                    <div class="form-group col-md-6">
                                                                        <div class="col-xs-12 form-group">
                                                                            <label>Ram <span class="aster">*</span></label>
                                                                            <input id="ram" type="text"
                                                                                   class="form-control " name="ram"
                                                                                   readonly
                                                                                   value="">
                                                                            <p class="help-block text-danger"></p>
                                                                            @if($errors->has('ram'))
                                                                                <p class="help-block text-danger">
                                                                                    {{ $errors->first('ram') }}
                                                                                </p>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <div class="col-xs-12 form-group">
                                                                            <label>Băng Thông <span
                                                                                    class="aster">*</span></label>
                                                                            <input id="bandwith_hosting" type="text"
                                                                                   class="form-control "
                                                                                   name="bandwith"
                                                                                   readonly
                                                                                   value="">
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
                                                                            <label>Công nghệ ảo hóa <span
                                                                                    class="aster">*</span></label>
                                                                            <input id="technical" type="text"
                                                                                   class="form-control "
                                                                                   name="technical" readonly
                                                                                   value="">
                                                                            <p class="help-block text-danger"></p>
                                                                            @if($errors->has('technical'))
                                                                                <p class="help-block text-danger">
                                                                                    {{ $errors->first('technical') }}
                                                                                </p>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <div class="col-xs-12 form-group">
                                                                            <label>Hệ điều hành <span class="aster">*</span></label>
                                                                            <input id="operating_system" type="text"
                                                                                   class="form-control "
                                                                                   name="operating_system" readonly
                                                                                   value="">
                                                                            <p class="help-block text-danger"></p>
                                                                            @if($errors->has('operating_system'))
                                                                                <p class="help-block text-danger">
                                                                                    {{ $errors->first('operating_system') }}
                                                                                </p>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-6">
                                                                        <div class="col-xs-12 form-group">
                                                                            <label>Backup <span
                                                                                    class="aster">*</span></label>
                                                                            <input id="backup" type="text"
                                                                                   class="form-control "
                                                                                   name="backup" readonly
                                                                                   value="">
                                                                            <p class="help-block text-danger"></p>
                                                                            @if($errors->has('backup'))
                                                                                <p class="help-block text-danger">
                                                                                    {{ $errors->first('backup') }}
                                                                                </p>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <div class="col-xs-12 form-group">
                                                                            <label>Panel <span
                                                                                    class="aster">*</span></label>
                                                                            <input id="panel" type="text"
                                                                                   class="form-control "
                                                                                   name="panel" readonly
                                                                                   value="">
                                                                            <p class="help-block text-danger"></p>
                                                                            @if($errors->has('panel'))
                                                                                <p class="help-block text-danger">
                                                                                    {{ $errors->first('panel') }}
                                                                                </p>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-12">

                                                                        <label>Địa chỉ domain <span class="aster">*</span></label>
                                                                        <input id="address_domain3" type="text"
                                                                               class="form-control "
                                                                               name="address_domain3"
                                                                               value="">
                                                                        <p class="help-block text-danger"></p>
                                                                        @if($errors->has('address_domain3'))
                                                                            <p class="help-block text-danger">
                                                                                {{ $errors->first('address_domain3') }}
                                                                            </p>
                                                                        @endif

                                                                    </div>

                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-6">
                                                                        <div class="col-xs-12 form-group ">
                                                                            <label class="registerservice1">Ngày bắt đầu <span class="aster">*</span></label>
                                                                            <input type="datetime-local" class="form-control " name="start_date3"
                                                                                   value="">
                                                                            <p class="help-block text-danger"></p>
                                                                            @if($errors->has('start_date3'))
                                                                                <p class="help-block text-danger">
                                                                                    {{ $errors->first('start_date3') }}
                                                                                </p>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <div class="col-xs-12 form-group">
                                                                            <label class="registerservice1">Ngày kết thúc <span class="aster">*</span></label>
                                                                            <input type="datetime-local" class="form-control " name="end_date3"
                                                                                   value="">
                                                                            <p class="help-block text-danger"></p>
                                                                            @if($errors->has('end_date3'))
                                                                                <p class="help-block text-danger">
                                                                                    {{ $errors->first('end_date3') }}
                                                                                </p>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <hr>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    {{--                                                    Để vào đây--}}
                                                    <div id="collapse81" class="collapse " role="tabpanel"
                                                         aria-labelledby="heading81"
                                                         data-parent="#accordionEx78">
                                                        <div class="card-body">

                                                            <!--Top Table UI-->
                                                            <div class="table-ui p-2 mb-3 mx-3 mb-4">

                                                                <!--Grid row-->
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-6">
                                                                        <div class="col-xs-12 form-group">
                                                                            <label>Tên <span class="aster">*</span></label>
                                                                            <select onchange="selectEmail(this)" type="text" class="form-control"
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
                                                                            <input id="price_email" type="text" class="form-control" name="price" readonly
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
                                                                            <input id="capacity_email" type="text" class="form-control" name="capacity" readonly
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
                                                                            <input id="email_number" type="text" class="form-control " name="email_number"
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
                                                                            <input id="email_forwarder" type="text" class="form-control " name="email_forwarder"
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
                                                                            <input id="email_list" type="text" class="form-control " name="email_list" readonly
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

                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-12">
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
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-6">
                                                                        <div class="col-xs-12 form-group ">
                                                                            <label class="registerservice1">Ngày bắt đầu <span class="aster">*</span></label>
                                                                            <input type="datetime-local" class="form-control " name="start_date4"
                                                                                   value="">
                                                                            <p class="help-block text-danger"></p>
                                                                            @if($errors->has('start_date4'))
                                                                                <p class="help-block text-danger">
                                                                                    {{ $errors->first('start_date4') }}
                                                                                </p>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <div class="col-xs-12 form-group">
                                                                            <label class="registerservice1">Ngày kết thúc <span class="aster">*</span></label>
                                                                            <input type="datetime-local" class="form-control " name="end_date4"
                                                                                   value="">
                                                                            <p class="help-block text-danger"></p>
                                                                            @if($errors->has('end_date4'))
                                                                                <p class="help-block text-danger">
                                                                                    {{ $errors->first('end_date4') }}
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

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    {{--  SSL--}}
                                                    <div id="color5" class="card abcdef" >

                                                        <!-- Card header -->
                                                        <div class="card-header" role="tab" id="heading82">

                                                            <!--Options-->


                                                            <!-- Heading -->
                                                            <a data-toggle="collapse" data-parent="#accordionEx78"
                                                               href="#collapse82" aria-expanded="true"
                                                               aria-controls="collapse82">
                                                                <h5 class="mt-1 mb-0">
                                                                    <label class="registerservice">SSL</label>

                                                                </h5>
                                                            </a>

                                                        </div>

                                                        <!-- Card body -->

                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    {{-- Website--}}
                                                    <div id="color6" class="card abcdef" >

                                                        <!-- Card header -->
                                                        <div  class="card-header" role="tab" id="heading83">

                                                            <!--Options-->


                                                            <!-- Heading -->
                                                            <a data-toggle="collapse" data-parent="#accordionEx78"
                                                               href="#collapse83" aria-expanded="true"
                                                               aria-controls="collapse83">
                                                                <h5 class="mt-1 mb-0">
                                                                    <label class="registerservice">Website</label>

                                                                </h5>
                                                            </a>

                                                        </div>

                                                        <!-- Card body -->

                                                    </div>

                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    {{--                                                    Để vào đây--}}
                                                    <div id="collapse82" class="collapse " role="tabpanel"
                                                         aria-labelledby="heading82"
                                                         data-parent="#accordionEx78">
                                                        <div class="card-body">

                                                            <!--Top Table UI-->
                                                            <div class="table-ui p-2 mb-3 mx-3 mb-4">

                                                                <!--Grid row-->
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-6">
                                                                        <div class="col-xs-12 form-group">
                                                                            <label>Tên <span class="aster">*</span></label>
                                                                            <select onchange="selectSSL(this)" type="text" class="form-control"
                                                                                    name="id_ssl"
                                                                                    value="">
                                                                                <option value="">Choose SSL</option>
                                                                                @foreach($ssl as $s)
                                                                                    <option value="{{$s->id}}"
                                                                                            @if(isset($register_service->id) && $register_service->id_ssl== $s->id)
                                                                                            selected
                                                                                            @endif
                                                                                            data-price="{{$s->price}}"
                                                                                            data-insurance-policy="{{$s->insurance_policy}}"
                                                                                            data-domain-number="{{$s->domain_number}}"
                                                                                            data-reliability="{{$s->reliability}}"
                                                                                            data-green-bar="{{$s->green_bar}}"
                                                                                            data-sans="{{$s->sans}}"
                                                                                            data-notes="{{$s->notes}}"
                                                                                    >{{$s->name}}</option>
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
                                                                            <input id="price_ssl" type="number" class="form-control" name="price" readonly
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
                                                                            <label>Insurance Policy <span class="aster">*</span></label>
                                                                            <input id="insurance_policy" type="text" class="form-control"
                                                                                   name="insurance_policy" readonly
                                                                                   value="">
                                                                            <p class="help-block text-danger"></p>
                                                                            @if($errors->has('insurance_policy'))
                                                                                <p class="help-block text-danger">
                                                                                    {{ $errors->first('insurance_policy') }}
                                                                                </p>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <div class="col-xs-12 form-group">
                                                                            <label>Domain Number <span class="aster">*</span></label>
                                                                            <input id="domain_number" type="text" class="form-control " name="domain_number"
                                                                                   readonly
                                                                                   value="">
                                                                            {{--                            old nếu tồn tại dữ liệu cũ thì show ra , còn không thì để rỗng--}}
                                                                            <p class="help-block text-danger"></p>
                                                                            @if($errors->has('domain_number'))
                                                                                <p class="help-block text-danger">
                                                                                    {{ $errors->first('domain_number') }}
                                                                                </p>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-row">
                                                                    <div class="form-group col-md-6">
                                                                        <div class="col-xs-12 form-group">
                                                                            <label>Reliability <span class="aster">*</span></label>
                                                                            <input id="reliability" type="text" class="form-control " name="reliability"
                                                                                   readonly
                                                                                   value="">
                                                                            {{--                            old nếu tồn tại dữ liệu cũ thì show ra , còn không thì để rỗng--}}
                                                                            <p class="help-block text-danger"></p>
                                                                            @if($errors->has('reliability'))
                                                                                <p class="help-block text-danger">
                                                                                    {{ $errors->first('reliability') }}
                                                                                </p>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <div class="col-xs-12 form-group">
                                                                            <label>Green Bar <span class="aster">*</span></label>
                                                                            <input id="green_bar" type="text" class="form-control " name="green_bar" readonly
                                                                                   value="">
                                                                            <p class="help-block text-danger"></p>
                                                                            @if($errors->has('green_bar'))
                                                                                <p class="help-block text-danger">
                                                                                    {{ $errors->first('green_bar') }}
                                                                                </p>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-row">
                                                                    <div class="form-group col-md-6">
                                                                        <div class="col-xs-12 form-group">
                                                                            <label>Sans <span class="aster">*</span></label>
                                                                            <input id="sans" type="text" class="form-control " name="sans" readonly
                                                                                   value="">
                                                                            <p class="help-block text-danger"></p>
                                                                            @if($errors->has('sans'))
                                                                                <p class="help-block text-danger">
                                                                                    {{ $errors->first('sans') }}
                                                                                </p>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-6">

                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-12">
                                                                        <label>Địa chỉ domain <span class="aster">*</span></label>
                                                                        <input id="address_domain5" type="text"
                                                                               class="form-control "
                                                                               name="address_domain5"
                                                                               value="">
                                                                        <p class="help-block text-danger"></p>
                                                                        @if($errors->has('address_domain5'))
                                                                            <p class="help-block text-danger">
                                                                                {{ $errors->first('address_domain5') }}
                                                                            </p>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-6">
                                                                        <div class="col-xs-12 form-group ">
                                                                            <label class="registerservice1">Ngày bắt đầu <span class="aster">*</span></label>
                                                                            <input type="datetime-local" class="form-control " name="start_date5"
                                                                                   value="">
                                                                            <p class="help-block text-danger"></p>
                                                                            @if($errors->has('start_date5'))
                                                                                <p class="help-block text-danger">
                                                                                    {{ $errors->first('start_date5') }}
                                                                                </p>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <div class="col-xs-12 form-group">
                                                                            <label class="registerservice1">Ngày kết thúc <span class="aster">*</span></label>
                                                                            <input type="datetime-local" class="form-control " name="end_date5"
                                                                                   value="">
                                                                            <p class="help-block text-danger"></p>
                                                                            @if($errors->has('end_date5'))
                                                                                <p class="help-block text-danger">
                                                                                    {{ $errors->first('end_date5') }}
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

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    {{--                                                    Để vào đây--}}
                                                    <div id="collapse83" class="collapse " role="tabpanel"
                                                         aria-labelledby="heading83"
                                                         data-parent="#accordionEx78">
                                                        <div class="card-body">

                                                            <!--Top Table UI-->
                                                            <div class="table-ui p-2 mb-3 mx-3 mb-4">

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

                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-12">
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
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-6">
                                                                        <div class="col-xs-12 form-group ">
                                                                            <label class="registerservice1">Ngày bắt đầu <span class="aster">*</span></label>
                                                                            <input type="datetime-local" class="form-control " name="start_date6"
                                                                                   value="">
                                                                            <p class="help-block text-danger"></p>
                                                                            @if($errors->has('start_date'))
                                                                                <p class="help-block text-danger">
                                                                                    {{ $errors->first('start_date') }}
                                                                                </p>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <div class="col-xs-12 form-group">
                                                                            <label class="registerservice1">Ngày kết thúc <span class="aster">*</span></label>
                                                                            <input type="datetime-local" class="form-control " name="end_date6"
                                                                                   value="">
                                                                            <p class="help-block text-danger"></p>
                                                                            @if($errors->has('end_date'))
                                                                                <p class="help-block text-danger">
                                                                                    {{ $errors->first('end_date') }}
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

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{--  Thêm thanh vào đây  --}}
                                        </div>
                                        <!--/.Accordion wrapper-->

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <div class="col-xs-12 form-group">
                                                    <label class="registerservice1">Ghi Chú </label>
                                                    <textarea rows="5" type="text" class="form-control"
                                                              name="notes">{{isset($register_service->notes) ? old('notes', $register_service->notes) : old('notes')}}</textarea>
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
                        <!-- /.card -->
                    </div>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
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

