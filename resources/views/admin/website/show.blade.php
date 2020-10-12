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
                                    <td>{{ $website->id }}</td>
                                </tr>
                                <tr>
                                    <th>Website Name</th>
                                    <td>{{ $website->name }}</td>
                                </tr>
                                <tr>
                                    <th>Type Website</th>
                                    <td>{{ $website->type_website }}</td>
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    <td>{{ $website->price }}</td>
                                </tr>
                                <tr>

                                    <th>Notes</th>
                                    <td>{{ $website->notes }}</td>
                                </tr>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <a href="{{ route('admin.websites.index') }}" class="btn btn-default">{{ __('general.back') }}</a>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

@stop
