@inject('request', 'Illuminate\Http\Request')
@extends('layout.master')
@section('title')
    Danh sách dịch vụ đang sử dụng
@stop
@section('head')
    <link rel="stylesheet" href="css/responsive.css">
    {{--    <link rel="stylesheet" href="css/contract.css">--}}
    <style>
        .view th, .view td {
            text-align: left !important;
        }
    </style>
@stop
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @can('order-service-view')
        <div class="body-content">

            <div class="card">
                <div class="card-header card-header-new">
                    Danh sách dịch vụ/phần mềm đang sử dụng
                </div>

                <div class="card-body">
                    <div class="clearfix">

                        <div style="float: left">
                            <div class="input-group mb-3 d-flex flex-nowrap">

                                <label class="btn btn-default" for="showRow">{{ __('general.show') }}</label>

                                <select class="custom-select" id="showRow">
                                    <option
                                        value="10" {{ isset($_GET['amount']) ? ($_GET['amount'] === '10' ? 'selected' : '') : '' }}>
                                        10
                                    </option>
                                    <option
                                        value="25" {{ isset($_GET['amount']) ? ($_GET['amount'] === '25' ? 'selected' : '') : '' }}>
                                        25
                                    </option>
                                    <option
                                        value="50" {{ isset($_GET['amount']) ? ($_GET['amount'] === '50' ? 'selected' : '') : '' }}>
                                        50
                                    </option>
                                    <option
                                        value="100" {{ isset($_GET['amount']) ? ($_GET['amount'] === '100' ? 'selected' : '') : '' }}>
                                        100
                                    </option>
                                </select>
                                @can('order-service-delete')
                                    <div>
                                        <a id="btn-delete" style="margin-left: 0.25rem"
                                           class="btn btn-warning"
                                           data-toggle="modal" data-target="#deleteModal">
                                            <i class="fa fa-trash"> </i> Xóa
                                        </a>
                                    </div>
                                    <form action="{{ route('admin.list-services.destroy-select') }}" method="POST">
                                        @csrf
                                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="exampleModalLabel">Dịch vụ đang sử dụng</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="text" id="allValsDelete" name="allValsDelete[]"
                                                               style="display: none">
                                                        <input type="text" id="allValsDeletesoft"
                                                               name="allValsDeletesoft[]"
                                                               style="display: none">
                                                        <p>{{ __('general.confirm_delete_all') }}</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ __('general.close') }}</button>
                                                        <button type="submit"
                                                                class="btn btn-danger">{{ __('general.delete') }}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                @endcan
                                <div class="clearfix" style="margin-left: 0.25rem; margin-bottom: 0">
                                    @if(session('success'))
                                        <div class="btn btn-success button_  float-right">
                                            {{session('success')}}
                                        </div>
                                    @endif
                                    @if(session('fail'))
                                        <div class="btn btn-danger  button_ float-right">
                                            {{session('fail')}}
                                        </div>
                                    @endif

                                </div>
                            </div>

                        </div>
                        <div style="float: right">


                            @can('order-service-search')
                                <div>
                                    <input id="search" class="form-control" type="search"
                                           placeholder="{{ __('general.search') }}"
                                           value="{{ isset($_GET['key']) ? $_GET['key'] : '' }}">
                                </div>
                            @endcan
                            <div style="margin:0.5rem 0.25rem" class="dropdown">

                                <select style="margin-right: 8px;" id="contract"
                                        class="btn btn-primary" name="filter_contract">
                                    <option class="dropdown-item" style="background-color: white" value="">Lọc dịch
                                        vụ/phần mềm
                                    </option>
                                    <option class="dropdown-item" style="background-color: white" value="0">Tất cả dịch
                                        vụ/phần mềm
                                    </option>
                                    <option class="dropdown-item" style="background-color: white" value="1">Dịch vụ tên
                                        miền
                                    </option>
                                    <option class="dropdown-item" style="background-color: white" value="2">Dịch vụ VPS
                                    </option>
                                    <option class="dropdown-item" style="background-color: white" value="3">Dịch vụ
                                        SSL
                                    </option>
                                    <option class="dropdown-item" style="background-color: white" value="4">Dịch vụ
                                        hosting
                                    </option>
                                    <option class="dropdown-item" style="background-color: white" value="5">Dịch vụ
                                        Email
                                    </option>
                                    <option class="dropdown-item" style="background-color: white" value="6">Dịch vụ
                                        Website
                                    </option>
                                    <option class="dropdown-item" style="background-color: white" value="7">Phần mềm
                                    </option>
                                </select>

                            </div>
                        </div>
                    </div>

                    <div class="background-popup" style="margin: 2rem 0 2rem 0">

                    </div>
                    <div id="register-table">
                        <div class="panel-body table-responsive">
                            <div id="content">
                                <table id="myTable" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px"><input type="checkbox" id="check-all"></th>
                                        <th class="thstyleform">STT</th>
                                        <th class="thstyleform">Tên Khách hàng</th>
                                        <th class="thstyleform">Tên dịch vụ</th>
                                        <th class="thstyleform">Ngày Bắt Đầu<p class="pstyleform1">Ngày Kết Thúc</p>
                                        </th>
                                        <th class="thstyleform">Trạng thái</th>
                                        <th class="thstyleform">&nbsp;</th>
                                    </tr>
                                    </thead>
                                    <tbody id="myTableBody">

                                    <?php $i = 0?>
                                    @if($register_services!==null)
                                        @forelse($register_services as $register_service)
                                            <tr>
                                                <td><input type="checkbox" class="btn-check"
                                                           value="{{ $register_service->id }}"></td>
                                                <td class="thstyleform">{{$i+1}}</td>
                                                <td class="thstyleform">{{$register_service->customer_name}}
                                                    <p class="pstyleform1">{{$register_service->customer_email}}</p>
                                                </td>
                                                <td class="thstyleform">{{$register_service->domain_name}}{{$register_service->hosting_name}}{{$register_service->vps_name}}{{$register_service->email_name}}{{$register_service->ssl_name}}{{$register_service->website_name}}
                                                    <p class="pstyleform1">{{$register_service->address_domain}}</p>
                                                </td>

                                                <td class="thstyleform">{{ date('d-m-Y', strtotime($register_service->start_date))}}
                                                    <p class="pstyleform1">{{date('d-m-Y',strtotime($register_service->end_date))}}</p>
                                                </td>

                                                <td class="thstyleform">
                                                    <p @if($register_service->status=='Quá hạn') style="background-color: red; color: white;border: 1px solid red; border-radius: 4px ;font-size: 0.85rem"
                                                       @else @if($register_service->status=='Đang hoạt động') style="background-color:#007bff;color: white; border: 1px solid #007bff; border-radius: 4px ;font-size: 0.85rem"
                                                       @else style="background-color: orange;color: white;border: 1px solid orange; border-radius: 4px;font-size: 0.85rem" @endif @endif>{{$register_service->status}}</p>

                                                </td>
                                                <td class="thstyleform">
                                                    <button type="button" class="btn btn-xs btn-info"
                                                            data-toggle="modal"
                                                            data-target="#viewModal{{ $register_service->id }}">
                                                        {{ __('general.view') }}
                                                    </button>
                                                    <div class="modal fade" id="viewModal{{ $register_service->id }}"
                                                         tabindex="-1"
                                                         role="dialog" aria-labelledby="exampleModalLabel"
                                                         aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="exampleModalLabel">Dịch vụ</h5>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal"
                                                                            aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <table
                                                                        class="table table-bordered table-striped table-hover view">
                                                                        <tbody>
                                                                        <tr>
                                                                            <th>STT</th>
                                                                            <td>{{ $register_service->id }}</td>

                                                                        </tr>
                                                                        <tr>
                                                                            <th>Mã dịch vụ</th>
                                                                            <td>{{ $register_service->code }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Tên khách hàng</th>
                                                                            <td>{{ $register_service->customer_name }}</td>
                                                                        </tr>

                                                                        <tr>
                                                                            <th>Tên dịch vụ</th>
                                                                            <td>{{$register_service->domain_name}}{{$register_service->hosting_name}}{{$register_service->vps_name}}{{$register_service->email_name}}{{$register_service->ssl_name}}{{$register_service->website_name}}</td>
                                                                        </tr>
                                                                        <tr>

                                                                            <th>Ngày bắt đầu</th>
                                                                            <td>{{ $register_service->start_date }}</td>
                                                                        </tr>
                                                                        <tr>

                                                                            <th>Ngày kết thúc</th>
                                                                            <td>{{ $register_service->end_date }}</td>
                                                                        </tr>

                                                                        <tr>

                                                                            <th>Ghi chú</th>
                                                                            <td>{{ $register_service->notes }}</td>
                                                                        </tr>

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">{{ __('general.close') }}</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @can('order-service-update')
                                                        <a href="{{route('admin.list-services.edit', [$register_service->id])}}"
                                                           class="btn btn-xs btn-success">{{ __('general.edit') }}</a>
                                                    @endcan
                                                    @can('order-service-delete')
                                                        <button type="button" class="btn btn-xs btn-danger"
                                                                data-toggle="modal"
                                                                data-target="#deleteItemModal{{ $register_service->id }}">
                                                            {{ __('general.delete') }}
                                                        </button>
                                                        <form action="{{ route('admin.list-services.destroy') }}"
                                                              method="POST">
                                                            @csrf
                                                            <div class="modal fade"
                                                                 id="deleteItemModal{{ $register_service->id }}"
                                                                 tabindex="-1" role="dialog"
                                                                 aria-labelledby="exampleModalLabel"
                                                                 aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleModalLabel">Dịch vụ</h5>
                                                                            <button type="button" class="close"
                                                                                    data-dismiss="modal"
                                                                                    aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <input type="text" name="id"
                                                                                   value="{{ $register_service->id }}"
                                                                                   style="display: none">
                                                                            <p>{{ __('general.confirm_delete') }}</p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">{{ __('general.close') }}</button>
                                                                            <button type="submit"
                                                                                    class="btn btn-danger">{{ __('general.delete') }}</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    @endcan
                                                    @if($register_service->end_date<date('Y-m-d',strtotime ( '+8 day' , strtotime ( now() ))))

                                                        <a class="btn btn-xs btn-warning" style="margin-top: 0.5rem"
                                                           data-toggle="modal"
                                                           data-target="#extendserviceItemModal{{  $register_service->id}}">Gia
                                                            hạn</a>
                                                        <form action="{{ route('admin.list-services.storeextend') }}"
                                                              method="POST">
                                                            @csrf
                                                            <div class="modal fade"
                                                                 id="extendserviceItemModal{{ $register_service->id }}"
                                                                 tabindex="-1" role="dialog"
                                                                 aria-labelledby="exampleModalLabel"
                                                                 aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleModalLabel">Gian hạn</h5>
                                                                            <button type="button" class="close"
                                                                                    data-dismiss="modal"
                                                                                    aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <input type="hidden" name="id"
                                                                                   value="{{$register_service->id }}"/>

                                                                            <div class="col-xs-12 form-group"
                                                                                 style="display: flex">
                                                                                <label class="registerservice1"
                                                                                       style="width: 40%">Thời gian sử
                                                                                    dụng <span
                                                                                        class="aster">*</span></label>

                                                                                <select
                                                                                    class="js-example-basic-single form-control"
                                                                                    name="date_using"
                                                                                    style="width: 60%">

                                                                                    <option value="12" selected>12
                                                                                        tháng
                                                                                    </option>
                                                                                    <option value="24">24 tháng</option>
                                                                                    <option value="36">36 tháng</option>
                                                                                    <option value="48">48 tháng</option>
                                                                                    <option value="60">60 tháng</option>
                                                                                    <option value="72">72 tháng</option>
                                                                                </select>


                                                                            </div>


                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">{{ __('general.close') }}</button>
                                                                            <button type="submit"
                                                                                    class="btn btn-danger">{{ __('general.save') }}</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>

                                                    @endif

                                                </td>
                                                <?php $i++?>
                                            </tr>
                                        @empty
                                        @endforelse
                                    @endif

                                    @if($register_softs!==null)
                                        @forelse($register_softs as $register_soft)
                                            <tr>
                                                <td><input type="checkbox" class="btn-check2"
                                                           value="{{ $register_soft->id }}"></td>
                                                <td class="thstyleform">{{++$count}}</td>
                                                <td class="thstyleform">{{$register_soft->customer_name}}
                                                    <p class="pstyleform1">{{$register_soft->customer_email}}</p>
                                                </td>
                                                <td class="thstyleform">{{$register_soft->software}}</td>
                                                <td class="thstyleform">{{ date('d-m-Y', strtotime($register_soft->start_date))}}
                                                    <p class="pstyleform1">{{date('d-m-Y',strtotime($register_soft->end_date))}}</p>
                                                </td>
                                                @if($register_soft->end_date<now())
                                                    <td class="thstyleform"><p style="background-color: red; color: white;border: 1px solid red; border-radius: 4px ;font-size: 0.85rem">Quá hạn</p></td>
                                                @else

                                                    <td class="thstyleform "><p style="background-color:#007bff;color: white; border: 1px solid #007bff; border-radius: 4px ;font-size: 0.85rem">Đang hoạt động</p></td>
                                                @endif
                                                <td class="thstyleform">
                                                    <button type="button" class="btn btn-xs btn-info"
                                                            data-toggle="modal"
                                                            data-target="#viewsoftModal{{ $register_soft->id }}">
                                                        {{ __('general.view') }}
                                                    </button>
                                                    <div class="modal fade" id="viewsoftModal{{ $register_soft->id }}"
                                                         tabindex="-1"
                                                         role="dialog" aria-labelledby="exampleModalLabel"
                                                         aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="exampleModalLabel">Phần mềm</h5>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal"
                                                                            aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <table
                                                                        class="table table-bordered table-striped table-hover view">
                                                                        <tbody>
                                                                        <tr>
                                                                            <th>STT</th>
                                                                            <td>{{ $register_soft->id }}</td>

                                                                        </tr>

                                                                        <tr>
                                                                            <th>Tên Khách Hàng</th>
                                                                            <td>{{$register_soft->customer_name}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Tên Nhân Viên</th>
                                                                            <td>{{$register_soft->staff_name}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Loại Phần Mềm</th>
                                                                            <td>{{$register_soft->typesoftware}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Gói Phần Mềm</th>
                                                                            <td>{{$register_soft->software}}</td>
                                                                        </tr>

                                                                        <tr>

                                                                            <th>Ngày bắt đầu</th>
                                                                            <td>{{ $register_soft->start_date }}</td>
                                                                        </tr>
                                                                        <tr>

                                                                            <th>Ngày kết thúc</th>
                                                                            <td>{{ $register_soft->end_date }}</td>
                                                                        </tr>

                                                                        <tr>

                                                                            <th>Ghi chú</th>
                                                                            <td>{{ $register_soft->notes }}</td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">{{ __('general.close') }}</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @can('order-service-update')
                                                        <a href="{{route('admin.register-softs.edit', [$register_soft->id])}}"
                                                           class="btn btn-xs btn-success">{{ __('general.edit') }}</a>
                                                    @endcan
                                                    @can('order-service-delete')
                                                        <button type="button" class="btn btn-xs btn-danger"
                                                                data-toggle="modal"
                                                                data-target="#deletesoftItemModal{{ $register_soft->id }}">
                                                            {{ __('general.delete') }}
                                                        </button>
                                                        <form action="{{ route('admin.register-softs.destroy') }}"
                                                              method="POST">
                                                            @csrf
                                                            <div class="modal fade"
                                                                 id="deletesoftItemModal{{ $register_soft->id }}"
                                                                 tabindex="-1" role="dialog"
                                                                 aria-labelledby="exampleModalLabel"
                                                                 aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleModalLabel">Dịch vụ</h5>
                                                                            <button type="button" class="close"
                                                                                    data-dismiss="modal"
                                                                                    aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <input type="text" name="id"
                                                                                   value="{{ $register_soft->id }}"
                                                                                   style="display: none">
                                                                            <p>{{ __('general.confirm_delete') }}</p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">{{ __('general.close') }}</button>
                                                                            <button type="submit"
                                                                                    class="btn btn-danger">{{ __('general.delete') }}</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    @endcan
                                                    @if($register_soft->end_date<date('Y-m-d',strtotime ( '+8 day' , strtotime ( now() ))))

                                                        <a class="btn btn-xs btn-warning" style="margin-top: 0.5rem"
                                                           data-toggle="modal"
                                                           data-target="#extendItemModal{{  $register_soft->id}}">Gia
                                                            hạn</a>
                                                        <form action="{{ route('admin.register-softs.storeextend') }}"
                                                              method="POST">
                                                            @csrf
                                                            <div class="modal fade"
                                                                 id="extendItemModal{{ $register_soft->id }}"
                                                                 tabindex="-1" role="dialog"
                                                                 aria-labelledby="exampleModalLabel"
                                                                 aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleModalLabel">Gian hạn</h5>
                                                                            <button type="button" class="close"
                                                                                    data-dismiss="modal"
                                                                                    aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <input type="hidden" name="id"
                                                                                   value="{{$register_soft->id }}"/>

                                                                            <div class="col-xs-12 form-group"
                                                                                 style="display: flex">
                                                                                <label class="registerservice1"
                                                                                       style="width: 40%">Thời gian sử
                                                                                    dụng <span
                                                                                        class="aster">*</span></label>

                                                                                <select
                                                                                    class="js-example-basic-single form-control"
                                                                                    name="date_using"
                                                                                    style="width: 60%">

                                                                                    <option value="12" selected>12
                                                                                        tháng
                                                                                    </option>
                                                                                    <option value="24">24 tháng</option>
                                                                                    <option value="36">36 tháng</option>
                                                                                    <option value="48">48 tháng</option>
                                                                                    <option value="60">60 tháng</option>
                                                                                    <option value="72">72 tháng</option>
                                                                                </select>


                                                                            </div>


                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">{{ __('general.close') }}</button>
                                                                            <button type="submit"
                                                                                    class="btn btn-danger">{{ __('general.save') }}</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>

                                                    @endif

                                                </td>

                                            </tr>

                                        @empty
                                        @endforelse
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-right float-right" id="page">
                                <div class="col-md-12 text-center ">
                                    <ul class="pagination pagination-lg pager" id="myPager"></ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endcan
@stop

@section('javascript')
    <script>
        $.fn.pageMe = function (opts) {
            var $this = this,
                defaults = {
                    perPage: 10,
                    showPrevNext: false,
                    hidePageNumbers: false
                },
                settings = $.extend(defaults, opts);

            var listElement = $this;
            var perPage = settings.perPage;
            var children = listElement.children();
            var pager = $('.pager');

            if (typeof settings.childSelector != "undefined") {
                children = listElement.find(settings.childSelector);
            }

            if (typeof settings.pagerSelector != "undefined") {
                pager = $(settings.pagerSelector);
            }

            var numItems = children.length;
            var numPages = Math.ceil(numItems / perPage);

            // alert(numPages);
            pager.data("curr", 0);

            if (settings.showPrevNext) {
                $('<li><a href="#" class="prev_link btn btn-default">«</a></li>').appendTo(pager);
            }

            var curr = 0;
            if (numPages > 1) {
                while (numPages > curr && (settings.hidePageNumbers == false)) {
                    $('<li><a href="#" class="page_link btn btn-default">' + (curr + 1) + '</a></li>').appendTo(pager);
                    curr++;
                }
            }


            if (settings.showPrevNext) {
                $('<li><a href="#" class="next_link btn btn-default">»</a></li>').appendTo(pager);
            }

            pager.find('.page_link:first').addClass('active');
            pager.find('.prev_link').hide();
            if (numPages <= 1) {
                pager.find('.next_link').hide();
            }
            pager.children().eq(1).addClass("active");

            children.hide();
            children.slice(0, perPage).show();

            pager.find('li .page_link').click(function () {
                var clickedPage = $(this).html().valueOf() - 1;
                goTo(clickedPage, perPage);
                return false;
            });
            pager.find('li .prev_link').click(function () {
                previous();
                return false;
            });
            pager.find('li .next_link').click(function () {
                next();
                return false;
            });

            function previous() {
                var goToPage = parseInt(pager.data("curr")) - 1;
                goTo(goToPage);
            }

            function next() {
                goToPage = parseInt(pager.data("curr")) + 1;
                goTo(goToPage);
            }

            function goTo(page) {
                var startAt = page * perPage,
                    endOn = startAt + perPage;

                children.css('display', 'none').slice(startAt, endOn).show();

                if (page >= 1) {
                    pager.find('.prev_link').show();
                } else {
                    pager.find('.prev_link').hide();
                }

                if (page < (numPages - 1)) {
                    pager.find('.next_link').show();
                } else {
                    pager.find('.next_link').hide();
                }

                pager.data("curr", page);
                pager.children().removeClass("active");
                pager.children().eq(page + 1).addClass("active");

            }
        };

        $(document).ready(function () {

            $('#myTableBody').pageMe({
                pagerSelector: '#myPager',
                showPrevNext: true,
                hidePageNumbers: false,
                perPage: $("#showRow :selected").val()
            });
        });
    </script>


    <script type="text/javascript">

        $(document).ready(function () {


            $("#check-all").click(function () {
                $('input:checkbox').not(this).prop('checked', this.checked);
            });

            $("#btn-delete").on('click', function () {
                var allVals = [];
                var allsoft = [];
                $(".btn-check").not("#check-all").each(function () {
                    if ($(this).is(":checked")) {
                        allVals.push($(this).val());
                    }
                });
                $(".btn-check2").not("#check-all").each(function () {
                    if ($(this).is(":checked")) {
                        allsoft.push($(this).val());
                    }
                });
                // console.log(allVals);
                $('#allValsDelete').val(allVals);
                $('#allValsDeletesoft').val(allsoft);

            });

            $("#search").on('keyup', function () {
                var key = $(this).val();
                var filter_contract = $('#contract').val();
                // console.log(filter_contract);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: '{{ route('admin.list-services.search-row') }}',
                    data: {
                        key: key,
                        {{--amount: {{ isset($_GET['amount']) ? $_GET['amount'] : 'null' }},--}}
                        filter: filter_contract,
                    },
                    success: function (response) {
                        console.log(response);
                        $("#register-table").empty();
                        $("#register-table").html(response);
                    },
                });
            });

            $("#contract").on('change', function () {
                var filter_contract = $('#contract').val();
                console.log(filter_contract);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: '{{ route('admin.list-services.filter') }}',
                    data: {
                        {{--amount: {{ isset($_GET['amount']) ? $_GET['amount'] : 'null' }},--}}
                        filter: filter_contract,
                    },
                    success: function (response) {
                        console.log(response);
                        $("#register-table").empty();
                        $("#register-table").html(response);
                    },
                });
            });

            $("#showRow").on('change', function () {
                var amountRow = $("#showRow :selected").val();
                $('#myPager').text("");

                $('#myTableBody').pageMe({
                    pagerSelector: '#myPager',
                    showPrevNext: true,
                    hidePageNumbers: false,
                    perPage: amountRow
                });
            });
        });
    </script>
@stop
