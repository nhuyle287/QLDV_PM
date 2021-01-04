@extends('layout.master')
@section('title')
    Hợp đồng
@stop
@section('head')
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/contract.css">
    <style>
        th{
            text-align: center;
        }
        .total_price:first-letter{
            text-transform: capitalize;
        }
    </style>
@stop
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @can('contract-view')
        <div class="body-content">

            <div class="card">
                <div class="card-header card-header-new">
                    {{ __('contract.list') }}
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
                                @can('contract-delete')
                                    <div>
                                        <a id="btn-delete" style="margin-left: 0.25rem"
                                           class="btn btn-warning"
                                           data-toggle="modal" data-target="#deleteModal">
                                            <i class="fa fa-trash"> </i> Xóa
                                        </a>
                                    </div>
                                    <form action="{{ route('admin.contract.destroy-select') }}" method="POST">
                                        @csrf
                                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="exampleModalLabel">{{__('contract.contract')}}</h5>
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


                            @can('contract-search')
                                <div>
                                    <input id="search" class="form-control" type="search"
                                           placeholder="{{ __('general.search') }}"
                                           value="{{ isset($_GET['key']) ? $_GET['key'] : '' }}">
                                </div>
                            @endcan
                                <div style="margin:0.5rem 0.25rem" class="dropdown">

                                    <select onchange="selectContract(this)" style="margin-right: 8px;" id="contract"
                                            class="btn btn-primary" name="filter_contract">
                                        <option class="dropdown-item" style="background-color: white" value="">Lọc hợp đồng</option>
                                        <option class="dropdown-item" style="background-color: white" value="0">Tất cả hợp đồng</option>
                                        <option class="dropdown-item" style="background-color: white" value="1">Hợp đồng Website
                                        </option>
                                        <option class="dropdown-item" style="background-color: white" value="2">Hợp đồng Hosting
                                        </option>
                                        <option class="dropdown-item" style="background-color: white" value="3">Hợp đồng VPS</option>
                                        <option class="dropdown-item" style="background-color: white" value="4">Hợp đồng Tên miền
                                        </option>
                                    </select>

                                </div>
                        </div>
                    </div>
                    <div class="background-popup" style="margin: 2rem 0 2rem 0">

                    </div>
                    <div id="contract-table">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr>
                                    <th style="width: 10px"><input type="checkbox" id="check-all"></th>
                                    <th>{{ __('contract.id') }}</th>
                                    <th>{{ __('contract.code') }}</th>
                                    <th>{{ __('contract.customer') }}</th>
                                    <th>{{ __('contract.contract_date') }}</th>
                                    <th class="test"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($contracts as $item => $contract)
                                    <tr>
                                        <td><input type="checkbox" class="btn-check" value="{{ $contract->id }}"></td>
                                        <td>{{ $contracts->firstItem() + $item }}</td>
                                        <td>{{ $contract->code }}</td>
                                        <td>{{ $contract->name }}</td>
                                        <td>{{date('d-m-Y', strtotime($contract->date_create))}}</td>
                                        <td class="test">
                                            <a onclick="show({{$contract->id}})" class="btn btn-xs btn-info" >
                                                {{ __('general.view') }}
                                            </a>

                                            @can('contract-update')
                                                <a href="{{route('admin.contract.edit', [$contract->id])}}"
                                                   class="btn  btn-success btn-xs">{{ __('general.update') }}</a>
                                            @endcan
                                            @can('contract-delete')
                                                <button type="button" class="btn btn-xs btn-danger" data-toggle="modal"
                                                        data-target="#deleteItemModal{{ $contract->id }}">
                                                    {{ __('general.delete') }}
                                                </button>
                                                <form action="{{ route('admin.contract.destroy') }}" method="POST">
                                                    @csrf
                                                    <div class="modal fade" id="deleteItemModal{{ $contract->id }}"
                                                         tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                         aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="exampleModalLabel">{{ __('contract.contract') }}</h5>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <input type="text" name="id" value="{{ $contract->id }}"
                                                                           style="display: none">
                                                                    <p>{{ __('general.confirm_delete') }}</p>
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
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td style="text-align: center" colspan="5">{{ __('general.nodata') }}</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="clearfix">
                            <div style="float: right">
                                {!! $contracts->links() !!}
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
        function show(id)
        {
            $('.background-popup').show();
            $('.background-popup').addClass('d-flex align-items-center justify-content-center');
            $('.background-popup').load("/admin/contract/" + id+"/show/")
        }
        $(document).ready(function () {
            $(document).on('click', '#cancel-button', function() {
                $('.background-popup').hide();
                $('.background-popup').removeClass('d-flex align-items-center justify-content-center');
                $('.background-popup').empty();
            })

            $("#check-all").click(function () {
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
                var filter_contract=$('#contract').val();
                console.log(filter_contract);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: '{{ route('admin.contract.search-row') }}',
                    data: {
                        key: key,
                        amount: {{ isset($_GET['amount']) ? $_GET['amount'] : 'null' }},
                        filter:filter_contract,
                    },
                    success: function (response) {
                        console.log(response);
                        $("#contract-table").empty();
                        $("#contract-table").html(response);
                    },
                });
            });

            $("#contract").on('change', function () {
                var filter_contract=$('#contract').val();
                console.log(filter_contract);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: '{{ route('admin.contract.filter') }}',
                    data: {
                        amount: {{ isset($_GET['amount']) ? $_GET['amount'] : 'null' }},
                        filter:filter_contract,
                    },
                    success: function (response) {
                        console.log(response);
                        $("#contract-table").empty();
                        $("#contract-table").html(response);
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
                var url = '{{ route('admin.contract.index').'?amount=:amount' }}';
                url = url.replace(':amount', amountRow);
                window.location.assign(url);
            });

        });
    </script>
@stop
