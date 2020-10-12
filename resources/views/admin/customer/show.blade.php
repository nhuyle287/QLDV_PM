@extends('layout.master')

@section('content')



    <section class="content">
        <div class="">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"  style="font-weight: bold;  font-size: 200%;">Thông tin khách hàng</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>ID</th>
                                <td>{{ $customer->id }}</td>
                            </tr>
                            <tr>
                                <th>Tên Khách Hàng</th>
                                <td>{{ $customer->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $customer->email }}</td>
                            </tr>
                            <tr>
                                <th>Địa Chỉ</th>
                                <td>{{ $customer->address }}</td>
                            </tr>
                            <tr>
                                <th>Điện Thoại</th>
                                <td>{{ $customer->phone_number }}</td>
                            </tr>
                            <tr>
                                <th>Ngày Sinh</th>
                                <td>{{ $customer->birthday }}</td>
                            </tr>
                            <tr>
                                <th>Ghi Chú</th>
                                <td>{{ $customer->notes }}</td>
                            </tr>
                        </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <a href="{{ route('admin.customers.index') }}" class="btn btn-default">{{ __('general.back') }}</a>


                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

@stop
