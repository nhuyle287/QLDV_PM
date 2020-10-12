@extends('layout.master')
@section('content')
    <div class="content">
        <h3 class="page-title"  style="font-weight: bold;font-size: 250%;">Phòng Ban</h3>
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
            <a href="{{route('admin.departments.create')}}" class="btn btn-success">{{ __('general.create') }}</a>
        </p>

        <div class="panel panel-default">
            <div class="panel-heading">

            </div>

            <div class="panel-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr style="background-color: #17a2b8; color: white; ">
                        <th style="text-align: center;">ID</th>
                        <th style="text-align: center; ">Mã Phòng Ban</th>
                        <th style="text-align: center; ">Tên Phòng Ban</th>
                        <th style="text-align: center; ">Mô tả</th>
                        <th style="text-align: center; ">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($departments as $dep)
                        <tr>
                            <td>{{$dep->id}}</td>
                            <td>{{ $dep->code }}</td>
                            <td>{{ $dep->name }}</td>
                            <td>{{ $dep->description }}</td>
                            <td>
                                <a href="{{route('admin.departments.show', $dep->id)}}"
                                   class="btn btn-xs btn-info">{{ __('general.view') }}</a>
                                <a href="{{route('admin.departments.create')}}"
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
                    {{ $departments->links() }}
                </div>
            </div>
        </div>
    </div>
@stop
