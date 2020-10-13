@extends('layout.master')
@section('css')
    <style>
        body {
            font-family: "Roboto";
        }
    </style>
@stop
@section('content')

    <div class="content">
        <h3 class="page-title">Mục đích sản phẩm</h3>
        <div class="panel panel-default">
            <div class="panel-heading">
                {{ __('general.view') }}
            </div>

            <div class="panel-body table-responsive">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>ID</th>
                                <td>{{ $purpose->id }}</td>
                            </tr>
                            <tr>
                                <th>Tên</th>
                                <td>{{ $purpose->name }}</td>
                            </tr>
                            <tr>
                                <th>Mô Tả</th>
                                <td>{{ $purpose->description }}</td>
                            </tr>

                        </table>
                    </div>
                </div><!-- Nav tabs -->

                <a href="{{ route('admin.purposes.index') }}" class="btn btn-default">{{ __('general.back') }}</a>
            </div>
        </div>
    </div>
@stop
