@extends('layout.master')
@section('content')
    <div class="content">
        <h3 class="page-title">Quản Lý Thu Chi</h3>
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
            <a href="{{route('admin.invoices.create')}}" class="btn btn-success">{{ __('general.create') }}</a>
        </p>

        <div class="panel panel-default">
            <div class="panel-heading">
                {{ __('general.list') }}
            </div>
            <div class="form-row">
                <div class="col-12">
                    <div class="card ">
            <div class="panel-body table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Code</th>
                        <th>Customer Name</th>
                        <th>Domain Name</th>
                        <th>Hosting Name</th>
                        <th>Vps Name</th>
                        <th>Email Name</th>
                        <th>Ssl Name</th>
                        <th>Website Name</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Exist Date</th>
                        <th>Notes</th>
                        <th>Status</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($register_services as $register_service)
                        <tr>
                            <td>{{$register_service->id}}</td>
                            <td>{{$register_service->code}}</td>
                            <td>{{$register_service->customer_name}}</td>
                            <td>{{$register_service->domain_name}}</td>
                            <td>{{$register_service->hosting_name}}</td>
                            <td>{{$register_service->vps_name}}</td>
                            <td>{{$register_service->email_name}}</td>
                            <td>{{$register_service->ssl_name}}</td>
                            <td>{{$register_service->website_name}}</td>
                            <td>{{$register_service->start_date}}</td>
                            <td>{{$register_service->end_date}}</td>
                            <td>{{$register_service->exist_date}}</td>
                            <td>{{$register_service->notes}}</td>
                            <td>{{$register_service->status}}</td>

                            <td>
                                <a href="{{route('admin.invoices.show', $register_service->id)}}"
                                   class="btn btn-xs btn-info">{{ __('general.view') }}</a>
                                <a href="{{route('admin.invoices.edit', [$register_service->id])}}"
                                   class="btn btn-xs btn-success">{{ __('general.edit') }}</a>
                                <form style="display: inline-block" action="{{route('admin.invoices.destroy', [$register_service->id])}}"
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
                    {{ $register_services->links() }}
                </div>
            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
