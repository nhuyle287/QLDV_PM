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
        <div class="row">
            @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
            @if(session('fail'))
                <div class="alert alert-danger">
                    {{session('fail')}}
                </div>
            @endif
        </div>
        <p>
            <a href="{{route('admin.purposes.create')}}" class="btn btn-success">{{ __('general.create') }}</a>
        </p>

        <div class="panel panel-default">
            <div class="panel-heading">
                {{ __('general.list') }}
            </div>

            <div class="panel-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Mô tả</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($purposes as $purpose)
                        <tr>
                            <td>{{$purpose->id}}</td>
                            <td>{{ $purpose->name }}</td>
                            <td>{{ $purpose->description }}</td>
                            <td>
                                <a href="{{route('admin.purposes.show', $purpose->id)}}"
                                   class="btn btn-xs btn-info">{{ __('general.view') }}</a>
                                <a href="{{route('admin.purposes.create')}}"
                                   class="btn btn-xs btn-success">{{ __('general.edit') }}</a>
                                <a href=""
                                   class="btn btn-xs btn-danger">{{ __('general.delete') }}</a>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">{{ __('general.nodata') }}</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                <div class="text-right">
                    {{ $purposes->links() }}
                </div>
            </div>
        </div>
    </div>
@stop
