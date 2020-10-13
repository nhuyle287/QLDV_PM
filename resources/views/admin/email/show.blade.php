@extends('layout.master')
@section('title')
    Email
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
                                    <td>{{ $email->id }}</td>
                                </tr>
                                <tr>
                                    <th>Tên VPS</th>
                                    <td>{{ $email->name }}</td>
                                </tr>
                                <tr>
                                    <th>Giá</th>
                                    <td>{{ $email->price }}</td>
                                </tr>
                                <tr>
                                    <th>Dung Lượng</th>
                                    <td>{{ $email->capacity }}</td>
                                </tr>
                                <tr>
                                    <th>Email Numbe</th>
                                    <td>{{ $email->email_number }}</td>
                                </tr>
                                <tr>
                                    <th>Email Forwarder</th>
                                    <td>{{ $email->email_forwarder }}</td>
                                </tr>
                                <tr>
                                    <th>Email List</th>
                                    <td>{{ $email->email_list }}</td>
                                </tr>
                                <tr>
                                    <th>Parked-domains</th>
                                    <td>{{ $email->parked_domains }}</td>
                                </tr>
                                <tr>
                                    <th>Ghi Chú</th>
                                    <td>{{ $email->notes }}</td>
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
