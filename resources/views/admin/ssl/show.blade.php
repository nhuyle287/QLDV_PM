@extends('layout.master')
@section('title')
    SSL
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
                            <h3 class="card-title"  style="font-weight: bold; font-size: 200%;">Thông tin chi tiết</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $ssl->id }}</td>
                                </tr>
                                <tr>
                                    <th>Tên SSL</th>
                                    <td>{{ $ssl->name }}</td>
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    <td>{{ $ssl->price }}</td>
                                </tr>
                                <tr>
                                    <th>Insurance Policy</th>
                                    <td>{{ $ssl->insurance_policy }}</td>
                                </tr>
                                <tr>
                                    <th>Domain Number</th>
                                    <td>{{ $ssl->domain_number }}</td>
                                </tr>
                                <tr>
                                    <th>Green Bar</th>
                                    <td>{{ $ssl->green_bar }}</td>
                                </tr>
                                <tr>
                                    <th>Sans</th>
                                    <td>{{ $ssl->sans }}</td>
                                </tr>
                                <tr>
                                    <th>Ghi Chú</th>
                                    <td>{{ $ssl->notes }}</td>
                                </tr>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="event_">
                            <a href="{{ route('admin.ssls.index') }}" class="btn btn-default">{{ __('general.back') }}</a>

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
