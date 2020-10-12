@extends('layout.master')
@section('content')
    <div class="content">
        <h3 class="page-title">{{ __('sidebar.roles') }}</h3>
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
            <a href="{{route('admin.roles.create')}}" class="btn btn-success">{{ __('general.create') }}</a>
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
                    @forelse($roles as $role)
                        <tr>
                            <td>{{$role->id}}</td>
                            <td>{{ $role->title }}</td>
                            <td>{{ $role->description }}</td>
                            <td>
                                <a href="{{ route('admin.roles.show',[$role->id]) }}"
                                   class="btn btn-xs btn-info">{{ __('general.view') }}</a>
                                <a href="{{ route('admin.roles.edit',[$role->id]) }}"
                                   class="btn btn-xs btn-success">{{ __('general.edit') }}</a>
                                <form style="display: inline-block" action="{{route('admin.roles.destroy', [$role->id])}}"
                                      method="post" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                                    @csrf
                                    <button type="submit" class="btn btn-xs btn-danger">{{ __('general.delete') }}</button>
                                </form>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">No data</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                <div class="text-right">
                    {{ $roles->links() }}
                </div>
            </div>
        </div>
    </div>
@stop