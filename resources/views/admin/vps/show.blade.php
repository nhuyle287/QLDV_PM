@extends('layout.master')
@section('title')
    VPS
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
                            <h3 class="card-title" style="font-weight: bold; font-size: 200%;">Thông tin chi tiết</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $vps->id }}</td>
                                </tr>
                                <tr>
                                    <th>Tên VPS</th>
                                    <td>{{ $vps->name }}</td>
                                </tr>
                                <tr>
                                    <th>Giá</th>
                                    <td>{{ $vps->price }}</td>
                                </tr>
                                <tr>
                                    <th>CPU</th>
                                    <td>{{ $vps->cpu }}</td>
                                </tr>
                                <tr>
                                    <th>Dung Lượng</th>
                                    <td>{{ $vps->capacity }}</td>
                                </tr>
                                <tr>
                                    <th>RAM</th>
                                    <td>{{ $vps->ram }}</td>
                                </tr>
                                <tr>
                                    <th>Băng Thông</th>
                                    <td>{{ $vps->bandwith }}</td>
                                </tr>
                                <tr>
                                    <th>Công nghệ ảo hóa</th>
                                    <td>{{ $vps->technical }}</td>
                                </tr>
                                <tr>
                                    <th>Hệ điều hành</th>
                                    <td>{{ $vps->operating_system }}</td>
                                </tr>
                                <tr>
                                    <th>Backup</th>
                                    <td>{{ $vps->backup }}</td>
                                </tr>
                                <tr>
                                    <th>Panel</th>
                                    <td>{{ $vps->panel }}</td>
                                </tr>
                                <tr>
                                    <th>Ghi chú</th>
                                    <td>{{ $vps->notes }}</td>
                                </tr>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="event_">
                            <a href="{{ route('admin.emails.index') }}" class="btn btn-default">{{ __('general.back') }}</a>

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
