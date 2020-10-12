@extends('layout.header')

{{--@section('content')--}}

{{--    <div class="content">--}}
{{--        <h3 class="page-title">Thông Tin Ứng Dụng</h3>--}}
{{--        <div class="panel panel-default">--}}
{{--            <div class="panel-heading">--}}
{{--                {{ __('general.view') }}--}}
{{--            </div>--}}

{{--            <div class="panel-body table-responsive">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-6">--}}
{{--                        <table class="table table-bordered table-striped">--}}
{{--                            <tr>--}}
{{--                                <th>ID</th>--}}
{{--                                <td>{{ $register_service->id }}</td>--}}

{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <th>Code</th>--}}
{{--                                <td>{{ $register_service->code }}</td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <th>Customer Name</th>--}}
{{--                                <td>{{ $customer_name }}</td>--}}
{{--                            </tr>--}}

{{--                            <tr>--}}
{{--                                <th>Service Name</th>--}}
{{--                                <td>{{ $register_service->service_name }}</td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}

{{--                                <th>Start Date</th>--}}
{{--                                <td>{{ $register_service->start_date }}</td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}

{{--                                <th>End Date</th>--}}
{{--                                <td>{{ $register_service->end_date }}</td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}

{{--                                <th>Exist Date</th>--}}
{{--                                <td>{{ $register_service->exist_date }}</td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}

{{--                                <th>Notes</th>--}}
{{--                                <td>{{ $register_service->notes }}</td>--}}
{{--                            </tr>--}}

{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div><!-- Nav tabs -->--}}

{{--                <a href="{{ route('admin.invoices.index') }}" class="btn btn-default">{{ __('general.back') }}</a>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--@stop--}}
<div class="container">
    <div class="row title-invoice">
        <div class="col-md-4 img-title">
            Chèn Hình
        </div>
        <div class="col-md-4 invoice-date">
            <h4>HÓA ĐƠN GIÁ TRỊ GIA TĂNG</h4>
            <p>(VAT INVOICE)</p>
            <p class="date-invoice">Ngày (day)   tháng(month)  năm (year)  </p>
        </div>
        <div class="col-md-4 invoice-info">
            <p>Mẫu số (Form No.):</p>
            <p>Kí hiệu (Serial No.):</p>
            <p>Số (Invoice No.):</p>
        </div>
    </div>
    <hr>
    <div class="row company-seller">
        <div class="col-md-2 form-company-seller">
            <p>Đơn vị bán (Seller):</p>
            <p>MST(Tax Code):</p>
            <p>Địa chỉ (Address):</p>
            <p>Điện thoại(Tel.):</p>
            <p>STK (Account No.):</p>
        </div>
    </div>
    <hr>
    <div class="row company-seller">
        <div class="col-md-10 form-company-buyer">
            <p>Người mua (Buyer):</p>
            <p>Đơn vị(Co.name):</p>
            <p>MST(Tax Code):</p>
            <p>Địa chỉ (Address):</p>
            <p>HTTT(Pay. method):</p>
            <p>STK (Account No.):</p>
        </div>
    </div>
    <hr>
    <div class="row company-seller">
        <div class="col-md-12 panel-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>STT<br>(No.)</th>
                    <th>Tên hàng hóa, dịch vụ<br>(Description)</th>
                    <th>ĐVT<br>(Unit)</th>

                    <th>SL<br>(Quality)</th>
                    <th>Đơn giá<br>(Unit Price)</th>
                    <th>Thành tiền<br>(Amount)</th>
                    <th>Thuế suất<br>(Tax Rate)</th>
                    <th>Tiền Thuế<br>(Tax Amount)</th>
                    <th>Cộng<br>(Sum)</th>

                </tr>
                </thead>
{{--                <tbody>--}}
{{--                @forelse($register_services as $register_service)--}}
{{--                    <tr>--}}
{{--                        <td>{{$register_service->id}}</td>--}}
{{--                        <td>{{$register_service->code}}</td>--}}
{{--                        <td>{{$register_service->customer_name}}</td>--}}
{{--                        <td>{{$register_service->domain_name}}</td>--}}
{{--                        <td>{{$register_service->hosting_name}}</td>--}}
{{--                        <td>{{$register_service->vps_name}}</td>--}}
{{--                        <td>{{$register_service->email_name}}</td>--}}
{{--                        <td>{{$register_service->ssl_name}}</td>--}}
{{--                        <td>{{$register_service->website_name}}</td>--}}
{{--                        <td>{{$register_service->start_date}}</td>--}}
{{--                        <td>{{$register_service->end_date}}</td>--}}
{{--                        <td>{{$register_service->exist_date}}</td>--}}
{{--                        <td>{{$register_service->notes}}</td>--}}
{{--                        <td>{{$register_service->status}}</td>--}}

{{--                        <td>--}}
{{--                            <a href="{{route('admin.invoices.show', $register_service->id)}}"--}}
{{--                               class="btn btn-xs btn-info">{{ __('general.view') }}</a>--}}
{{--                            <a href="{{route('admin.invoices.edit', [$register_service->id])}}"--}}
{{--                               class="btn btn-xs btn-success">{{ __('general.edit') }}</a>--}}
{{--                            <form style="display: inline-block" action="{{route('admin.invoices.destroy', [$register_service->id])}}"--}}
{{--                                  method="post" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">--}}
{{--                                @csrf--}}
{{--                                <button type="submit" class="btn btn-xs btn-danger">{{ __('general.delete') }}</button>--}}
{{--                            </form>--}}

{{--                        </td>--}}

{{--                    </tr>--}}
{{--                @empty--}}
{{--                    <tr>--}}
{{--                        <td colspan="9" class="text-center">{{ __('general.nodata') }}</td>--}}
{{--                    </tr>--}}
{{--                @endforelse--}}
{{--                </tbody>--}}
            </table>
        </div>
    </div>
    <hr>
    <div class="row">
        <p>Hàng hóa không chịu thuế: </p>
    </div>
    <div class="row">
        <p>Hàng hóa chịu thuế: </p>
    </div>
    <div class="row">
        <p>Tiền Thuế (10%): </p>
    </div>
    <div class="row">
        <p>Tổng cộng thanh toán: </p>
    </div>
    <hr>
    <div class="row signature">
        <div class="col-md-4 signature-buyer">
            <p>Người mua hàng</p>
            <p>(Ký ghi rõ họ và tên)</p>
        </div>
        <div class="col-md-4 signature-seller">
            <p>Người bán hàng</p>
            <p>(Ký ghi rõ họ và tên)</p>
        </div>
        <div class="col-md-4 signature-head-seller">
            <p>Thủ trưởng đơn vị</p>
            <p>(Ký, đóng dấu, ghi rõ họ và tên)</p>
        </div>
    </div>

</div>
