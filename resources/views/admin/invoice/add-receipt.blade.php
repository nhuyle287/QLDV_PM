@extends('layout.master')
@section('title')
    Phiếu thu
@stop
@section('head')
    <link rel="stylesheet" href="{{ asset('../css/responsive.css') }}">
@stop
@section('content')

    <section class="body-content">
        <div class="card">

            <div class="card-header card-header-new">
                {{__('revenue.create')}}
            </div>
            <div class="card-body">
                <form action="{{route('admin.invoices.receiptsstore')}}" method="post"
                      class="needs-validation" novalidate enctype="multipart/form-data">
                    {{--                                <input type="hidden" name="id" value="{{isset($domain->id) ? $domain->id: ''}}">--}}
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


                            </div>
                            {{-- ví dụ nha--}}
                            <div class="form-row">

                                <div class="form-group col-md-12">
                                    <input id="" type="hidden"
                                           class="form-control" name="id" required

                                           value="{{isset($register_service->id) ? old('id', $register_service->id) : old('id')}}">

                                    <!--Top Table UI-->
                                    <div class="table-ui p-2 mb-3 mx-3 mb-4">

                                        <!--Grid row-->
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group">
                                                    <label>Tên khách hàng <span
                                                            class="aster">*</span></label>
                                                    <input id="name" type="text"
                                                           class="form-control" name="name" required

                                                           value="{{isset($register_service->name) ? old('name', $register_service->name) : old('name')}}">
                                                    <p class="help-block text-danger"></p>
                                                    <div class="invalid-feedback">
                                                        Tên khách hàng không được trống.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group">
                                                    <label>Địa chỉ <span
                                                            class="aster">*</span></label>
                                                    <input id="receipt_type" type="text"
                                                           class="form-control"
                                                           name="address" required
                                                           value="{{isset($register_service->address) ? old('address', $register_service->address) : old('address')}}">
                                                    <p class="help-block text-danger"></p>
                                                    <div class="invalid-feedback">
                                                        Địa chỉ không được trống.
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group">
                                                    <label>Email <span class="aster">*</span></label>
                                                    <input id="email" type="text" required
                                                           class="form-control" name="email"

                                                           value="{{isset($register_service->email) ? old('email', $register_service->email) : old('email')}}">
                                                    <p class="help-block text-danger"></p>
                                                    <div class="invalid-feedback">
                                                        email không được trống
                                                    </div>
                                                    @if($errors->has('email'))
                                                        <p class="help-block text-danger">
                                                            {{ $errors->first('email') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group">
                                                    <label>Số điện thoại <span
                                                            class="aster">*</span></label>
                                                    <input id="phone_number" type="text"
                                                           class="form-control" name="phone_number" required

                                                           value="{{isset($register_service->phone_number) ? old('phone_number', $register_service->phone_number) : old('phone_number')}}">
                                                    <p class="help-block text-danger"></p>
                                                    <div class="invalid-feedback">
                                                        Số điện thoại không được trống.
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group">
                                                    <label>Phí thu <span class="aster">*</span></label>
                                                    <input id="price" type="text"
                                                           class="form-control" name="total" required

                                                           value="{{isset($register_service->total) ? old('total', $register_service->total) : old('total')}}">
                                                    <p class="help-block text-danger"></p>
                                                    <div class="invalid-feedback">
                                                        Phí thu không được trống.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group">
                                                    <label>Lý do <span
                                                            class="aster">*</span></label>
                                                    <input id="receipt_type" type="text"
                                                           class="form-control"
                                                           name="order_type" required
                                                           value="{{isset($register_service->order_type) ? old('order_type', $register_service->order_type) : old('order_type')}}">
                                                    <p class="help-block text-danger"></p>
                                                    <div class="invalid-feedback">
                                                        Lý do không được trống.
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <hr>
                                        <div class="form-row">
                                            <div class="form-group col-xl-12">

                                                <label>Mô tả </label>
                                                <textarea rows="5" type="text" class="form-control"
                                                          name="description"
                                                          value="{{isset($register_service->description) ? old('description', $register_service->description) : old('description')}}"></textarea>


                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>
                            <!--/.Accordion wrapper-->

                            <hr>
                            <div class="event_">
                                <button type="submit" id="submit"
                                        class="btn btn-default">{{ __('general.save') }}</button>
                                <a href="{{ route('admin.revenue.index') }}"
                                   class="btn btn-default">{{ __('general.back') }}</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.card -->


        <!-- /.col -->

        <!-- /.row -->

        <!-- /.container-fluid -->
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

        })


    </script>
@stop






