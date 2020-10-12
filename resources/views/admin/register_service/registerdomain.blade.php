@extends('layout.master')
@section('content')


    <!-- Main content -->
    <section class="content ">
        <div class="">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="titleheader">Đăng ký dịch vụ Domain</h1>
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

