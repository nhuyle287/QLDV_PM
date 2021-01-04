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
    </style>
@stop
@section('content')

    <div class="content">
        <h1 class="titleheader">Quản Lý Sổ Quỹ</h1>
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
            <form method="post" class="search_frm" action="{{route('admin.register_services.search')}}">
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
                                           value=""/>

                                </div>
                                <div class="col-mobile col-sm-1 col-md-1 form-group">
                                    <button type="submit" class="btn btn-success search-schedule">search</button>
                                </div>
                            </div>
                            <div style="font-size: 15px;text-align: right;">
                                Tổng thu: {{number_format($total_receipt)}} vnđ -
                                Tổng chi: {{number_format($total_payment)}} vnđ -
                                Thành tiền:{{number_format($total_receipt-$total_payment)}} vnđ
                            </div>
                        </div>
                    </div>

                </h4>

            </form>
        </div>

        <div class="panel panel-default">
            <div class="card">
                <div class="panel-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr class="table_header">
                            <th class="thstyleform">ID</th>
                            <th class="thstyleform">Người nộp</th>

                            <th class="thstyleform">Phí thu/chi</th>
                            <th class="thstyleform">Ngày thu/chi</th>
                            <th class="thstyleform">Loại thu/chi</th>
{{--                            <th class="thstyleform">Chức năng</th>--}}
                        </tr>
                        </thead>
                        <tbody>

                        @forelse($receipt as $receipt)
                            <tr>
                                <td class="thstyleform">{{$receipt->id}}</td>
                                <td class="thstyleform">{{$receipt->customer_name}}</td>

                                <td class="thstyleform">{{number_format($receipt->price)}}</td>
                                <td class="thstyleform">{{$receipt->date}}</td>
                                <td class="thstyleform">{{$receipt->receipt_type}}</td>
{{--                                <td class="thstyleform">--}}
{{--                                    <a href="{{route('admin.register_services.show', $receipt->id)}}"--}}
{{--                                       class="btn btn-xs btn-info">{{ __('general.view') }}</a>--}}
{{--                                    <a href="{{route('admin.invoices.invocereceipt', $receipt->id)}}"--}}
{{--                                       class="btn btn-xs btn-info">Xuất</a>--}}
{{--                                </td>--}}

                            </tr>
                        @empty
                        @endforelse
                        @forelse($payment as $payment)

                            <td class="thstyleform">{{$payment->id}}</td>
                            <td class="thstyleform">{{$payment->receiver}}</td>

                            <td class="thstyleform">{{number_format($payment->price)}}</td>
                            <td class="thstyleform">{{$payment->date}}</td>
                            <td class="thstyleform">{{$payment->payment_type}}</td>

                            </tr>
                        @empty
                        @endforelse
                        </tbody>
                    </table>
                    <div class="text-right">


                    </div>
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
