@extends('layout.master')
@section('title')
    Danh sách dịch vụ đang sử dụng
@stop
@section('head')
    <link rel="stylesheet" href="{{ asset('../css/responsive.css') }}">
@stop
@section('content')

    <section class="body-content">
        <div class="card">

            <div class="card-header card-header-new">
                Cập nhật dịch vụ
            </div>
            <div class="card-body">
                <form action="{{route('admin.list-services.store')}}" method="post">
                    <p class="help-block text-danger"></p>
                    @if($errors->has('id_domain'))
                        <p class="help-block text-danger">
                            {{ $errors->first('id_domain') }}
                        </p>
                    @endif
                    <input type="hidden" name="id"
                           value="{{isset($register_service->id) ? $register_service->id: ''}}">
                    <input type="hidden" name="id_customer" value="{{$register_service->id_customer}}">
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
                                        <label style="margin-top: 20px;" class="registerservice1">Tên khách hàng <span class="aster">*</span></label>
                                        <input class="form-control" name="name_customer" readonly value="{{$customer->name}}">

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


                        <!-- Accordion card -->
                            <div class="form-row">
                                <div class="form-group col-md-12" style="@if(isset($register_service->id) && $register_service->id_domain!=null) display: block; @else display:none; @endif"  >
                                    {{--  Domain--}}
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
                                                <label>Phí Chuyển <span
                                                        class="aster">*</span></label>
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

                                    <hr>


                                </div>
                                <div class="form-group col-md-12" style="@if(isset($register_service->id) && $register_service->id_hosting!=null) display: block; @else display:none; @endif"  >
                                {{-- Hosting--}}

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
                                    </div>
                                    <hr>
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12" style="@if(isset($register_service->id) && $register_service->id_vps!=null) display: block; @else display:none; @endif " >
                                {{-- Vps--}}


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
                                                       value="@foreach($vps as $vp)@if(isset($register_service->id) && $register_service->id_vps == $vp->id) {{$vp->price}} @endif @endforeach">
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
                                                       value="@foreach($vps as $vp)@if(isset($register_service->id) && $register_service->id_vps == $vp->id) {{$vp->cpu}} @endif @endforeach">
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
                                                       value="@foreach($vps as $vp)@if(isset($register_service->id) && $register_service->id_vps == $vp->id) {{$vp->capacity}} @endif @endforeach">
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
                                                       value="@foreach($vps as $vp)@if(isset($register_service->id) && $register_service->id_vps == $vp->id) {{$vp->ram}} @endif @endforeach">
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
                                                       value="@foreach($vps as $vp)@if(isset($register_service->id) && $register_service->id_vps == $vp->id) {{$vp->bandwith}} @endif @endforeach">
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
                                                       value="@foreach($vps as $vp)@if(isset($register_service->id) && $register_service->id_vps == $vp->id) {{$vp->technical}} @endif @endforeach">
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
                                                       value="@foreach($vps as $vp)@if(isset($register_service->id) && $register_service->id_vps == $vp->id) {{$vp->operating_system}} @endif @endforeach">
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
                                                       value="@foreach($vps as $vp)@if(isset($register_service->id) && $register_service->id_vps == $vp->id) {{$vp->backup}} @endif @endforeach">
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
                                                       value="@foreach($vps as $vp)@if(isset($register_service->id) && $register_service->id_vps == $vp->id) {{$vp->panel}} @endif @endforeach">
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

                                        <div class="form-group col-md-6">

                                        </div>
                                    </div>

                                    <hr>
                                </div>

                                <div class="form-group col-md-12" style="@if(isset($register_service->id) && $register_service->id_email!=null) display: block; @else display:none; @endif"  >
                                {{-- Email--}}

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
                                                       value="@foreach($email as $e)@if(isset($register_service->id) && $register_service->id_email == $e->id) {{$e->price}} @endif @endforeach">
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
                                                       value="@foreach($email as $e)@if(isset($register_service->id) && $register_service->id_email == $e->id) {{$e->capacity}} @endif @endforeach">
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
                                                       value="@foreach($email as $e)@if(isset($register_service->id) && $register_service->id_email == $e->id) {{$e->email_number}} @endif @endforeach">
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
                                                       value="@foreach($email as $e)@if(isset($register_service->id) && $register_service->id_email == $e->id) {{$e->email_forwarder}} @endif @endforeach">
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
                                                       value="@foreach($email as $e)@if(isset($register_service->id) && $register_service->id_email == $e->id) {{$e->email_list}} @endif @endforeach">
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
                                                       value="@foreach($email as $e)@if(isset($register_service->id) && $register_service->id_email == $e->id) {{$e->parked_domains}} @endif @endforeach">
                                                <p class="help-block text-danger"></p>
                                                @if($errors->has('parked_domains'))
                                                    <p class="help-block text-danger">
                                                        {{ $errors->first('parked_domains') }}
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
                            <div class="form-row">
                                <div class="form-group col-md-12" style="@if(isset($register_service->id) && $register_service->id_ssl!=null) display: block; @else display:none; @endif " >
                                {{--  SSL--}}


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
                                                       value="@foreach($ssl as $s)@if(isset($register_service->id) && $register_service->id_ssl == $s->id) {{$s->price}} @endif @endforeach">
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
                                                       value="@foreach($ssl as $s)@if(isset($register_service->id) && $register_service->id_ssl == $s->id) {{$s->insurance_policy}} @endif @endforeach">
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
                                                       value="@foreach($ssl as $s)@if(isset($register_service->id) && $register_service->id_ssl == $s->id) {{$s->domain_number}} @endif @endforeach">
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
                                                       value="@foreach($ssl as $s)@if(isset($register_service->id) && $register_service->id_ssl == $s->id) {{$s->reliability}} @endif @endforeach">
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
                                                       value="@foreach($ssl as $s)@if(isset($register_service->id) && $register_service->id_ssl == $s->id) {{$s->green_bar}} @endif @endforeach">
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
                                                       value="@foreach($ssl as $s)@if(isset($register_service->id) && $register_service->id_ssl == $s->id) {{$s->sans}} @endif @endforeach">
                                                <p class="help-block text-danger"></p>
                                                @if($errors->has('sans'))
                                                    <p class="help-block text-danger">
                                                        {{ $errors->first('sans') }}
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

                                <div class="form-group col-md-12" style="@if(isset($register_service->id) && $register_service->id_website!=null) display: block; @else display:none; @endif " >
                                {{-- Website--}}


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
                                                       value="@foreach($website as $w)@if(isset($register_service->id) && $register_service->id_website == $w->id) {{$w->type_website}} @endif @endforeach">
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
                                                       value="@foreach($website as $w)@if(isset($register_service->id) && $register_service->id_website == $w->id) {{$w->price}} @endif @endforeach">
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

                                        </div>
                                        <div class="form-group col-md-6">

                                        </div>
                                    </div>
                                    <hr>

                                </div>
                            </div>


                            {{--  Thêm thanh vào đây  --}}
                        </div>
                        <!--/.Accordion wrapper-->
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="col-xs-12 form-group ">
                                    <div >
                                        <label class="registerservice1"  >Ngày bắt đầu <span class="aster">*</span></label>
                                        <div class="input-group">
                                            <input class="form-control" id="start_date" name="start_date"
                                                   value="{{ date('Y-m-d\TH:i', strtotime($register_service->start_date)) }}"type="text"/>
                                            <div class="input-group-addon">
                                            </div>
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        {{--                                                    <input type="datetime-local" class="form-control " name="start_date"--}}
                                        {{--                                                           value="{{ date('Y-m-d\TH:i', strtotime($register_service->start_date)) }}">--}}
                                        {{--                                                    <p class="help-block text-danger"></p>--}}
                                        @if($errors->has('start_date'))
                                            <p class="help-block text-danger">
                                                {{ $errors->first('start_date') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="col-xs-12 form-group">
                                    <div >
                                        <label class="registerservice1" >Ngày kết thúc <span class="aster">*</span></label>
                                        <div class="input-group">
                                            <input class="form-control" id="end_date" name="end_date"
                                                   value="{{date('Y-m-d\TH:i', strtotime($register_service->end_date))}}"type="text"/>
                                            <div class="input-group-addon">
                                            </div>
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        {{--                                                    <input type="datetime-local" class="form-control " name="end_date"--}}
                                        {{--                                                           value="{{date('Y-m-d\TH:i', strtotime($register_service->end_date))}}">--}}
                                        {{--                                                    <p class="help-block text-danger"></p>--}}
                                        @if($errors->has('end_date'))
                                            <p class="help-block text-danger">
                                                {{ $errors->first('end_date') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Địa chỉ domain <span class="aster">*</span></label>
                                <input id="address_domain" type="text"
                                       class="form-control "
                                       name="address_domain"
                                       value="{{$register_service->address_domain}}">
                                <p class="help-block text-danger"></p>
                                @if($errors->has('address_domain'))
                                    <p class="help-block text-danger">
                                        {{ $errors->first('address_domain') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <div class="col-xs-12 form-group">
                                    <label class="registerservice1">Ghi Chú </label>
                                    <textarea rows="5" type="text" class="form-control"
                                              name="notes">{{$register_service->notes}}</textarea>
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
@stop

@section('javascript')
    <script>

        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
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



        })


    </script>

@stop

