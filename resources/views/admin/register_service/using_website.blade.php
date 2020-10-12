@inject('request', 'Illuminate\Http\Request')
@extends('layout.master')
@section('title')
    Danh sách tên miền đang sử dụng
@stop
@section('css')
    <style>
        body {
            font-family: "Roboto";
        }

        .event_ {
            float: right;
        }

        #title {
            font-weight: bold;
            font-size: 250%;
            color: #190000;
            height: 40px;
            margin-bottom: 30px;
        }

        .content {
            padding: 10px;
        }

        #content {

            border: 1px solid #0000004d;
            border-radius: 5px;
        }


        #page {
            display: flex;
            justify-content: flex-end;
            margin-right: 10px;
        }
    </style>
@stop
@section('content')
    <div class="content">
        <h1 class="title" id="title">Danh sách dịch vụ Website đang sử dụng</h1>
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
            <form method="get" class="search_frm" action="{{route('admin.list-services.websiteusing')}}">
                @csrf
                <h4 class="panel-title">
                    <div id="color1" class="card abcdef">
                        <!-- Card header -->
                        <div class="card-header" role="tab" id="heading79">

                            <!-- Heading -->
                            <a class="collapsed bar-search" role="button" data-toggle="collapse"
                               data-parent="#accordion"
                               href="#addstudent" aria-expanded="false" aria-controls="schedule">
                                <h5 class="mt-1 mb-0">
                                    <label class="registerservice">Tìm kiếm</label>

                                </h5>
                            </a>

                            <div class="row">
                                <div class="col-mobile col-sm-11 col-md-11 form-group">
                                    <input autocomplete="off"
                                           placeholder="Tên khách hàng, tên miền, tên dịch vụ, tên phần mềm"
                                           type='text' name="name"
                                           class="form-control"
                                           value="{{$request->name?$request->name:''}}"/>

                                </div>
                                <div class="col-mobile col-sm-1 col-md-1 form-group">
                                    <button type="submit" class="btn btn-success search-schedule">search</button>
                                </div>
                            </div>
                            <div style="float: left;margin-right: 2%" class="dropdown">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                    <i class="fas fa-bars"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{route('admin.list-services.domainusing')}}">Tên
                                        miền</a>
                                    <a class="dropdown-item" href="{{route('admin.list-services.hostingusing')}}">Hosting</a>
                                    <a class="dropdown-item" href="{{route('admin.list-services.vpsusing')}}">VPS</a>
                                    <a class="dropdown-item" href="{{route('admin.list-services.websiteusing')}}">Website</a>
                                    <a class="dropdown-item" href="{{route('admin.list-services.emailusing')}}">Email</a>
                                    <a class="dropdown-item" href="{{route('admin.list-services.softusing')}}">Phần mềm</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </h4>
                {{--                </div>--}}
            </form>
        </div>
        <div class="card">
            <div class="panel-body table-responsive">
                <div id="content">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr class="table_header" style="background-color: #ffc107;color: black">
                            <th class="thstyleform">id</th>
                            <th class="thstyleform">Tên Khách hàng</th>
                            <th class="thstyleform">Tên dịch vụ</th>
                            <th class="thstyleform">Ngày Bắt Đầu<p class="pstyleform1">Ngày Kết Thúc</p></th>
                            <th class="thstyleform">Trạng thái</th>
                            <th class="thstyleform">Chức năng</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $i = 0?>
                        @forelse($register_services as $register_service)
                            <tr>
                                <td class="thstyleform">{{$i+1}}</td>
                                <td class="thstyleform">{{$register_service->customer_name}}
                                    <p class="pstyleform1">{{$register_service->customer_email}}</p></td>
                                <td class="thstyleform">{{$register_service->domain_name}}{{$register_service->hosting_name}}{{$register_service->vps_name}}{{$register_service->email_name}}{{$register_service->ssl_name}}{{$register_service->website_name}}
                                    <p class="pstyleform1">{{$register_service->address_domain}}</p></td>

                                <td class="thstyleform">{{$register_service->start_date}}
                                    <p class="pstyleform1">{{$register_service->end_date}}</p></td>

                                <td class="thstyleform" @if($register_service->status=='Quá hạn') style="color: red; "
                                    @else @if($register_service->status=='Đang hoạt động') style=""
                                    @else style="color: #0040FF" @endif @endif>{{$register_service->status}}

                                </td>
                                <td class="thstyleform">
                                    <a href="{{route('admin.list-services.show', $register_service->id)}}"
                                       class="btn btn-xs btn-info">{{ __('general.view') }}</a>
                                    <a href="{{route('admin.list-services.edit', [$register_service->id])}}"
                                       class="btn btn-xs btn-success">{{ __('general.edit') }}</a>
                                    <form style="display: inline-block"
                                          action="{{route('admin.list-services.destroy', [$register_service->id])}}"
                                          method="post" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                                        @csrf
                                        <button type="submit"
                                                class="btn btn-xs btn-danger">{{ __('general.delete') }}</button>
                                    </form>
                                    @if($register_service->status == 'Quá hạn')
                                        <a href="{{route('admin.list-services.extend', $register_service->id)}}
                                            " class="btn btn-xs btn-info">Gia hạn</a>
                                    @endif
                                </td>
                                <?php $i++?>
                            </tr>
                        @empty
                        @endforelse

                        </tbody>
                    </table>
                </div>
                <div class="text-right" id="page">
                    {{$register_services->links()}}
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('.mdb-select').materialSelect();
        });
    </script>
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function () {
            $('.js-example-basic-single').select2();
        });
    </script>
@stop
