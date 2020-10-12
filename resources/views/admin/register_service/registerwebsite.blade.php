@extends('layout.master')
@section('content')


    <!-- Main content -->
    <section class="content ">
        <div class="">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="titleheader">Đăng ký dịch vụ Website</h1>
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
                                                                @if($errors->has('start_date6'))
                                                                    <p class="help-block text-danger">
                                                                        {{ $errors->first('start_date6') }}
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
                                                                @if($errors->has('end_date6'))
                                                                    <p class="help-block text-danger">
                                                                        {{ $errors->first('end_date6') }}
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

