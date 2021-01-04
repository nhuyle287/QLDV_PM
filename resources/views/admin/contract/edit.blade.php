@extends('layout.master')
@section('title')
    Hợp đồng
@stop
@section('head')
    <link rel="stylesheet" href="{{ asset('../css/responsive.css') }}">
    <style>

    </style>
@stop
@section('content')

    <section class="body-content">
        <div class="card">

            <div class="card-header card-header-new">
                Cập nhật hợp đồng
            </div>
            <div class="card-body">
                <form action="{{route("admin.contract.store")}}" method="POST" enctype="multipart/form-data"
                      id="form_dk">
                    {{--            <input type="hidden" name="id" value="{{isset($info->id) ? $info->id: ''}}">--}}
                    @csrf
                    <input type="hidden" name="id" value="{{isset($contract->id) ? $contract->id: ''}}">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="form-group col-xs-12">
                                <label>Bên A<span class="aster">*</span></label>
                                <input type="text" id="nameStore" class="form-control" name="nameStore"
                                       value="{{isset($contract->nameStore) ? old('nameStore', $contract->nameStore) : old('nameStore')}}"
                                       readonly>
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
                                <label>Người đại diện <span class="aster">*</span></label>
                                <select onchange="selectName(this)" type="text"
                                        class="form-control"
                                        name="name" required>
                                    <option selected="selected" value="">Chọn tên</option>
                                    @foreach($info as $ht)
                                        <option value="{{$ht->name}}"
                                                @if(isset($contract->id_customer) && $contract->id_customer === $ht->id)
                                                selected
                                                @endif
                                                data-id_customer="{{$ht->id}}"
                                                data-email="{{$ht->email}}"
                                                data-address="{{$ht->address}}"
                                                data-phone="{{$ht->phone_number}}"
                                                data-a="{{$ht->nameStore}}"
                                                data-position="{{$ht->position}}"
                                                data-fax_number="{{$ht->fax_number}}"
                                                data-tax_number="{{$ht->tax_number}}"
                                                data-account_number="{{$ht->account_number}}"
                                                data-open_at="{{$ht->open_at}}"
                                        >{{$ht->name}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Tên khách hàng không được trống.
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="form-group col-xs-12">
                                <label>Chức vụ<span class="aster">*</span></label>
                                <input type="text" id="position" class="form-control" readonly
                                       name="position"
                                       value="{{isset($contract->position) ? old('position', $contract->position) : old('position')}}"
                                       >
                                <p class="help-block text-danger"></p>

                                @if($errors->has('position'))
                                    <p class="help-block text-danger">
                                        {{ $errors->first('position') }}
                                    </p>
                                @endif

                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-group col-xs-12">
                                <label>Địa chỉ<span class="aster">*</span></label>
                                <input id="address" class="form-control" type="text" style="width: 100%;"
                                       name="address" readonly
                                       value="{{isset($contract->address) ? old('address', $contract->address) : old('address')}}">
                                <p class="help-block text-danger"></p>
                                @if($errors->has('address'))
                                </p>
                                <p class="help-block text-danger">
                                    {{ $errors->first('address') }}
                                    @endif
                                </p></td>

                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="form-group col-xs-12">
                                <label>Chức vụ<span class="aster">*</span></label>
                                <input type="text" id="position" class="form-control" readonly
                                       name="position"
                                       value="{{isset($contract->position) ? old('position', $contract->position) : old('position')}}"
                                >
                                <p class="help-block text-danger"></p>

                                @if($errors->has('position'))
                                    <p class="help-block text-danger">
                                        {{ $errors->first('position') }}
                                    </p>
                                @endif

                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-group col-xs-12">
                                <label>Địa chỉ<span class="aster">*</span></label>
                                <input id="address" class="form-control" type="text" style="width: 100%;"
                                       name="address" readonly
                                       value="{{isset($contract->address) ? old('address', $contract->address) : old('address')}}">
                                <p class="help-block text-danger"></p>
                                @if($errors->has('address'))
                                </p>
                                <p class="help-block text-danger">
                                    {{ $errors->first('address') }}
                                    @endif
                                </p></td>

                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="form-group col-xs-12">
                                <label>Số điện thoại<span class="aster">*</span></label>
                                <input id="telephone" class="form-control" type="text"
                                       name="phone_number" readonly
                                       value="{{isset($contract->phone_number) ? old('phone_number', $contract->phone_number) : old('phone_number')}}">
                                <p class="help-block text-danger"></p>
                                @if($errors->has('telephone'))
                                    <p class="help-block text-danger">
                                        {{ $errors->first('telephone') }}
                                    </p>
                                @endif

                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div class="form-group col-xs-12">
                                <label>Số Fax<span class="aster">*</span></label>
                                <input type="text" class="form-control" id="fax_number" name="fax_number"
                                       value="{{isset($contract->fax_number) ? old('fax_number', $contract->fax_number) : old('fax_number')}}"
                                       readonly>
                                <p class="help-block text-danger"></p>
                                @if($errors->has('address'))
                                </p>
                                <p class="help-block text-danger">
                                    {{ $errors->first('address') }}
                                    @endif
                                </p></td>

                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="form-group col-xs-12">
                                <label>Số tài khoản<span class="aster">*</span></label>
                                <input type="text" class="form-control" id="account_number"
                                       name="account_number"
                                       value="{{isset($contract->account_number) ? old('account_number', $contract->account_number) : old('account_number')}}"
                                       readonly>
                                <p class="help-block text-danger"></p>
                                @if($errors->has('account_number'))
                                    <p class="help-block text-danger">
                                        {{ $errors->first('account_number') }}
                                    </p>
                                @endif

                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div class="form-group col-xs-12">
                                <label>Mở tại<span class="aster">*</span></label>
                                <input type="text" class="form-control" id="open_at" name="open_at" readonly
                                       value="{{isset($contract->open_at) ? old('open_at', $contract->open_at) : old('open_at')}}">
                                <p class="help-block text-danger"></p>
                                @if($errors->has('address'))
                                </p>
                                <p class="help-block text-danger">
                                    {{ $errors->first('address') }}
                                    @endif
                                </p></td>

                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="form-group col-xs-12">
                                <label>Mã số thuế<span class="aster">*</span></label>
                                <input type="text" class="form-control" id="tax_number" name="tax_number"
                                       value="{{isset($contract->tax_number) ? old('tax_number', $contract->tax_number) : old('tax_number')}}"
                                       readonly>
                                <p class="help-block text-danger"></p>
                                @if($errors->has('account_number'))
                                    <p class="help-block text-danger">
                                        {{ $errors->first('account_number') }}
                                    </p>
                                @endif

                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div class="form-group col-xs-12">
                                <label>Email<span class="aster">*</span></label>
                                <input id="email" type="text" class="form-control"
                                       name="email" readonly
                                       value="{{isset($contract->email) ?  old('email', $contract->email) : old('email')}}">
                                <p class="help-block text-danger"></p>
                                @if($errors->has('address'))
                                </p>
                                <p class="help-block text-danger">
                                    {{ $errors->first('address') }}
                                    @endif
                                </p></td>

                            </div>
                        </div>
                    </div>




                    <h4 style="text-align: center"><b>CHI TIẾT HỢP ĐỒNG</b></h4>
                    <p><span></span></p><a id="t.6e7bac4e419786072c86b10c973cea5a54a1dbe4"></a><a
                        id="t.1"></a>

                    <div class="tdhv">
                        @if($contract->id_website !== null)
                            <div style="margin-left: 20px;" class="row">
                                <input type="hidden" id="id_website" class="form-control" readonly
                                       name="id_website"
                                       value="{{isset($contract->id_website) ? old('id_website', $contract->id_website) : old('id_website')}}"
                                       style="margin-top: 5px; margin-left: 3px">
                                <div class="form-group col-md-3">
                                    <div class="col-xs-12 form-group">
                                        <label>Tên hàng hóa, dịch vụ *</label>
                                        <select onchange="selectSWare(this)" type="text"
                                                class="form-control"
                                                id="nameSW" required
                                                name="nameSW"
                                        >
                                            <option selected="selected" value="">Chọn phần mềm</option>
                                            @foreach($website as $sw)
                                                <option value="{{$sw->name}}"
                                                        @if(isset($contract->id_website) && $contract->id_website === $sw->id)
                                                        selected
                                                        @endif
                                                        data-price="{{$sw->price}}"
                                                        data-id_website="{{$sw->id}}"
                                                >{{$sw->name}}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Tên phần mềm không được trống.
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <div class="col-xs-12 form-group">
                                        <label>Đơn giá(VNĐ) *</label>
                                        <input id="price" type="text" class="form-control"
                                               name="price" readonly
                                               value="{{isset($contract->price_web) ? old('price', $contract->price_web) : old('price')}}"
                                               data-id="price">
                                    </div>

                                </div>

                                <div class="form-group col-md-3">
                                    <div class="col-xs-12 form-group">
                                        <label>Số lượng *</label><br>
                                        <input id="quantity" type="text" class="form-control" name="quantity"
                                               data-id="quantity" required
                                               value="{{isset($contract->quantity_website) ?  old('quantity', $contract->quantity_website) : old('quantity')}}">
                                        <div class="invalid-feedback">
                                            Số lượng không được trống.
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group col-md-3">
                                    <label>Thành tiền(VNĐ) *</label>
                                    <div class="col-xs-12 form-group">
                                        <input id="total" type="text" class="form-control" name="total" readonly
                                               value="0">
                                    </div>
                                </div>

                            </div>
                        @endif
                        {{--                <div class="row event" STYLE="float: right" style="margin-bottom: 5px">--}}
                        {{--                    <a id="bt_contract_sw" class="btn btn-default">Thêm</a>--}}
                        {{--                </div>--}}
                    </div>
                    @if($contract->id_hosting!==null)
                        <div>
                            {{--                                <h4 style="text-align: center;">Duy trì Website</h4>--}}
                            <div style="margin-left: 20px;" class="row">
                                <input type="hidden" id="id_hosting" class="form-control" readonly
                                       name="id_hosting"
                                       value="{{isset($contract->id_hosting) ? old('id_hosting', $contract->id_hosting) : old('id_hosting')}}"
                                       style="margin-top: 5px; margin-left: 3px">
                                <div class="form-group col-md-3">
                                    <div class="col-xs-12 form-group">
                                        <label>Tên hosting *</label>
                                        <select onchange="selectNamehosting(this)" type="text"
                                                class="form-control"
                                                id="name_hosting" required
                                                name="name_hosting"
                                                value=" " style="margin-top: 5px;">
                                            <option selected="selected" value="">Chọn hosting</option>
                                            @foreach($hosting as $hting)
                                                <option value="{{$hting->capacity}}"
                                                        @if(isset($contract->id_hosting) && $contract->id_hosting === $hting->id)
                                                        selected
                                                        @endif
                                                        data-price_hosting="{{$hting->price}}"
                                                        data-id_hosting="{{$hting->id}}"

                                                >{{$hting->capacity}}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Tên hosting không được trống.
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <div class="col-xs-12 form-group">
                                        <label>Đơn giá(VNĐ) *</label>
                                        <input type="text" id="price_hosting" class="form-control" readonly
                                               name="price_hosting"
                                               value="{{isset($contract->price_hosting) ? old('price', $contract->price_hosting) : old('price')}}"
                                               data-id="price_hosting"
                                               style="margin-top: 5px; margin-left: 3px">
                                    </div>

                                </div>

                                <div class="form-group col-md-3">
                                    <div class="col-xs-12 form-group">
                                        <label>Số lượng *</label><br>
                                        <input id="quantity_hosting" type="text" data-id="quantity_hosting"
                                               class="form-control" required
                                               name="quantity_hosting" data-id="quantity"
                                               value="{{isset($contract->quantity_hosting) ?  old('quantity_hosting', $contract->quantity_hosting) : old('quantity_hosting')}}"
                                               style="margin-top: 5px; margin-left: 3px">
                                        <div class="invalid-feedback">
                                            Số lượng không được trống.
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group col-md-3">
                                    <label>Thành tiền(VNĐ) *</label>
                                    <div class="col-xs-12 form-group">
                                        <input id="total_hosting" type="text" class="form-control"
                                               name="total_hosting" readonly
                                               value="0" style="margin-top: 5px; margin-left: 3px">
                                    </div>
                                </div>

                            </div>


                        </div>
                    @endif
                    @if($contract->id_ssl!==null)
                        <div>
                            <div style="margin-left: 20px;" class="row">
                                <input type="hidden" id="id_ssl" class="form-control" readonly name="id_ssl"
                                       value="{{isset($contract->id_ssl) ? old('id_ssl', $contract->id_ssl) : old('id_ssl')}}"
                                       style="margin-top: 5px; margin-left: 3px">
                                <div class="form-group col-md-3">
                                    <div class="col-xs-12 form-group">
                                        <label>Tên SSL *</label>
                                        <select onchange="selectNamessl(this)" type="text"
                                                class="form-control"
                                                name="name_ssl" required
                                                id="name_ssl"
                                                value="" style="margin-top: 5px;">
                                            <option selected="selected" value="">Chọn SSL</option>
                                            @foreach($ssl as $ss)
                                                <option value="{{$ss->name}}"
                                                        @if(isset($contract->id_ssl) && $contract->id_ssl === $ss->id)
                                                        selected
                                                        @endif
                                                        data-price_ssl="{{$ss->price}}"
                                                        data-id_ssl="{{$ss->id}}"
                                                >{{$ss->name}}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                           Tên dịch vụ sll không được trống.
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <div class="col-xs-12 form-group">
                                        <label>Đơn giá(VNĐ) *</label>
                                        <input type="text" id="price_ssl" data-id="price_ssl"
                                               class="form-control"
                                               readonly
                                               name="price_ssl"
                                               value="{{isset($contract->price_ssl) ?  old('price_ssl', $contract->price_ssl) : old('price_ssl')}}"
                                               style="margin-top: 5px; margin-left: 3px">
                                    </div>

                                </div>

                                <div class="form-group col-md-3">
                                    <div class="col-xs-12 form-group">
                                        <label>Số lượng *</label><br>
                                        <input id="quantity_ssl" type="text" data-id="quantity_ssl"
                                               class="form-control"
                                               name="quantity_ssl" required
                                               data-id="quantity"
                                               value="{{isset($contract->quantity_ssl) ?  old('quantity_ssl', $contract->quantity_ssl) : old('quantity_ssl')}}"
                                               style="margin-top: 5px; margin-left: 3px">
                                        <div class="invalid-feedback">
                                            Số lượng không được trống.
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group col-md-3">
                                    <label>Thành tiền(VNĐ) *</label>
                                    <div class="col-xs-12 form-group">
                                        <input id="total_ssl" type="text" class="form-control" name="total_ssl"
                                               readonly value="0"
                                               style="margin-top: 5px; margin-left: 3px">
                                    </div>
                                </div>

                            </div>


                        </div>
                    @endif
                    @if($contract->id_domain!==null)

                        <div>
                            <div style="margin-left: 20px;" class="row">
                                <input type="hidden" id="id_domain" class="form-control" readonly
                                       name="id_domain"
                                       value="{{isset($contract->id_domain) ? old('id_domain', $contract->id_domain) : old('id_domain')}}"
                                       style="margin-top: 5px; margin-left: 3px">
                                <div class="form-group col-md-3">
                                    <div class="col-xs-12 form-group">
                                        <label>Tên miền *</label>
                                        <select onchange="selectNamedomain(this)" type="text"
                                                class="form-control"
                                                id="name_domain" required
                                                name="name_domain"
                                                value="" style="margin-top: 5px;">
                                            <option selected="selected" value="">Chọn tên miền</option>
                                            @foreach($domain as $do)
                                                <option value="{{$do->name}}"
                                                        @if(isset($contract->id_domain) && $contract->id_domain === $do->id)
                                                        selected
                                                        @endif
                                                        data-price_domain="{{$do->fee_register}}"
                                                        data-price_remain="{{$do->fee_remain}}"
                                                        data-id_domain="{{$do->id}}"

                                                >{{$do->name}}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Tên miền không được trống.
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" id="price_domain_remain" class="form-control" readonly
                                       name="price_domain_remain"
                                       value="{{isset($contract->fee_remain) ?  old('price_domain_remain', $contract->fee_remain) : old('price_domain_remain')}}"
                                       style="margin-top: 5px; margin-left: 3px">
                                <div class="form-group col-md-3">
                                    <div class="col-xs-12 form-group">
                                        <label>Đơn giá(VNĐ) *</label>
                                        <input type="text" id="price_domain" data-id="price_domain"
                                               class="form-control" readonly
                                               name="price_domain"
                                               value="{{isset($contract->fee_register) ?  old('price_domain', $contract->fee_register) : old('price_domain')}}"
                                               style="margin-top: 5px; margin-left: 3px">
                                    </div>

                                </div>
                                <div class="form-group col-md-3">
                                    <div class="col-xs-12 form-group">
                                        <label>Số lượng *</label><br>
                                        <input id="quantity_domain" data-id="quantity_domain" type="text"
                                               class="form-control"
                                               name="quantity_domain" required
                                               data-id="quantity"
                                               value="{{isset($contract->quantity_domain) ?  old('quantity_domain', $contract->quantity_domain) : old('quantity_domain')}}"
                                               style="margin-top: 5px; margin-left: 3px">
                                        <div class="invalid-feedback">
                                            Số lượng không được trống.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Thành tiền(VNĐ) *</label>
                                    <div class="col-xs-12 form-group">
                                        <input id="total_domain" type="text" class="form-control"
                                               name="total_domain" readonly
                                               value="0" style="margin-top: 5px; margin-left: 3px">
                                    </div>
                                </div>

                            </div>


                        </div>
                    @endif
                    @if($contract->id_vps!==null)
                        <div>
                            <div style="margin-left: 20px;" class="row">
                                <input type="hidden" id="id_vps" class="form-control" readonly name="id_vps"
                                       value="{{isset($contract->id_vps) ? old('id_vps', $contract->id_vps) : old('id_vps')}}"
                                       style="margin-top: 5px; margin-left: 3px">
                                <div class="form-group col-md-3">
                                    <div class="col-xs-12 form-group">
                                        <label>Tên dịch vụ vps *</label>
                                        <select onchange="selectNamevps(this)" type="text"
                                                class="form-control"
                                                id="name_vps" required
                                                name="name_vps"
                                                value=" " style="margin-top: 5px;">
                                            <option selected="selected" value="">Chọn tên dịch vụ vps</option>
                                            @foreach($vpss as $vps)
                                                <option value="{{$vps->name}}"
                                                        @if(isset($contract->id_vps) && $contract->id_vps === $vps->id)
                                                        selected
                                                        @endif
                                                        data-price_vps="{{$vps->price}}"
                                                        data-id_vps="{{$vps->id}}"

                                                >{{$vps->name}}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Tên dịch vụ vps không được trống.
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <div class="col-xs-12 form-group">
                                        <label>Đơn giá(VNĐ) *</label>
                                        <input type="text" id="price_vps" data-id="price_vps"
                                               class="form-control" readonly
                                               name="price_vps"
                                               value="{{isset($contract->price) ?  old('price_vps', $contract->price) : old('price_vps')}}"
                                               style="margin-top: 5px; margin-left: 3px">
                                    </div>

                                </div>
                                <div class="form-group col-md-3">
                                    <div class="col-xs-12 form-group">
                                        <label>Số lượng *</label><br>
                                        <input id="quantity_vps" data-id="quantity_vps" type="text"
                                               class="form-control"
                                               name="quantity_vps" required

                                               value="{{isset($contract->quantity_vps) ?  old('quantity_vps', $contract->quantity_vps) : old('quantity_vps')}}"
                                               style="margin-top: 5px; margin-left: 3px">
                                        <div class="invalid-feedback">
                                            Số lượng không được trống.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Thành tiền(VNĐ) *</label>
                                    <div class="col-xs-12 form-group">
                                        <input id="total_vps" type="text" class="form-control"
                                               name="total_vps" readonly
                                               value="0" style="margin-top: 5px; margin-left: 3px">
                                    </div>
                                </div>

                            </div>


                        </div>
                    @endif


                    <h4 style="font-weight: bold;text-align: center">Chi phí</h4>

                    <div style="margin-left: 20px;" class="row">


                        <div class="form-group" style="display: flex; flex-wrap: nowrap;  width: 100%">
                            <label style="width: 20%">Mã khuyến mãi</label>
                            <div class="col-xs-12 form-group" style="width: 70%">
                                <input id="promotion" type="text" name="promotion" class="form-control"
                                       value="{{isset($contract->promotion) ?  old('promotion', $contract->promotion) : old('promotion')}}"
                                       style="width: 100%">
                            </div>
                        </div>
                        <div class="form-group" style="display: flex; flex-wrap: nowrap;  width: 100%">
                            <label style="width: 20%">Số tiền khuyến mãi</label>
                            <div class="col-xs-12 form-group" style="width: 70%">
                                <input id="discount" type="number" name="discount" class="form-control"
                                       value="{{isset($contract->discount_price) ?  old('discount', $contract->discount_price) : old('discount')}}"
                                       style="width: 100%">
                            </div>
                        </div>
                    </div>


                    <div style="margin-left: 20px;" class="row">
                        @if($macode==='HĐLTVPS' || $macode==='HĐLTHT')
                            <div class="form-group" style="display: flex; flex-wrap: nowrap;  width: 100%">
                                <label style="width: 20%">Thuế 10%</label>
                                <div class="col-xs-12 form-group" style="width: 70%">
                                    <input readonly id="vat10" type="text" name="vat10" class="form-control"
                                           value="{{isset($contract->total_price) ?  old('vat10', $vat) : old('vat10')}}"
                                           style="width: 100%">
                                </div>
                            </div>
                        @endif
                        <div class="form-group" style="display: flex; flex-wrap: nowrap;  width: 100%">
                            <label style="width: 20%">Thành tiền</label>
                            <div class="col-xs-12 form-group" style="width: 70%">
                                <input readonly id="total_all" type="text" name="total_all" class="form-control"
                                       value="0"
                                       style="width: 100%">
                            </div>
                        </div>
                        @if($macode!=='HĐLTVPS' && $macode!=='HĐCCTM' && $macode!=='HĐLTHT')
                            <div class="form-group" style="display: flex; flex-wrap: nowrap;  width: 100%">
                                <label style="width: 20%">Số tiền thanh toán lần 1</label>
                                <div class="col-xs-12 form-group" style="width: 70%">
                                    <input id="price1" type="text" name="price1" class="form-control"
                                           value="{{isset($contract->price_1) ?  old('price1', $contract->price_1) : old('price1')}}"
                                           style="width: 100%">
                                </div>
                            </div>
                    </div>

                    <div style="margin-left: 20px;">
                        <h4 style="text-align: center"><b>Thời gian thực hiện</b></h4>
                        <div class="form-group" style="display: flex; flex-wrap: nowrap; ">
                            <label style="width: 20%">Thời gian hoàn thành Website</label>
                            <div class="col-xs-12 form-group" style="width: 70%">
                                <input id="date_finish" class="form-control" type="number"
                                       name="date_finish"
                                       value="{{isset($contract->date_finish) ?  old('date_finish', $contract->date_finish) : old('date_finish')}}"
                                       style="width: 100%">
                            </div>
                        </div>

                        <div class="form-group" style="display: flex; flex-wrap: nowrap; ">
                            <label style="width: 20%">Cung cấp thông tin</label>
                            <div class="col-xs-12 form-group" style="width: 70%">
                                <input id="date_infor" class="form-control" type="text" name="date_infor"
                                       value="{{isset($contract->date_infor) ?  old('date_infor', $contract->date_infor) : old('date_infor')}}"
                                       style="width: 100%">
                            </div>
                        </div>
                        <div class="form-group" style="display: flex; flex-wrap: nowrap; ">
                            <label style="width: 20%">Thiết kế demo</label>
                            <div class="col-xs-12 form-group" style="width: 70%">
                                <input id="date_demo" class="form-control" type="text" name="date_demo"
                                       value="{{isset($contract->date_demo) ?  old('date_demo', $contract->date_demo) : old('date_demo')}}"
                                       style="width: 100%">
                            </div>
                        </div>
                        <div class="form-group" style="display: flex; flex-wrap: nowrap;">
                            <label style="width: 20%">Thiết kế lập trình</label>
                            <div class="col-xs-12 form-group" style="width: 70%">
                                <input id="date_code" class="form-control" type="text" name="date_code"
                                       value="{{isset($contract->date_code) ?  old('date_code', $contract->date_code) : old('date_code')}}"
                                       style="width: 100%">
                            </div>
                        </div>
                        <div class="form-group" style="display: flex; flex-wrap: nowrap;">
                            <label style="width: 20%">Nghiệm thu</label>
                            <div class="col-xs-12 form-group" style="width: 70%">
                                <input id="date_test" class="form-control" type="text" name="date_test"
                                       value="{{isset($contract->date_test) ?  old('date_test', $contract->date_test) : old('date_test')}}"
                                       style="width: 100%">
                            </div>
                        </div>

                    </div>
                    @endif
                    <button type="submit" class="btn btn-default">{{ __('general.save') }}</button>
                    <a href="{{ route('admin.contract.index') }}"
                       class="btn btn-default" style="margin-left: 0.5rem">{{ __('general.back') }}</a>
                </form>
            </div>
        </div>

    </section>
@stop

@section('javascript')
    {{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script>
        window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script>
    <script src="/docs/4.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous">
    </script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict'

            window.addEventListener('load', function () {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation')

                // Loop over them and prevent submission
                Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
            }, false)
        }())
    </script>
    <script src="js/edit_contract.js"></script>

@stop
