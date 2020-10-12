@extends('layout.master')

@section('content')

    <div class="content">
        <h3 class="page-title">Quản lý sản phẩm</h3>
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
                                <td>{{ $product->id }}</td>
                            </tr>
                            <tr>
                                <th>Mã Sản Phẩm</th>
                                <td>{{ $product->code }}</td>
                            </tr>
                            <tr>
                                <th>Tên Khách Hàng</th>
                                <td>{{ $product->customer_name }}</td>
                            </tr>
                            <tr>
                                <th>Tên Sản Phẩm</th>
                                <td>{{ $product->name }}</td>
                            </tr>
                            <tr>
                                <th>Mã Đơn Vị</th>
                                <td>{{ $product->unit_name }}</td>
                            </tr>
                            <tr>
                                <th>Giá Sản Phẩm</th>
                                <td>{{ $product->price }}</td>
                            </tr>
                            <tr>
                                <th>Mô Tả</th>
                                <td>{{ $product->description }}</td>
                            </tr>
                        </table>
                    </div>
                </div><!-- Nav tabs -->

                <a href="{{ route('admin.products.index') }}" class="btn btn-default">{{ __('general.back') }}</a>
            </div>
        </div>
    </div>
@stop
