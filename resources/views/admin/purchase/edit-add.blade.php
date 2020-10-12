@extends('layout.master')
@section('content')
    <div class="content">
        <h3 class="page-title">Purchase Order</h3>
        <div class="form">
            @csrf
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

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ __('general.create') }}
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label>Nhà Cung Cấp *</label>
                            <select class="form-control select" onchange="changeCustomer(this)">
                                @for($i = 1; $i < 5; $i ++)
                                    <option name="" id="{{$i}}" value="{{$i}}">Vovlo {{$i}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-6 form-group">
                            <div class="order-content">
                                <p>
                                    <button class="btn btn-success add-pro" onclick="addProduct(this)">Thêm Sản Phẩm
                                    </button>
                                </p>
                                <div id="content-js">

                                </div>

                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="info-totalcart" style="display: none;">
                                <h3 class="title"><i class="fa fa-chevron-down" aria-hidden="true"></i>ĐƠN HÀNG CỦA BẠN
                                </h3>
                                <table cellspacing="0">
                                    <tfoot>
                                    <tr class="cart-subtotal">
                                        <th>THÀNH TIỀN</th>
                                        <td>
                                            <strong class="amount">0</strong>
                                            <strong> ₫</strong>
                                        </td>
                                    </tr>
                                    <tr class="cart-subtotal">
                                        <th>THUẾ VAT (10%)</th>
                                        <td>
                                            <strong class="vat-amount">0</strong>
                                            <strong> ₫</strong>
                                        </td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>TỔNG CỘNG</th>
                                        <td>
                                            <strong class="total">0</strong>
                                            <strong> ₫</strong>
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr>
            <button class="btn btn-primary">{{ __('general.save') }}</button>
            <a href="{{route('admin.print')}}" target="_blank" class="btn btn-primary">Lưu và in</a>
            <a href="{{route('admin.purchases.index')}}" class="btn btn-default">{{ __('general.back') }}</a>
        </div>
    </div>
    </div>
    </div>
    @include('part.select_product', ['flag' => 1])
@stop
