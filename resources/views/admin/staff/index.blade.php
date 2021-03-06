@extends('layout.master')
@section('title')
    Nhân viên
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('../css/default.css') }}">
@endsection
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @can('staff-view')
        <div class="body-content">

            <div class="clearfix" style="margin-bottom: 15px">
                @if(session('success'))
                    <div class="alert-crud btn btn-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('fail'))
                    <div class="alert-crud btn btn-danger">
                        {{ session('fail') }}
                    </div>
                @endif
                @can('staff-create')
                    <div style="float: left">
                        <a href="{{ route('admin.staffs.create') }}" class="btn btn-success">{{ __('general.create') }}</a>
                    </div>
                @endcan
            </div>

            <div class="card">
                <div class="card-header card-header-new">
                    {{ __('staff.list') }}
                </div>
                <div class="card-body">
                    <div class="clearfix">
                        <div style="float: left">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="showRow">{{ __('general.show') }}</label>
                                </div>
                                <select class="custom-select" id="showRow">
                                    <option value="10" {{ isset($_GET['amount']) ? ($_GET['amount'] === '10' ? 'selected' : '') : '' }}>10</option>
                                    <option value="25" {{ isset($_GET['amount']) ? ($_GET['amount'] === '25' ? 'selected' : '') : '' }}>25</option>
                                    <option value="50" {{ isset($_GET['amount']) ? ($_GET['amount'] === '50' ? 'selected' : '') : '' }}>50</option>
                                    <option value="100" {{ isset($_GET['amount']) ? ($_GET['amount'] === '100' ? 'selected' : '') : '' }}>100</option>
                                </select>
                                @can('staff-delete')
                                    <button id="btn-delete" style="margin-left: 5px" type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
                                        {{ __('general.delete') }}
                                    </button>
                                    <form action="{{ route('admin.staffs.destroy-select') }}" method="POST">
                                        @csrf
                                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">{{ __('staff.staff') }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="text" id="allValsDelete" name="allValsDelete[]" style="display: none">
                                                        <p>{{ __('general.confirm_delete') }}</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('general.close') }}</button>
                                                        <button type="submit" class="btn btn-danger">{{ __('general.delete') }}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                @endcan
                            </div>
                        </div>
                        <div class="clearfix" style="float: right">
                            <div style="float: left">
                                <a style="margin-right: 5px" class="btn btn-warning" href="#" role="button"><i class="fa fa-trash"></i></a>
                            </div>
                            @can('staff-search')
                                <div style="float: right">
                                    <input id="search" class="form-control" type="search" placeholder="{{ __('general.search') }}" value="{{ isset($_GET['key']) ? $_GET['key'] : '' }}">
                                </div>
                            @endcan
                        </div>
                    </div>
                    <div id="staff-table">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 10px"><input type="checkbox" id="check-all"></th>
                                        <th>{{ __('staff.id') }}</th>
                                        <th>{{ __('staff.name') }}</th>
                                        <th class="test">{{ __('staff.position') }}</th>
                                        <th class="test"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse($staffs as $item => $staff)
                                    <tr>
                                        <td><input type="checkbox" class="btn-check" value="{{ $staff->id }}"></td>
                                        <td>{{ $staffs->firstItem() + $item }}</td>
                                        <td>{{ $staff->name }}</td>
                                        <td class="test">{{ $staff->position_name }}</td>
                                        <td class="test">
                                            <button type="button" class="btn btn-xs btn-info" data-toggle="modal" data-target="#viewModal{{ $staff->id }}">
                                                {{ __('general.view') }}
                                            </button>
                                            <div class="modal fade" id="viewModal{{ $staff->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">{{ __('staff.staff') }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table class="table table-bordered table-striped table-hover">
                                                                <tbody>
                                                                <tr>
                                                                    <td>{{ __('staff.name') }}</td>
                                                                    <td>{{ $staff->name }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>{{ __('staff.email') }}</td>
                                                                    <td>{{ $staff->email }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>{{ __('staff.address') }}</td>
                                                                    <td>{{ $staff->address }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>{{ __('staff.phone_number') }}</td>
                                                                    <td>{{ $staff->phone_number }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>{{ __('staff.birthday') }}</td>
                                                                    <td>{{ date('d/m/Y', strtotime($staff->birthday)) }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>{{ __('staff.salary') }}</td>
                                                                    <td>{{ $staff->salary }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>{{ __('staff.position') }}</td>
                                                                    <td>{{ $staff->position_name }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>{{ __('staff.department') }}</td>
                                                                    <td>{{ $staff->department_name }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>{{ __('staff.start_time') }}</td>
                                                                    <td>{{ date('d/m/Y', strtotime($staff->start_time)) }}</td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('general.close') }}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @can('staff-update')
                                                <a class="btn btn-xs btn-success" href="{{ route('admin.staffs.create').'?id='.$staff->id }}" role="button">{{ __('general.update') }}</a>
                                            @endcan
                                            @can('staff-delete')
                                                <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteItemModal{{ $staff->id }}">
                                                    {{ __('general.delete') }}
                                                </button>
                                                <form action="{{ route('admin.staffs.destroy') }}" method="POST">
                                                    @csrf
                                                    <div class="modal fade" id="deleteItemModal{{ $staff->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">{{ __('staff.staff') }}</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <input type="text" name="id" value="{{ $staff->id }}" style="display: none">
                                                                    <p>{{ __('general.confirm_delete') }}</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('general.close') }}</button>
                                                                    <button type="submit" class="btn btn-danger">{{ __('general.delete') }}</button>
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
                                {!! $staffs->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endcan

    <script type="text/javascript">
        $(document).ready(function() {

            $("#check-all").click(function () {
                $('input:checkbox').not(this).prop('checked', this.checked);
            });

            $("#btn-delete").on('click', function () {
                var allVals = [];
                $(".btn-check").not("#check-all").each(function() {
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
                    url: '{{ route('admin.staffs.search-row') }}',
                    data: {
                        key: key,
                        amount: {{ isset($_GET['amount']) ? $_GET['amount'] : 'null' }}
                    },
                    success: function (response) {
                        $("#staff-table").empty();
                        $("#staff-table").html(response);
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
                var url = '{{ route('admin.staffs.index').'?amount=:amount' }}';
                url = url.replace(':amount', amountRow);
                window.location.assign(url);
            });

        });
    </script>
@stop
