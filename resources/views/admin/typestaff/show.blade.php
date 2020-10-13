@extends('layout.master')
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
                            <h3 class="card-title"  style="font-weight: bold; font-size: 200%;">Thông tin Loại Nhân Viên</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $type_staff->id }}</td>
                                </tr>
                                <tr>
                                    <th>Tên Loại Phần Mềm</th>
                                    <td>{{ $type_staff->name }}</td>
                                </tr>
                                <tr>
                                    <th>Mô Tả</th>
                                    <td>{{ $type_staff->description }}</td>
                                </tr>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <a href="{{ route('admin.typestaffs.index') }}" class="btn btn-default">{{ __('general.back') }}</a>


                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

@stop
