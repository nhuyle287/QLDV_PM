@extends('layout.master')
@section('title')
    Hợp đồng
@stop
@section('head')
    <link rel="stylesheet" href="{{ asset('../css/responsive.css') }}">
@stop
@section('content')

    <section class="body-content">
        <div class="card">

            <div class="card-header card-header-new">
                Tạo hợp đồng VPS
            </div>
            <div class="card-body">
                <form action="{{route("admin.contract.reviewVPS")}}" novalidate class="needs-validation" method="POST"
                      enctype="multipart/form-data"
                      id="form_dk">
                    {{--            <input type="hidden" name="id" value="{{isset($info->id) ? $info->id: ''}}">--}}
                    @csrf
                    <input type="hidden" name="id" value="{{isset($contract->id) ? $contract->id: ''}}">
                    <div class="panel panel-default">

                        <div class="panel-body">
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
                                                        {{--                                                            @if(isset($contract->id_customer) && $contract->id_customer === $ht->id)--}}
                                                        {{--                                                            selected--}}
                                                        {{--                                                            @endif--}}
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
                            <input type="hidden" id="id_customer" class="form-control" readonly
                                   name="id_customer" required
                                   value="{{isset($contract->id_customer) ? old('id_customer', $contract->id_customer) : old('id_customer')}}"
                            >
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


                        </div>
                    </div>
                    <h4 style="text-align: center"><b>CHI TIẾT HỢP ĐỒNG</b></h4>
                    <p class="c18 c31"><span class="c3"></span></p><a
                        id="t.6e7bac4e419786072c86b10c973cea5a54a1dbe4"></a><a
                        id="t.1"></a>

                    <div class="tdhv">
                        <div style="margin-left: 20px;" class="row">
                            <input type="hidden" id="id_vps" class="form-control" readonly name="id_vps"
                                   value=""
                                   style="margin-top: 5px; margin-left: 3px">
                            <div class="form-group col-md-3">
                                <div class="col-xs-12 form-group">
                                    <label>Tên hàng hóa, dịch vụ *</label>
                                    <select onchange="selectSWare(this)" type="text"
                                            class="form-control" required
                                            id="namevps"
                                            name="namevps"
                                    >
                                        <option selected="selected" value="">Chọn dịch vụ vps</option>
                                        @foreach($vpss as $vps)
                                            <option value="{{$vps->name}}"
                                                    {{--                                            @if(isset($sw->id))--}}
                                                    {{--                                            selected--}}
                                                    {{--                                            @endif--}}
                                                    data-price="{{$vps->price}}"
                                                    data-id_vps="{{$vps->id}}"
                                            >{{$vps->name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Tên dịch vụ không được trống.
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <div class="col-xs-12 form-group">
                                    <label>Đơn giá(VNĐ) *</label>
                                    <input id="price" type="text" class="form-control"
                                           name="price" readonly
                                           value="" data-id="price">
                                </div>

                            </div>

                            <div class="form-group col-md-3">
                                <div class="col-xs-12 form-group">
                                    <label>Số lượng *</label><br>
                                    <input id="quantity" required type="text" class="form-control" name="quantity"
                                           data-id="quantity"
                                           value="">
                                    <div class="invalid-feedback">
                                        Số lượng không được trống.
                                    </div>
                                </div>
                            </div>


                            <div class="form-group col-md-3">
                                <label>Thành tiền(VNĐ) *</label>
                                <div class="col-xs-12 form-group">
                                    <input id="total" type="text" class="form-control" name="total" readonly value="0">
                                </div>
                            </div>

                        </div>

                        {{--                <div class="row event" STYLE="float: right" style="margin-bottom: 5px">--}}
                        {{--                    <a id="bt_contract_sw" class="btn btn-default">Thêm</a>--}}
                        {{--                </div>--}}
                    </div>

                    <h4 style="font-weight: bold;text-align: center">Chi phí</h4>

                    <div style="margin-left: 20px;" class="row">
                        <div class="form-group col-md-3">
                            <div class="col-xs-12 form-group">
                                <label>Thuế 10%</label>
                                <input readonly id="vat10" type="text" name="vat10" class="form-control">
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <div class="col-xs-12 form-group">
                                <label>Thành tiền</label>
                                <input readonly id="total_all" type="text" name="total_all" class="form-control"
                                       value="0">
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <div class="col-xs-12 form-group">
                                <label>Mã khuyến mãi</label>
                                <input id="promotion" type="text" name="promotion" class="form-control"
                                       value="{{isset($contract->promotion) ?  old('promotion', $contract->promotion) : old('promotion')}}">
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <div class="col-xs-12 form-group">
                                <label>Số tiền khuyến mãi</label>

                                <input id="discount" type="number" name="discount" class="form-control"
                                       value="{{isset($contract->discount_price) ?  old('discount', $contract->discount_price) : old('discount')}}"
                                >

                            </div>
                        </div>


                    </div>
                    <hr>

                    <button class="btn btn-default">Xem trước</button>
                    <a href="{{ route('admin.contract.index') }}"
                       class="btn btn-default">{{ __('general.back') }}</a>
                </form>
            </div>
        </div>

    </section>
@stop

@section('javascript')

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



    <script>
        function selectName(obj) {
            var data_email = $(obj).find(':selected').data('email');
            var data_address = $(obj).find(':selected').data('address');
            var data_phone = $(obj).find(':selected').data('phone');
            var data_nameStore = $(obj).find(':selected').data('a');
            var data_position = $(obj).find(':selected').data('position');
            var data_fax_number = $(obj).find(':selected').data('fax_number');
            var data_tax_number = $(obj).find(':selected').data('tax_number');
            var data_account_number = $(obj).find(':selected').data('account_number');
            var data_open_at = $(obj).find(':selected').data('open_at');
            var data_id_customer = $(obj).find(':selected').data('id_customer');
            var id_customer = document.getElementById('id_customer');
            id_customer.value = data_id_customer;

            var email = document.getElementById('email');
            var address = document.getElementById('address');
            var telephone = document.getElementById('telephone');
            var nameStore = document.getElementById('nameStore');
            var position = document.getElementById('position');
            var fax_number = document.getElementById('fax_number');
            var account_number = document.getElementById('account_number');
            var open_at = document.getElementById('open_at');
            var tax_number = document.getElementById('tax_number');


            email.value = data_email;
            address.value = data_address;
            telephone.value = data_phone;
            nameStore.value = data_nameStore;
            position.value = data_position;
            fax_number.value = data_fax_number;
            account_number.value = data_account_number;
            open_at.value = data_open_at;
            tax_number.value = data_tax_number;

        }

        function selectSWare(obj) {

            var data_price = $(obj).find(':selected').data('price');

            // var price = $('#price');
            $('#price').val(data_price);
            // price.value = data_price;

            $('#nameSW').on('change', function () {
                var quantity = $('input[data-id="quantity"]').val();
                tien = data_price * parseInt(quantity);
                // total.value =tien;
                $('#total').text(tien);
                vat10_ = tien * 10 / 100;
                vat10.value = vat10_;
                $('#vat10').text(vat10_)
                calculatorTotal();
                //   total_all.value= calculatorTotal();
                // calculatorTotal();
            });

            $('#quantity').keyup(function () {
                var quantity = $('input[data-id="quantity"]').val();

                tien = data_price * parseInt(quantity);
                total.value = tien;
                $('#total').text(tien);
                vat10_ = tien * 10 / 100;
                vat10.value = vat10_;
                $('#vat10').text(vat10_)
                calculatorTotal();
                //  total.value = data_price * parseInt(quantity);
                // calculatorTotal();
            });
            var data_id_vps = $(obj).find(':selected').data('id_vps');
            var id_vps = document.getElementById('id_vps');
            id_vps.value = data_id_vps;
        }

        // function selectSWare(obj) {
        //     var data_price = $(obj).find(':selected').data('price');
        //     $('#price').val(data_price);
        //     var quantity = $('#quantity').val();
        //     tien = data_price * parseInt(quantity);
        //     $('#total').val(tien);
        //     var text_total = fomat_curent_VND(tien);
        //     $('#total').text(text_total);
        //     calculatorTotal();
        //
        //     console.log(total_all)
        //     $('#quantity').keyup(function () {
        //         var quantity = $('input[data-id="quantity"]').val();
        //
        //         tien = data_price * parseInt(quantity);
        //         total.value = tien;
        //         $('#total').text(tien);
        //         calculatorTotal();
        //     });
        //     var data_id_website = $(obj).find(':selected').data('id_website');
        //     var id_website = document.getElementById('id_website');
        //     id_website.value = data_id_website;
        // }

        function calculatorTotal() {
            let price_vps = $('#total').val();
            let vat = $('#vat10').val();
            let total_all = parseInt(price_vps) + parseInt(vat);
            $('#total_all').val(total_all);
            $('#total_all').text(total_all);

        }

        function fomat_curent_VND(number) {
            var formatter = new Intl.NumberFormat('vi-VN', {
                style: 'currency',
                currency: 'VND',
            })
            var currentcy = formatter.format(number);
            return currentcy;
        }

        // $(document).ready(function () {
        //     //tổng tiền web
        //     let price = $('#price').val();
        //     let quantity = $('#quantity').val();
        //     var tien = parseInt(price) * parseInt(quantity);
        //     console.log($('#price').val());
        //     total.value = tien;
        //     $('#total').text(tien);
        //
        //     //tổng tiền hosting
        //     let price_hosting = $('#price_hosting').val();
        //     let quantity_hosting = $('#quantity_hosting').val();
        //     var total_price_hosting = parseInt(price_hosting) * parseInt(quantity_hosting);
        //     $('#total_hosting').val(total_price_hosting);
        //     $('#total_hosting').text(total_price_hosting);
        //
        //     //tổng tiền ssl
        //     let price_ssl = $('#price_ssl').val();
        //     let quantity_ssl = $('#quantity_ssl').val();
        //     var total_price_ssl = parseInt(price_ssl) * parseInt(quantity_ssl);
        //     $('#total_ssl').val(total_price_ssl);
        //     $('#total_ssl').text(total_price_ssl);
        //
        //     //tổng tiền domain
        //     let price_domain = $('#price_domain').val();
        //     let quantity_domain = $('#quantity_domain').val();
        //     var total_price_domain = parseInt(price_domain) * parseInt(quantity_domain);
        //     $('#total_domain').val(total_price_domain);
        //     $('#total_domain').text(total_price_domain);
        //
        //     let total_all = parseInt(tien) + parseInt(total_price_hosting) + parseInt(total_price_domain) + parseInt(total_price_ssl);
        //     $('#total_all').val(total_all);
        //     $('#total_all').text(total_all);
        //     //     // var list_hopdong_phanmem = [];
        //     //     var list_function_home = [];
        //     //     var list_function_product = [];
        //     //     var list_function_different = [];
        //     //     var i = 1;
        //     // var sum = 0;
        //     // $('#bt_contract_sw').click(function () {
        //     //     var tdhv = {
        //     //         id: i,
        //     //         tenhopdong: $('#nameSW option:selected').text(),
        //     //         gia: $('#price').val(),
        //     //         soluong: $('#quantity').val(),
        //     //         thanhtien: $('#total').val(),
        //     //     };
        //     //     list_hopdong_phanmem.push(tdhv);
        //     //
        //     //
        //     //     message = "<tr><td> " + "<input class='list_hopdong' type='hidden' name='list_hopdong[]' " +
        //     //         "value='"
        //     //         + tdhv.tenhopdong + ","
        //     //         + tdhv.gia + ","
        //     //         + tdhv.soluong + ","
        //     //         + tdhv.thanhtien + "'>"
        //     //         + tdhv.tenhopdong + "</td>" +
        //     //         "<td>" + tdhv.gia + "</td>" +
        //     //         "<td>" + tdhv.soluong + "</td>" +
        //     //         "<td class='thanhtien'>" + tdhv.thanhtien + "</td><td><a class='remove' id =" + tdhv.id + "><i class='fa fa-trash'></i></a></td>" +
        //     //         "</tr>";
        //     //     $('#tb_hopdong').append(message);
        //     //     i++;
        //     //
        //     //     sum += Number(tdhv.thanhtien);
        //     //     console.log(sum);
        //     //     $('#total_price').text(sum);
        //     // })
        //     //
        //     //
        //     // message = "<tr><th style='width: 80%'>Tổng tiền</th><th  id='total_price'></th></tr>";
        //     // // $('#tb_hopdong').append(message);
        //     // $('#tb_thanhtien').append(message);
        //     //
        //
        //     // $('#bt_function_home').click(function () {
        //     //     var function_homes = {
        //     //         id: i,
        //     //         // category_page:$('#category_page').val(),
        //     //         function_home: $('#function_home').val()
        //     //     };
        //     //     list_function_home.push(function_homes);
        //     //
        //     //     message = "<tr><td> " + "<input class='list_function_home' type='hidden' name='list_function_homes[]' " +
        //     //         "value='"
        //     //         + function_homes.function_home + "'>" + function_homes.function_home + "</td><td><a class='remove' id ='" + function_homes.id + "'><i class='fa fa-trash'></i></a></td></tr>";
        //     //     $('#tb_function_home').append(message);
        //     //
        //     //     i++;
        //     // })
        //     // $("#tb_function_home").on("click", ".remove", function () {
        //     //     z = list_function_home.findIndex(obj => obj.id == $(this).attr("id"));
        //     //     list_function_home.splice(z, 1);
        //     //     $(this).closest("tr").remove();
        //     // });
        //     //
        //     //
        //     // $('#bt_function_product').click(function () {
        //     //     var function_products = {
        //     //         id: i,
        //     //         function_product: $('#function_product').val()
        //     //     };
        //     //     list_function_product.push(function_products);
        //     //
        //     //     message = "<tr><td> " + "<input class='list_function_product' type='hidden' name='list_function_products[]' " +
        //     //         "value='"
        //     //         + function_products.function_product + "'>" + function_products.function_product + "</td><td><a class='remove' id =" + function_products.id + "><i class='fa fa-trash'></i></a></td>" +
        //     //         "</tr>";
        //     //     $('#tb_function_product').append(message);
        //     //     i++;
        //     // })
        //     // $("#tb_function_product").on("click", ".remove", function () {
        //     //     z = list_function_product.findIndex(obj => obj.id == $(this).attr("id"));
        //     //     list_function_product.splice(z, 1);
        //     //     $(this).closest("tr").remove();
        //     // });
        //     //
        //     //
        //     // $('#bt_function_different').click(function () {
        //     //     var function_differents = {
        //     //         id: i,
        //     //         function_different: $('#function_different').val()
        //     //     };
        //     //     list_function_different.push(function_differents);
        //     //
        //     //     message = "<tr><td> " + "<input class='list_function_different' type='hidden' name='list_function_differents[]' " +
        //     //         "value='"
        //     //         + function_differents.function_different + "'>" + function_differents.function_different + "</td><td><a class='remove' id =" + function_differents.id + "><i class='fa fa-trash'></i></a></td>" +
        //     //         "</tr>";
        //     //     $('#tb_function_different').append(message);
        //     //     i++;
        //     // })
        //     // $("#tb_function_different").on("click", ".remove", function () {
        //     //     z = list_function_different.findIndex(obj => obj.id == $(this).attr("id"));
        //     //     list_function_different.splice(z, 1);
        //     //     $(this).closest("tr").remove();
        //     // });
        //
        //
        //     // $("#tb_hopdong").on("click", ".remove", function () {
        //     //     z = list_hopdong_phanmem.findIndex(obj => obj.id == $(this).attr("id"));
        //     //     list_hopdong_phanmem.splice(z, 1);
        //     //     $(this).closest("tr").remove();
        //     // });
        // });
    </script>
@stop
