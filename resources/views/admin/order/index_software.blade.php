@extends('layout.master')
@section('title')
    Đơn hàng phần mềm
@stop
@section('head')
    <link rel="stylesheet" href="css/responsive.css">

@stop
@section('content')

    <meta name="csrf-token" content="{{ csrf_token() }}">
    @can('order-software-view')
        <div class="body-content">

            <div class="card">
                <div class="card-header card-header-new">
                    {{ __('order.order_soft') }}
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
                                @can('order-software-delete')
                                    <div>
                                        <a id="btn-delete" style="margin-left: 0.25rem"
                                           class="btn btn-warning"
                                           data-toggle="modal" data-target="#deleteModal">
                                            <i class="fa fa-trash"> </i> Xóa
                                        </a>
                                    </div>
                                    <form action="{{ route('admin.order.destroy-select-soft') }}" method="POST">
                                        @csrf
                                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="exampleModalLabel">{{__('order.order_soft')}}</h5>
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
                            @can('order-software-search')
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
                                    <th class="thstyleform">{{__('order.name_customer')}}</th>
                                    <th class="thstyleform">{{__('order.name_soft')}}</th>
                                    <th class="thstyleform">{{__('order.category_soft')}}</th>
                                    <th class="thstyleform">{{__('order.status')}}</th>

                                    <th class="thstyleform">&nbsp;</th>
                                    {{--                        <th class="thstyleform">&nbsp;</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($register_softs as $register_soft)
                                    <tr>
                                        <td class="thstyleform"><input type="checkbox" class="btn-check"
                                                                       value="{{ $register_soft->id }}"></td>
                                        <td class="thstyleform">{{$register_soft->id}}</td>
                                        <td class="thstyleform">{{$register_soft->customer_name}}
                                            <p class="pstyleform1">{{$register_soft->customer_email}}</p>
                                        </td>
                                        {{--                            <td class="thstyleform">{{$register_soft->staff_name}}</td>--}}
                                        <td class="thstyleform">{{$register_soft->software}}</td>
                                        <td class="thstyleform">{{$register_soft->typesoftware}}</td>
                                        <td class="thstyleform">{{$register_soft->status}}</td>
                                        <td class="thstyleform">
                                            <button type="button" class="btn btn-sm btn-info" data-toggle="modal"
                                                    data-target="#viewModal{{ $register_soft->id }}">
                                                {{ __('general.view') }}
                                            </button>
                                            <div class="modal fade" id="viewModal{{ $register_soft->id }}"
                                                 tabindex="-1"
                                                 role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="exampleModalLabel">{{ __('order.order_soft') }}</h5>
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
                                                                    <td>{{ $register_soft->id }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>{{ __('order.name_soft') }}</td>
                                                                    <td>{{$register_soft->software}}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>{{ __('order.name_customer') }}</td>
                                                                    <td>{{ $register_soft->customer_name }}</td>
                                                                </tr>


                                                                <tr>
                                                                    <td>{{ __('order.domain_address') }}</td>
                                                                    <td>{{ $register_soft->address_domain }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>{{ __('order.start_date') }}</td>
                                                                    <td>{{date('d-m-Y', strtotime($register_soft->start_date))}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>{{ __('order.end_date') }}</td>
                                                                    <td>{{date('d-m-Y', strtotime( $register_soft->end_date)) }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>{{ __('order.status') }}</td>
                                                                    <td>{{ $register_soft->status }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>{{ __('order.deal') }}</td>
                                                                    <td>{{ucfirst(array_search($register_soft->transaction,\App\Models\ConstantsModel::TRANSACTION_SERVICES))}}</td>
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
                                            @can('order-software-update')
                                                @if($register_soft->transaction==0)
                                                    <button id="btnStatus" type="button" class="btn btn-sm btn-secondary"
                                                            data-id="{{$register_soft->id}}"
                                                            data-transaction="{{$register_soft->transaction}}"
                                                            data-toggle="modal"
                                                            data-target="#myModal"> {{ucfirst(array_search($register_soft->transaction,$transaction_soft))}}</button>
                                                @endif
                                                @if($register_soft->transaction==1)
                                                    <button id="btnStatus" type="button" class="btn btn-sm btn-warning"
                                                            data-id="{{$register_soft->id}}"
                                                            data-transaction="{{$register_soft->transaction}}"
                                                            data-toggle="modal"
                                                            data-target="#myModal"> {{ucfirst(array_search($register_soft->transaction,$transaction_soft))}}</button>
                                                @endif
                                                @if($register_soft->transaction==2)
                                                    <button id="btnStatus" type="button" class="btn btn-sm btn-success"
                                                            data-id="{{$register_soft->id}}"
                                                            data-transaction="{{$register_soft->transaction}}"
                                                            data-toggle="modal"
                                                            > {{ucfirst(array_search($register_soft->transaction,$transaction_soft))}}</button>
                                                @endif
                                                    @if($register_soft->transaction==3)
                                                        <button id="btnStatus" type="button" class="btn btn-sm btn-danger"
                                                                data-id="{{$register_soft->id}}"
                                                                data-transaction="{{$register_soft->transaction}}"
                                                                data-toggle="modal"
                                                        > {{ucfirst(array_search($register_soft->transaction,$transaction_soft))}}</button>
                                                    @endif
                                            @endcan
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center">{{ __('general.nodata') }}</td>
                                    </tr>
                                @endforelse


                                </tbody>
                                {{--cập nhật tình trạng --}}
                                <div class="modal" id="myModal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Cập nhật giao dịch</h4>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <form action="{{route('admin.order.updatetssoft')}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" id="id" value="">
                                                    <div class="form-group">

                                                        <select
                                                            class="form-control" name="transaction" id="transaction">
                                                            @foreach($transaction_soft as $transaction)
                                                                <option value="" selected disabled hidden>Cập nhật giao
                                                                    dịch
                                                                </option>
                                                                <option value="{{$transaction}}">
                                                                    {{ucfirst(array_search($transaction,$transaction_soft))}}</option>
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
                            </table>
                        </div>
                        <div class="clearfix">
                            <div class="text-right" style="float: right ; margin-top: 5px" id="page">
                                {{ $register_softs->links() }}
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
                    url: '{{ route('admin.order.search-row-soft') }}',
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
                var url = '{{ route('admin.order.software').'?amount=:amount' }}';
                url = url.replace(':amount', amountRow);
                window.location.assign(url);
            });

        });
    </script>
    <script>


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


