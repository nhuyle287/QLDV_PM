@extends('layout.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('../css/default.css') }}">
@endsection
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @can('role-view')
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
                @can('role-create')
                    <div style="float: left">
                        <a href="{{ route('admin.roles.create') }}" class="btn btn-success">{{ __('general.create') }}</a>
                    </div>
                @endcan
            </div>

            <div class="card">
                <div class="card-header card-header-new">
                    {{ __('role.list') }}
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
                                @can('role-delete')
                                    <button id="btn-delete" style="margin-left: 5px; border-radius: 0px; background-color: #ed6d6d" type="button" class="delete btn btn-danger" data-toggle="modal" data-target="#deleteModal">
                                        {{ __('general.delete') }}
                                    </button>
                                    <form action="{{ route('admin.roles.destroy-select') }}" method="POST">
                                        @csrf
                                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">{{ __('role.role') }}</h5>
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
                        @can('role-search')
                            <div style="float: right">
                                <input id="search" class="form-control" type="search" placeholder="{{ __('general.search') }}" value="{{ isset($_GET['key']) ? $_GET['key'] : '' }}">
                            </div>
                        @endcan
                    </div>
                    <div id="role-table">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 10px"><input type="checkbox" id="check-all"></th>
                                        <th>{{ __('role.id') }}</th>
                                        <th style="min-width: 100px">{{ __('role.role') }}</th>
                                        <th>{{ __('role.permission') }}</th>
                                        <th style="min-width: 200px"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse($roles as $item => $role)
                                    <tr>
                                        <td><input type="checkbox" class="btn-check" value="{{ $role->id }}"></td>
                                        <td>{{ $roles->firstItem() + $item }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            @php /** @var TYPE_NAME $role */
                                            $permissions = \App\Models\PermissionRole::where('role_id', '=', $role->id)->get();
                                            @endphp
                                            @foreach($permissions as $permission)
                                                <span class="badge badge-info">{{ isset(\App\Models\Permission::find($permission->permission_id)->name) ? \App\Models\Permission::find($permission->permission_id)->name : '' }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-xs btn-info" data-toggle="modal" data-target="#viewModal{{ $role->id }}">
                                                {{ __('general.view') }}
                                            </button>
                                            <div class="modal fade" id="viewModal{{ $role->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">{{ __('role.role') }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table class="table table-bordered table-striped table-hover">
                                                                <thead>
                                                                <tr>
                                                                    <th style="min-width: 100px">{{ __('role.role') }}</th>
                                                                    <th>{{ __('role.permission') }}</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <td>{{ $role->name }}</td>
                                                                    <td>
                                                                        @php /** @var TYPE_NAME $role */
                                                                        $permissions = \App\Models\PermissionRole::where('role_id', '=', $role->id)->get();
                                                                        @endphp
                                                                        @foreach($permissions as $permission)
                                                                            <span class="badge badge-info">{{ isset(\App\Models\Permission::find($permission->permission_id)->name) ? \App\Models\Permission::find($permission->permission_id)->name : '' }}</span>
                                                                        @endforeach
                                                                    </td>
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
                                            @can('role-update')
                                                <a class="btn btn-xs btn-success" href="{{ route('admin.roles.create').'?id='.$role->id }}" role="button">{{ __('general.update') }}</a>
                                            @endcan
                                            @can('role-delete')
                                                <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteItemModal{{ $role->id }}">
                                                    {{ __('general.delete') }}
                                                </button>
                                                <form action="{{ route('admin.roles.destroy') }}" method="POST">
                                                    @csrf
                                                    <div class="modal fade" id="deleteItemModal{{ $role->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">{{ __('role.role') }}</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <input type="text" name="id" value="{{ $role->id }}" style="display: none">
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
                                {!! $roles->links() !!}
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
                    url: '{{ route('admin.roles.search-row') }}',
                    data: {
                        key: key,
                        amount: {{ isset($_GET['amount']) ? $_GET['amount'] : 'null' }}
                    },
                    success: function (response) {
                        $("#role-table").empty();
                        $("#role-table").html(response);
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
                var url = '{{ route('admin.roles.index').'?amount=:amount' }}';
                url = url.replace(':amount', amountRow);
                window.location.assign(url);
            });

        });
    </script>
@stop
