@extends('layout.master')
@section('content')
    <div class="content">
        <h3 class="page-title">Purchase Order</h3>
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
            <a href="{{route('admin.purchases.create')}}" class="btn btn-success">{{ __('general.create') }}</a>
        </p>

        <div class="panel panel-default">
            <div class="panel-heading">
                {{ __('general.list') }}
            </div>

            <div class="panel-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Nhà Cung Cấp</th>
                        <th>Người Tạo</th>
                        <th>Thành tiền</th>
                        <th>Thuế VAT(10%)</th>
                        <th>Tổng tiền</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($purchases as $index => $pur)
                        <tr>
                            <td>{{$index + 1}}</td>
                            <td>{{$pur->customer_name}}</td>
                            <td>{{$pur->created_name}}</td>
                            <td>{{number_format($pur->price)}} ₫</td>
                            <td>{{number_format($pur->VAT_price)}} ₫</td>
                            <td>{{number_format($pur->total)}} ₫</td>

                            <td>
                                <a href="{{route('admin.purchases.show', $pur->id)}}"
                                   class="btn btn-xs btn-info">{{ __('general.view') }}</a>
                                <a href="{{route('admin.purchases.create')}}"
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
                    {{ $purchases->links() }}
                </div>
            </div>
        </div>
    </div>
@stop
