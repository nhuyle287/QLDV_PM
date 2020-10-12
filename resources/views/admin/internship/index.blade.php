@inject('request', 'Illuminate\Http\Request')
@extends('layout.master')
@section('title')
    Thực tập sinh
@stop
@section('head')
    <link rel="stylesheet" href="css/responsive.css">
    <style>

        .background-popup {
            height: 85%;
            width: 100%;
            /*background-color: rgba(0, 0, 0, .5);*/
            display: none;
            position: fixed;
            z-index: 5;
            top: 3rem;
            left: 0;
            bottom: 0;
            right: 0;
            overflow: scroll;

        }
        .rollIn {
            -webkit-animation-name: rollIn;
            animation-name: rollIn;
            margin: auto;
            padding-bottom: 1rem;
            border: 1px solid darkgrey;
        }
        th{
            text-align: center;
        }
        .list-item1{
            text-align: center;
        }
        .list-item2{
            color: darkgrey;
            text-align: center;
        }
    </style>
@stop
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @can('internship-view')
        <div class="body-content">

            <div class="card">
                <div class="card-header card-header-new">
                    {{ __('internship.list') }}
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
                                @can('internship-delete')
                                    <div>
                                        <a id="btn-delete" style="margin-left: 0.25rem"
                                           class="btn btn-warning"
                                           data-toggle="modal" data-target="#deleteModal">
                                            <i class="fa fa-trash"> </i> Xóa
                                        </a>
                                    </div>
                                    <form action="{{ route('admin.internship.destroy-select') }}" method="POST">
                                        @csrf
                                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="exampleModalLabel">{{{__('internship.internship')}}}</h5>
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
                            @can('internship-search')
                                <div>
                                    <input id="search" class="form-control" type="search"
                                           placeholder="{{ __('general.search') }}"
                                           value="{{ isset($_GET['key']) ? $_GET['key'] : '' }}">
                                </div>
                            @endcan
                        </div>
                    </div>
                    <div class="background-popup" style="margin: 2rem 0 2rem 0">

                    </div>

                    <div id="internship-table">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr>
                                    <th style="width: 10px"><input type="checkbox" id="check-all"></th>
                                    <th>{{ __('internship.id') }}</th>
                                    <th>{{ __('internship.infor') }}</th>
                                    <th class="test">{{__('internship.academic')}}</th>
                                    <th>{{ __('internship.status') }}</th>
                                    <th>{{ __('internship.date_intern') }}</th>
                                    <th class="test"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($internship_Schools as $item => $internship)
                                    <tr>
                                        <td><input type="checkbox" class="btn-check" value="{{ $internship->internship_id }}"></td>
                                        <td>{{ $internship_Schools->firstItem() + $item }}</td>
                                        <td>

                                            <p style="text-align: center">
                                                <img src="{{URL::asset("images/internship/{$internship->image}")}}"
                                                     style="width: 50px" style="height: 10px" alt="error"/>
                                            </p>
                                            <p class="list-item1" >
                                                {{$internship->name}}
                                            </p>
                                            <p class="list-item2">
                                                {{$internship->email}}
                                            </p>
                                            <p class="list-item2">
                                                {{$internship->phone}}
                                            </p>

                                        </td>
                                        <td style="width: 18rem">

                                            <p class="list-item1">
                                                Trường: {{$internship->	school}}
                                            </p>
                                            <p class="list-item2">
                                                Chuyên ngành: {{$internship->major}}
                                            </p>

                                        </td>
                                        <td>
                                            <span>{{ucfirst(array_search($internship->status,\App\Models\ConstantsModel::STATUS_INTERNSHIP))}}</span>
                                        </td>
                                        <td>{{date('d-m-Y', strtotime($internship->date_create))}}
                                        </td>
                                        <td class="test" >
                                            <a onclick="show({{$internship->internship_id}})" class="btn btn-xs btn-info"                                                    >
                                                {{ __('general.view') }}
                                            </a>

                                            @can('internship-update')
                                                <a href="{{route('admin.internship.edit', [$internship->internship_id])}}"
                                                   class="btn  btn-success btn-xs">{{ __('general.update') }}</a>
                                            @endcan
                                            @can('internship-delete')
                                                <button type="button" class="btn btn-xs btn-danger" data-toggle="modal"
                                                        data-target="#deleteItemModal{{ $internship->internship_id }}">
                                                    {{ __('general.delete') }}
                                                </button>
                                                <form action="{{ route('admin.internship.destroy') }}" method="POST">
                                                    @csrf
                                                    <div class="modal fade" id="deleteItemModal{{ $internship->internship_id }}"
                                                         tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                         aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="exampleModalLabel">{{ __('internship.internship') }}</h5>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <input type="text" name="id" value="{{ $internship->internship_id }}"
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
                                            @if($internship->status === 3)
                                              <div>
                                                  <button style="" id="btnRegister" type="button"
                                                          class="btn btn-xs btn-primary"
                                                          data-id="{{$internship->internship_id}}"
                                                          data-toggle="modal" data-target="#myModal">Đăng ký
                                                  </button>
                                              </div>

                                            @endif
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
                                {!! $internship_Schools->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Đăng ký đề tài sinh viên</h4>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="{{route('admin.internship-topic.insert')}}" method="POST">
                            @csrf
                            <input type="hidden" name="internship_id" id="internship_id" value="">
                            <div class="form-group">
                                {{--                                                    <label for="ten">Tên sinh viên:</label>--}}
                                {{--                                                    <input type="text" class="form-control" id="name" name="name"  value="">--}}
                                <label for="ten">Chọn đề tài:</label><br>
                                <select style="width: 300px;height: 35px; border: 1px solid #ced4da;" name="topic_id">
                                    <option value="option_select" disabled selected>Chọn đề tài</option>
                                    @foreach($topic as $topic)
                                        <option value="{{$topic->id}}">{{$topic->name}}</option>
                                    @endforeach
                                </select>
                                <br>
                                <label for="ten">Ngày bắt đầu:</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" value="">
                                <label for="ten">Mục đích làm việc:</label>
                                <input type="text" class="form-control" id="purpose" name="purpose" value="">

                            </div>
                            <div class="form-group">
                            </div>

                            <button style="background: green;color: white;" type="submit" class="btn btn-default">Save
                            </button>
                        </form>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
            $('.background-popup').load("/admin/internships/" + id+"/show/")
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
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: '{{ route('admin.internship.search-row') }}',
                    data: {
                        key: key,
                        amount: {{ isset($_GET['amount']) ? $_GET['amount'] : 'null' }}
                    },
                    success: function (response) {
                        $("#internship-table").empty();
                        $("#internship-table").html(response);
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
                var url = '{{ route('admin.customers.index').'?amount=:amount' }}';
                url = url.replace(':amount', amountRow);
                window.location.assign(url);
            });

        });
    </script>
    <script>
        $('#myModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #internship_id').val(id);
            modal.find('.modal-body #topic_id option:selected').text();
            modal.find('.modal-body #start_date').val();
            modal.find('.modal-body #purpose').val();
            // modal.find('.modal-body #name').val(name);

        })
    </script>
@stop


