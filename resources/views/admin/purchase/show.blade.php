@extends('layout.master')
@section('css')
    <style>
        body {
            font-family: "Roboto";
        }
    </style>
@stop
@section('content')

    <div class="content">
        <h3 class="page-title">Purchase Order</h3>
        <div class="panel panel-default">
            <div class="panel-heading">
                {{ __('general.view') }}
            </div>

            <div class="panel-body table-responsive">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>ID</th>
                                <td>{{ $purchar->id }}</td>
                            </tr>
                            <tr>
                                <th>Người Cung Cấp</th>
                                <td>{{ $purchar->id_customer }}</td>
                            </tr>
                            <tr>
                                <th>Người Tạo</th>
                                <td>{{ $purchar->id_user }}</td>
                            </tr>
                            <tr>
                                <th>Giá</th>
                                <td>{{ $purchar->price }}</td>
                            </tr>
                            <tr>
                                <th>Thuế VAT(10%)</th>
                                <td>{{ $purchar->VAT_price }}</td>
                            </tr>
                            <tr>
                                <th>Tổng Tiền</th>
                                <td>{{ $purchar->total }}</td>
                            </tr>
                        </table>
                    </div>
                </div><!-- Nav tabs -->

                <a href="{{ route('admin.purchars.index') }}" class="btn btn-default">{{ __('general.back') }}</a>
            </div>
        </div>
    </div>
@stop
