@extends('layout.master')
@section('title')
    Danh sách phần mềm đang sử dụng
@stop
@section('css')
    <style>
        body {
            font-family: "Roboto";
        }
    </style>
@stop
@section('content')



    <section class="content">
        <div class="">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Thông Tin Đăng Ký</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>ID</th>
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
                                    <th>Giá Phần Mềm</th>
                                    <td>{{$register_soft->price}} </td>
                                </tr>
                                <tr>

                                    <th>Start Date</th>
                                    <td>{{ $register_soft->start_date }}</td>
                                </tr>
                                <tr>

                                    <th>End Date</th>
                                    <td>{{ $register_soft->end_date }}</td>
                                </tr>

                                <tr>

                                    <th>Notes</th>
                                    <td>{{ $register_soft->notes }}</td>
                                </tr>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <a href="{{ route('admin.list-services.index') }}" class="btn btn-default">{{ __('general.back') }}</a>


                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

@stop
