@extends('layout.master')
@section('title')
    Hosting
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
                            <h3 class="card-title" style="font-weight: bold; font-size: 200%;">Thông Tin Tên Miền</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $hosting->id }}</td>
                                </tr>
                                <tr>
                                    <th>Tên Hosting</th>
                                    <td>{{ $hosting->name }}</td>
                                </tr>
                                <tr>
                                    <th>Giá</th>
                                    <td>{{ $hosting->price }}</td>
                                </tr>
                                <tr>
                                    <th>Dung Lượng</th>
                                    <td>{{ $hosting->capacity }}</td>
                                </tr>
                                <tr>
                                    <th>Băng Thông</th>
                                    <td>{{ $hosting->bandwith }}</td>
                                </tr>
                                <tr>
                                    <th>Sub-domain</th>
                                    <td>{{ $hosting->sub_domain }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $hosting->email }}</td>
                                </tr>
                                <tr>
                                    <th>FTP</th>
                                    <td>{{ $hosting->ftp }}</td>
                                </tr>
                                <tr>
                                    <th>Database</th>
                                    <td>{{ $hosting->database }}</td>
                                </tr>
                                <tr>
                                    <th>Addon-domain</th>
                                    <td>{{ $hosting->adddon_domain }}</td>
                                </tr>
                                <tr>
                                    <th>Park_domain</th>
                                    <td>{{ $hosting->park_domain }}</td>
                                </tr>
                                <tr>
                                    <th>Ghi chú</th>
                                    <td>{{ $hosting->notes }}</td>
                                </tr>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="event_">
                            <a href="{{ route('admin.hostings.index') }}" class="btn btn-default">{{ __('general.back') }}</a>

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
