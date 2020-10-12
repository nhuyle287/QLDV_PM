@extends('layout.master')
@section('title')
    Phần mềm
@stop
@section('head')
    <link rel="stylesheet" href="css/event_.css">
@stop
@section('content')



    <section class="content">
        <div class="">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title" style="font-weight: bold; font-size: 200%;">Thông Tin Ứng Dụng</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $software->id }}</td>
                                </tr>
                                <tr>
                                    <th>Tên phần mềm</th>
                                    <td>{{ $software->name }}</td>
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    <td>{{ $software->price }}</td>
                                </tr>
                                <tr>
                                    <th>Số chi nhánh của phần mềm</th>
                                    <td>{{ $software->quantity_branch }}</td>
                                </tr>
                                <tr>
                                    <th>Số lượng nhân viên</th>
                                    <td>{{ $software->quantity_staff }}</td>
                                </tr>
                                <tr>
                                    <th>Số lượng tài khoản</th>
                                    <td>{{ $software->quantity_acc }}</td>
                                </tr>
                                <tr>
                                    <th>Số lượng sản phẩm/dịch vụ</th>
                                    <td>{{ $software->quantity_product }}</td>
                                </tr>
                                <tr>
                                    <th>Số lượng hóa đơn/tháng</th>
                                    <td>{{ $software->quantity_bill }}</td>
                                </tr>
                                <tr>

                                    <th>Notes</th>
                                    <td>{{ $software->notes }}</td>
                                </tr>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="event_">
                            <a href="{{ route('admin.softwares.index') }}" class="btn btn-default">{{ __('general.back') }}</a>

                        </div>
                    </div>
                    <!-- /.card -->



                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

@stop
