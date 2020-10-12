@extends('layout.master')

@section('content')

    <section class="content">
        <div class="">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title" style="font-weight: bold;  font-size: 200%;">Thông tin chi tiết</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $staff->id }}</td>
                                </tr>
                                <tr>
                                    <th>CODE</th>
                                    <td>{{ $staff->code }}</td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $staff->name }}</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{ $staff->address }}</td>
                                </tr>
                                <tr>

                                    <th>Email</th>
                                    <td>{{ $staff->email }}</td>
                                </tr>
                                <tr>

                                    <th>Birthday</th>
                                    <td>{{ $staff->birthday }}</td>
                                </tr>
                                <tr>

                                    <th>Phone</th>
                                    <td>{{ $staff->phone_number }}</td>
                                </tr>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <a href="{{ route('admin.staffs.index') }}" class="btn btn-default">{{ __('general.back') }}</a>


                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

@stop
