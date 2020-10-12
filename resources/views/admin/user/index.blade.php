@extends('layout.master')
@section('content')
    <div class="content">
        <h3 class="page-title">{{ __('sidebar.users') }}</h3>
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
            <a href="{{route('admin.users.create')}}" class="btn btn-success">{{ __('general.create') }}</a>
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
                        <th>Email</th>
                        <th>Phòng ban</th>
                        <th>Phân quyền</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->department_name }}</td>
                            <td>{{ $user->role_name }}</td>
                            <td>
                                <a href=""
                                   class="btn btn-xs btn-info">{{ __('general.view') }}</a>
                                <a href="{{ route('admin.users.edit',[$user->id]) }}"
                                   class="btn btn-xs btn-success">{{ __('general.edit') }}</a>
                                <a href=""
                                   class="btn btn-xs btn-danger">{{ __('general.delete') }}</a>
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
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@stop