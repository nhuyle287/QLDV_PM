@extends('layout.master')
@section('content')


    <!-- Main content -->
    <section class="content ">
        <div class="">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="titleheader">Đăng ký dịch vụ Hosting</h1>
                            <form action="{{route('admin.register_services.post')}}" method="post">
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
                                        <div class="form-row">
                                            <div class="form-group col-md-12">


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
                                        <a href="{{ route('admin.register_services.index') }}"
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

