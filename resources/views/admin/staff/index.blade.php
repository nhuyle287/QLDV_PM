@extends('layout.master')
@section('content')
    <div class="content">
        <h3 class="page-title" style="font-weight: bold;  font-size: 250%;">Quản Lý Nhân Viên</h3>
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
            <a href="{{route('admin.staffs.create')}}" class="btn btn-success">{{ __('general.create') }}</a>
        </p>

        <div class="panel panel-default">
            <div class="panel-heading">

            </div>

            <div class="panel-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr style="background-color: #17a2b8; color: white; ">
                        <th style="text-align: center; ">ID</th>
                        <th style="text-align: center; ">CODE</th>
                        <th style="text-align: center;">Name</th>
                        <th style="text-align: center; ">Address</th>
                        <th style="text-align: center; ">Email</th>
                        <th style="text-align: center; ">Birthday</th>
                        <th style="text-align: center; ">Phone</th>


                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($staffs as $staff)
                        <tr>
                            <td>{{$staff->id}}</td>
                            <td>{{$staff->code}}</td>
                            <td>{{$staff->name}}</td>
                            <td>{{$staff->address}}</td>
                            <td>{{$staff->email}}</td>
                            <td>{{$staff->birthday}}</td>
                            <td>{{$staff->phone_number}}</td>

                            <td>
                                <a href="{{route('admin.staffs.show', $staff->id)}}"
                                   class="btn btn-xs btn-info">{{ __('general.view') }}</a>
                                <a href="{{route('admin.staffs.edit', [$staff->id])}}"
                                   class="btn btn-xs btn-success">{{ __('general.edit') }}</a>
                                <form style="display: inline-block" action="{{route('admin.staffs.destroy', [$staff->id])}}"
                                      method="post" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                                    @csrf
                                    <button type="submit" class="btn btn-xs btn-danger">{{ __('general.delete') }}</button>
                                </form>

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
                    {{--                    hien thi phan trang--}}
                    {{ $staffs->links() }}
                </div>
            </div>
        </div>
    </div>

@stop
