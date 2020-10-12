@extends('layout.master')

@section('content')
    <section class="content">
        <div class="">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"  style="font-weight: bold;  font-size: 200%;">Thông tin Loại Phần Mềm</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $type_software->id }}</td>
                                </tr>
                                <tr>
                                    <th>Tên Loại Phần Mềm</th>
                                    <td>{{ $type_software->name }}</td>
                                </tr>
                                <tr>
                                    <th>Mô Tả</th>
                                    <td>{{ $type_software->description }}</td>
                                </tr>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <a href="{{ route('admin.typesoftwares.index') }}" class="btn btn-default">{{ __('general.back') }}</a>


                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

@stop
