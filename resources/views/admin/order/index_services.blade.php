@extends('layout.master')
@section('title')
    Đơn hàng dịch vụ
@stop
@section('head')
    <link rel="stylesheet" href="css/responsive.css">
@stop
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @can('order-service-view')
        <div class="body-content">

            <div class="card">
                <div class="card-header card-header-new">
                    {{ __('order.order_service') }}
                </div>

                <div class="card-body">
                    <div class="clearfix">

                        <div style="float: left">
                            <div class="input-group mb-3 d-flex flex-nowrap">

                                <label class="btn btn-default" for="showRow">{{ __('general.show') }}</label>

                                <select class="custom-select" id="showRow">
                                    <option
                                        value="10" {{ isset($_GET['amount']) ? ($_GET['amount'] === '10' ? 'selected' : '') : '' }}>
                                        10
                                    </option>
                                    <option
                                        value="25" {{ isset($_GET['amount']) ? ($_GET['amount'] === '25' ? 'selected' : '') : '' }}>
                                        25
                                    </option>
                                    <option
                                        value="50" {{ isset($_GET['amount']) ? ($_GET['amount'] === '50' ? 'selected' : '') : '' }}>
                                        50
                                    </option>
                                    <option
                                        value="100" {{ isset($_GET['amount']) ? ($_GET['amount'] === '100' ? 'selected' : '') : '' }}>
                                        100
                                    </option>
                                </select>
                                @can('order-service-delete')
                                    <div>
                                        <a id="btn-delete" style="margin-left: 0.25rem"
                                           class="btn btn-warning"
                                           data-toggle="modal" data-target="#deleteModal">
                                            <i class="fa fa-trash"> </i> Xóa
                                        </a>
                                    </div>
                                    <form action="{{ route('admin.order.destroy-select') }}" method="POST">
                                        @csrf
                                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="exampleModalLabel">{{__('order.order_service')}}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="text" id="allValsDelete" name="allValsDelete[]"
                                                               style="display: none">
                                                        <p>{{ __('general.confirm_delete_all') }}</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ __('general.close') }}</button>
                                                        <button type="submit"
                                                                class="btn btn-danger">{{ __('general.delete') }}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                @endcan
                                <div class="clearfix" style="margin-left: 0.25rem; margin-bottom: 0">
                                    @if(session('success'))
                                        <div class="btn btn-success button_  float-right">
                                            {{session('success')}}
                                        </div>
                                    @endif
                                    @if(session('fail'))
                                        <div class="btn btn-danger  button_ float-right">
                                            {{session('fail')}}
                                        </div>
                                    @endif

                                </div>
                            </div>

                        </div>
                        <div style="float: right">
                            {{--                            <div style="float: left">--}}
                            {{--                                <a style="margin-right: 5px" class="btn btn-warning" href="#" role="button"><i--}}
                            {{--                                        class="fas fa-search"></i></a>--}}
                            {{--                            </div>--}}
                            @can('order-service-search')
                                <div>
                                    <input id="search" class="form-control" type="search"
                                           placeholder="{{ __('general.search') }}"
                                           value="{{ isset($_GET['key']) ? $_GET['key'] : '' }}">
                                </div>
                            @endcan
                        </div>
                    </div>

                    <div id="order-table">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr>
                                    <th style="width: 10px"><input type="checkbox" id="check-all"></th>
                                    <th class="thstyleform">{{__('order.ID')}}</th>
                                    <th class="thstyleform">
                                        {{__('order.name_customer')}}
                                    </th>
                                    <th class="thstyleform">{{__('order.name_service')}}</th>
                                    <th class="thstyleform">{{__('order.deal')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $stt = 1?>
                                @forelse($register_services as $register_service)
                                    <tr>
                                        <td class="thstyleform"><input type="checkbox" class="btn-check"
                                                                       value="{{ $register_service->id }}"></td>
                                        <td class="thstyleform">{{$stt++}}</td>
                                        <td class="thstyleform">{{$register_service->customer_name}}
                                            <p class="pstyleform1">{{$register_service->customer_email}}</p></td>
                                        <td class="thstyleform">{{$register_service->domain_name}}
                                            {{$register_service->hosting_name}}
                                            {{$register_service->vps_name}}
                                            {{$register_service->email_name}}
                                            {{$register_service->ssl_name}}
                                            {{$register_service->website_name}}
                                            <p class="pstyleform1">{{$register_service->address_domain}}</p></td>

                                        <td class="thstyleform">
                                            <button type="button" class="btn btn-sm btn-info" data-toggle="modal"
                                                    data-target="#viewModal{{ $register_service->id }}">
                                                {{ __('general.view') }}
                                            </button>
                                            <div class="modal fade" id="viewModal{{ $register_service->id }}"
                                                 tabindex="-1"
                                                 role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="exampleModalLabel">{{ __('order.order_service') }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table
                                                                class="table table-bordered table-striped table-hover">
                                                                <tbody>
                                                                <tr>
                                                                    <td>{{ __('order.ID') }}</td>
                                                                    <td>{{ $register_service->id }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>{{ __('order.name_service') }}</td>
                                                                    <td>{{$register_service->domain_name}}
                                                                        {{$register_service->hosting_name}}
                                                                        {{$register_service->vps_name}}
                                                                        {{$register_service->email_name}}
                                                                        {{$register_service->ssl_name}}
                                                                        {{$register_service->website_name}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>{{ __('order.name_customer') }}</td>
                                                                    <td>{{ $register_service->customer_name }}</td>
                                                                </tr>


                                                                <tr>
                                                                    <td>{{ __('order.domain_address') }}</td>
                                                                    <td>{{ $register_service->address_domain }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>{{ __('order.start_date') }}</td>
                                                                    <td>{{date('d-m-Y', strtotime($register_service->start_date))}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>{{ __('order.end_date') }}</td>
                                                                    <td>{{date('d-m-Y', strtotime( $register_service->end_date)) }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>{{ __('order.status') }}</td>
                                                                    <td>{{ $register_service->status }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>{{ __('order.deal') }}</td>
                                                                    <td>{{ucfirst(array_search($register_service->transaction,\App\Models\ConstantsModel::TRANSACTION_SERVICES))}}</td>
                                                                </tr>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">{{ __('general.close') }}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            @can('order-service-update')
                                                @if($register_service->transaction === '1')
                                                <button id="btnStatus" type="button" class="btn btn-sm btn-danger"
                                                        data-id="{{$register_service->id}}"
                                                        data-transaction="{{$register_service->transaction}}"
                                                        data-toggle="modal"
                                                        data-target="#myModal"> {{ucfirst(array_search($register_service->transaction,$transaction_services))}}</button>
                                                @endif
                                                    @if($register_service->transaction === '2')
                                                        <button id="btnStatus" type="button" class="btn btn-sm btn-success"
                                                                data-id="{{$register_service->id}}"
                                                                data-transaction="{{$register_service->transaction}}"
                                                                data-toggle="modal"
                                                                data-target="#myModal"> {{ucfirst(array_search($register_service->transaction,$transaction_services))}}</button>
                                                    @endif
                                                    @if($register_service->transaction === '0')
                                                        <button id="btnStatus" type="button" class="btn btn-sm btn-secondary"
                                                                data-id="{{$register_service->id}}"
                                                                data-transaction="{{$register_service->transaction}}"
                                                                data-toggle="modal"
                                                                data-target="#myModal"> {{ucfirst(array_search($register_service->transaction,$transaction_services))}}</button>
                                                    @endif
                                            @endcan
                                        </td>

                                    </tr>
                                @empty

                                @endforelse
                                {{--cập nhật tình trạng --}}
                                <div class="modal" id="myModal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Cập nhật trạng thái</h4>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <form action="{{route('admin.order.updatetservices')}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" id="id" value="">
                                                    <div class="form-group">

                                                        <select
                                                            class="form-control" name="transaction" id="transaction">
                                                            @foreach($transaction_services as $transaction)
                                                                <option value="" selected disabled hidden>Cập nhật giao
                                                                    dịch
                                                                </option>
                                                                <option value="{{$transaction}}">
                                                                    {{ucfirst(array_search($transaction,$transaction_services))}}</option>
                                                            @endforeach
                                                        </select>

                                                    </div>
                                                    <div class="form-group">
                                                    </div>
                                                    <button style="background: green;color: white;" type="submit"
                                                            class="btn btn-default">Save
                                                    </button>
                                                </form>
                                            </div>
                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                    Close
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </tbody>
                            </table>
                        </div>
                        <div class="clearfix">
                            <div class="text-right" style="float: right ; margin-top: 5px" id="page">
                                {{ $register_services->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endcan
@stop

@section('javascript')
    <script type="text/javascript">
        $(document).ready(function () {

            $("#check-all").on('click', function () {
                // alert('a')
                $('input:checkbox').not(this).prop('checked', this.checked);
            });

            $("#btn-delete").on('click', function () {
                var allVals = [];
                $(".btn-check").not("#check-all").each(function () {
                    if ($(this).is(":checked")) {
                        allVals.push($(this).val());
                    }
                });
                // console.log(allVals);
                $('#allValsDelete').val(allVals);
            });

            $("#search").on('keyup', function () {
                var key = $(this).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: '{{ route('admin.order.search-row') }}',
                    data: {
                        key: key,
                        amount: {{ isset($_GET['amount']) ? $_GET['amount'] : 'null' }}
                    },
                    success: function (response) {
                        $("#order-table").empty();
                        $("#order-table").html(response);
                    },
                });
            });
            $(document).on('click', '.pagination a', function (event) {
                event.preventDefault();
                var amountRow = $("#showRow :selected").val();
                var key = $("#search").val();
                var url = $(this).attr('href') + '&amount=' + amountRow + '&key=' + key;
                window.location.assign(url);
            });


            $("#showRow").on('change', function () {
                var amountRow = $("#showRow :selected").val();
                var url = '{{ route('admin.order.services').'?amount=:amount' }}';
                url = url.replace(':amount', amountRow);
                window.location.assign(url);
            });

        });
    </script>
    <script type="text/javascript">
        //update transaction
        $('#myModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var transaction = button.data('transaction')
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #transaction option:selected').text();
            modal.find('.modal-body #id').val(id);
        })
    </script>

@stop


