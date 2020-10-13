@extends('layout.master')
@section('title')
    Email
@stop
@section('head')
    <style>
        body {
            font-family: "Roboto";
        }

    </style>
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/domain.css">
@stop
@section('content')
    <div class="content">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @can('email-view')
            <div class="body-content">

                <div class="card-">
                    <div class="card-header card-header-new">
                        Danh sách email
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
                                        @can('email-create')
                                            <div class="create float-left">
                                                <a href="{{route('admin.emails.create')}}" class="btn btn-success "><i
                                                        class="fas fa-plus"></i> {{ __('general.create') }}</a>
                                            </div>
                                        @endcan
                                    </div>
                                </div>

                            </div>
                            <div style="float: right">

                                @can('email-search')
                                    <div>
                                        <input id="search" class="form-control" type="search"
                                               placeholder="{{ __('general.search') }}"
                                               value="{{ isset($_GET['key']) ? $_GET['key'] : '' }}">
                                    </div>
                                @endcan
                            </div>
                        </div>

                        <div id="email-table">
                            <div class="grid-container" id="domains">
                                @forelse($emails as $email)
                                    <div class="card card-sytle">
                                        {{--                                <div class="card-img-top" style="background-image: url({{ 'storage/'. $hosting->images }});" ></div>--}}
                                        <div class="card-body">
                                            <strong style="color: rgba(251,105,1,0.98)" class="card-text">{{$email->name}}</strong>
                                            <p class="card-text">Giá: {{$email->price}}</p>
                                            <p class="card-text">Dung lượng: {{$email->capacity}}</p>
                                            <p class="card-text">Email Number:{{$email->email_number}}</p>
                                            <p class="card-text">Email Forwarder:{{$email->email_forwarder}}</p>
                                            <p class="card-text">Email List:{{$email->email_list}}</p>
                                            <p class="card-text">Parked-domains:{{$email->parked_domains}}</p>
                                            <div style="text-align: center">
                                                <button type="button" class="btn btn-xs btn-info" data-toggle="modal"
                                                        data-target="#viewModal{{ $email->id }}">
                                                    {{ __('general.view') }}
                                                </button>
                                                <div class="modal fade" id="viewModal{{ $email->id }}" tabindex="-1"
                                                     role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="exampleModalLabel">Email</h5>
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
                                                                        <td>STT</td>
                                                                        <td>{{ $email->id }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Tên email</td>
                                                                        <td>{{ $email->name }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Giá</td>
                                                                        <td>{{ $email->price }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Dung lượng</td>
                                                                        <td>{{ $email->capacity }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Số lượng email</td>
                                                                        <td>{{ $email->email_number }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Số lượng email forrwarder</td>
                                                                        <td>{{ $email->email_forwarder }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Danh sách email</td>
                                                                        <td>{{ $email->email_list }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Park domains</td>
                                                                        <td>{{ $email->parked_domains }}</td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>Ghi chú</td>
                                                                        <td>{{ $email->notes }}</td>
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
                                                @can('email-update')
                                                    <a href="{{route('admin.emails.edit', [$email->id])}}"
                                                       class="btn btn-xs btn-success">{{ __('general.edit') }}</a>
                                                @endcan
                                                @can('email-delete')
                                                    <button type="button" class="btn btn-xs btn-danger" data-toggle="modal"
                                                            data-target="#deleteItemModal{{ $email->id }}">
                                                        {{ __('general.delete') }}
                                                    </button>
                                                    <form action="{{ route('admin.emails.destroy') }}" method="POST">
                                                        @csrf
                                                        <div class="modal fade" id="deleteItemModal{{ $email->id }}"
                                                             tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                             aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="exampleModalLabel">Email</h5>
                                                                        <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <input type="text" name="id" value="{{ $email->id }}"
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
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                @endforelse
                            </div>


                            <div class="text-right">
                                {{--hien thi phan trang--}}
                                {{ $emails->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endcan
    </div>
@stop
@section('javascript')
    <script type="text/javascript">
        $(document).ready(function () {

            // $("#check-all").click(function () {
            //     $('input:checkbox').not(this).prop('checked', this.checked);
            // });

            // $("#btn-delete").on('click', function () {
            //     var allVals = [];
            //     $(".btn-check").not("#check-all").each(function () {
            //         if ($(this).is(":checked")) {
            //             allVals.push($(this).val());
            //         }
            //     });
            //     // console.log(allVals);
            //     $('#allValsDelete').val(allVals);
            // });

            $("#search").on('keyup', function () {
                var key = $(this).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: '{{ route('admin.emails.search-row') }}',
                    data: {
                        key: key,
                        amount: {{ isset($_GET['amount']) ? $_GET['amount'] : 'null' }}
                    },
                    success: function (response) {
                        $("#email-table").empty();
                        $("#email-table").html(response);
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
                var url = '{{ route('admin.emails.index').'?amount=:amount' }}';
                url = url.replace(':amount', amountRow);
                window.location.assign(url);
            });

        });
    </script>
@stop

