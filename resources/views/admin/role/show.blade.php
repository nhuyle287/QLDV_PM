@extends('layout.master')
@section('content')
    <div class="content">
        <h3 class="page-title">{{ __('sidebar.roles') }}</h3>

        <div class="panel panel-default">
            <div class="panel-heading">
                @lang('general.view')
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>ID</th>
                                <td>{{ $role->id }}</td>
                            </tr>
                            <tr>
                                <th>Tên</th>
                                <td>{{ $role->title }}</td>
                            </tr>
                            <tr>
                                <th>Mô tả</th>
                                <td>{{ $role->description }}</td>
                            </tr>
                        </table>
                    </div>
                </div><!-- Nav tabs -->

                <a href="{{ route('admin.roles.index') }}" class="btn btn-default">{{ __('general.back') }}</a>
            </div>
        </div>
    </div>
@stop