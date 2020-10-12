@inject('request', 'Illuminate\Http\Request')
@extends('layout.master')
@section('title')
    Sổ quỹ
@stop
@section('css')
    <style>
        body {
            font-family: "Roboto";
        }
        #title {
            font-weight: bold;
            font-size: 250%;
            color: #190000;
            height: 40px;
            margin-bottom: 30px;
        }

        #content {

            border: 1px solid #0000004d;
            border-radius: 5px;
        }
        #search{
            display: flex;
            flex-wrap: nowrap;
        }
        #submit{
            margin-left: 5px;
        }
        #page {
            display: flex;
            justify-content: flex-end;
            margin-right: 10px;
        }
    </style>
@stop
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@can('receipt-view')
    <div class="content">
        <h1 class="titleheader">Danh sách sổ quỹ</h1>
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


        {{--search--}}
        <div class="panel panel-default">
            @can('receipt-search')
            <form action="">
                <div class="form-group" id="search">
                    <input type="text" name="search" class="form-control" placeholder="Search..."/>
                    <input type="submit" id="submit" class="btn btn-primary" value="Search"/>
                </div>
            </form>
            @endcan
        </div>
        {{--end search--}}
        <div class="panel panel-default">
            <div >
                <div class="row">
                    <p style=" margin-left: 6%; font-size: 25px">Tổng Doanh thu: {{number_format($total_)}}</p>
                    <div class="col-md-12">
                        {!! $chart->container() !!}
                    </div>
                    {!! $chart->script() !!}

                </div>
            </div>
            <br>
            <div class="card">
                <div class="panel-body table-responsive">
                    <div id="content">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr class="table_header"  style="background-color: #ffc107; color: black">
                            <th class="thstyleform">Mã phiếu</th>
                            <th class="thstyleform">Tên Khách hàng</th>
                            <th class="thstyleform">Giá trị</th>
                            <th class="thstyleform">Loại phiếu thu</th>
                            <th class="thstyleform">Ngày thu</th>
                            <th class="thstyleform">Chức năng</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($register_services as $register_service)
                            <tr>
                                <td class="thstyleform">{{$register_service->id}}</td>
                                <td class="thstyleform">{{$register_service->customer_name}}</td>
                                <td class="thstyleform">{{number_format($register_service->total)}}</td>
                                <td class="thstyleform">{{$register_service->order_type}}</td>
                                <td class="thstyleform">{{$register_service->date}}</td>
                                <td class="thstyleform">

                                    <a href="{{route('admin.invoices.invocereceipt',[$register_service->id])}}" class="btn btn-sm btn-info">Xem phiếu thu</a>
                                </td>

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
    </div>
@endcan
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js" charset="utf-8"></script>
@stop
