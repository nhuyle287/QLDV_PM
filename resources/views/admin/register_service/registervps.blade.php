@extends('layout.master')
@section('content')


    <!-- Main content -->
    <section class="content ">
        <div class="">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="titleheader">Đăng ký dịch vụ VPS</h1>
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

