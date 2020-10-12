@extends('layout.master')

@section('content')



    <section class="content">
        <div class="">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title" style="font-weight: bold; font-size: 200%;">Thông tin chi tiết</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $domain->id }}</td>
                                </tr>
                                <tr>
                                    <th>CODE</th>
                                    <td>{{ $domain->code }}</td>
                                </tr>
                                <tr>
                                    <th>Tên Miền</th>
                                    <td>{{ $domain->name }}</td>
                                </tr>
                                <tr>
                                    <th>Phí Đăng Kí</th>
                                    <td>{{ $domain->fee_register }}</td>
                                </tr>
                                <tr>
                                    <th>Phí Duy Trì</th>
                                    <td>{{ $domain->fee_remain }}</td>
                                </tr>
                                <tr>
                                    <th>Phí Phí Chuyển</th>
                                    <td>{{ $domain->fee_tranformation }}</td>
                                </tr>
                                <tr>
                                    <th>Ghi Chú</th>
                                    <td>{{ $domain->notes }}</td>
                                </tr>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <a href="{{ route('admin.domains.index') }}" class="btn btn-default">{{ __('general.back') }}</a>


                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

@stop
