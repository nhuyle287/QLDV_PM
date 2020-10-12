@extends('layout.master')
@section('content')


    <!-- Main content -->
    <section class="content ">
        <div class="">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="titleheader">Đăng ký dịch vụ Email</h1>
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

