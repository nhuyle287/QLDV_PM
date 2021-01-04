@inject('request', 'Illuminate\Http\Request')
@extends('layout.master')
@section('title')
    Sổ quỹ
@stop
@section('head')
    <link rel="stylesheet" href="css/responsive.css">
    <style>

        .col-left {
            width: 30%;
            margin-left: 1.25rem;
            text-align: left;
        }

        .infor {
            margin-bottom: 1rem;
        }

        .title_revenue {
            text-align: center;
            font-size: 1.75rem;
            margin-bottom: 1rem;
        }
        .col-right p{
            border-bottom: 1px dotted black;
            text-align: left;
        }
        .modal-body{
            margin: 1rem;
        }
        .total_price:first-letter{
            text-transform: capitalize;
        }
    </style>
@stop
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @can('receipt-view')
        <div class="body-content">

            <div class="card">
                <div class="card-header card-header-new">
                    Danh sách sổ quỹ
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
                                @can('receipt-delete')
                                    <div>
                                        <a id="btn-delete" style="margin-left: 0.25rem"
                                           class="btn btn-warning"
                                           data-toggle="modal" data-target="#deleteModal">
                                            <i class="fa fa-trash"> </i> Xóa
                                        </a>
                                    </div>
                                    <form action="{{ route('admin.invoices.destroy-select') }}" method="POST">
                                        @csrf
                                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="exampleModalLabel">Sổ quỹ</h5>
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
                            @can('receipt-search')
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
                    <div id="receipt-table">
                        <div style="display: flex; justify-content: flex-end">
                            <div>
                                <label>Tổng thu: </label>

                                    {{number_format($total_)}} (VNĐ)

                            </div>
                            <div style="margin-left: 0.5rem">
                                <label>Tổng chi: </label>

                                    {{number_format($expenditure)}} (VNĐ)

                            </div>
                            <div style="margin-left: 0.5rem">
                                <label>Doanh thu: </label>

                                {{number_format($total_- $expenditure)}} (VNĐ)

                            </div>
                        </div>

                        <div id="chart_tables" class="chart">
                            <div class="row">
{{--                                <p style=" margin-left: 6%; font-size: 25px">Tổng Doanh--}}
{{--                                    thu: {{number_format($total_)}}</p>--}}
                                <div class="col-md-12">
                                    {!! $chart->container() !!}
                                </div>
                                {!! $chart->script() !!}

                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div class="panel-body table-responsive">
                                <div id="content">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th style="width: 10px"><input type="checkbox" id="check-all"></th>
                                            <th class="thstyleform">STT</th>
                                            <th class="thstyleform">Tên Khách hàng</th>
                                            <th class="thstyleform">Giá trị</th>
                                            <th class="thstyleform">Loại phiếu thu</th>
                                            <th class="thstyleform">Ngày thu</th>
                                            <th class="thstyleform">&nbsp;</th>
                                        </tr>
                                        </thead>
                                        <?php
                                        function convert_number_to_words($number)
                                        {

                                            $hyphen = ' ';
                                            $conjunction = '  ';
                                            $separator = ' ';
                                            $negative = 'âm ';
                                            $decimal = ' phẩy ';
                                            $dictionary = array(
                                                0 => 'không',
                                                1 => 'một',
                                                2 => 'hai',
                                                3 => 'ba',
                                                4 => 'bốn',
                                                5 => 'năm',
                                                6 => 'sáu',
                                                7 => 'bảy',
                                                8 => 'tám',
                                                9 => 'chín',
                                                10 => 'mười',
                                                11 => 'mười một',
                                                12 => 'mười hai',
                                                13 => 'mười ba',
                                                14 => 'mười bốn',
                                                15 => 'mười năm',
                                                16 => 'mười sáu',
                                                17 => 'mười bảy',
                                                18 => 'mười tám',
                                                19 => 'mười chín',
                                                20 => 'hai mươi',
                                                30 => 'ba mươi',
                                                40 => 'bốn mươi',
                                                50 => 'năm mươi',
                                                60 => 'sáu mươi',
                                                70 => 'bảy mươi',
                                                80 => 'tám mươi',
                                                90 => 'chín mươi',
                                                100 => 'trăm',
                                                1000 => 'ngàn',
                                                1000000 => 'triệu',
                                                1000000000 => 'tỷ',
                                                1000000000000 => 'nghìn tỷ',
                                                1000000000000000 => 'ngàn triệu triệu',
                                                1000000000000000000 => 'tỷ tỷ'
                                            );

                                            if (!is_numeric($number)) {
                                                return false;
                                            }

                                            if (($number >= 0 && (int)$number < 0) || (int)$number < 0 - PHP_INT_MAX) {
// overflow
                                                trigger_error(
                                                    'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
                                                    E_USER_WARNING
                                                );
                                                return false;
                                            }

                                            if ($number < 0) {
                                                return $negative . convert_number_to_words(abs($number));
                                            }

                                            $string = $fraction = null;

                                            if (strpos($number, '.') !== false) {
                                                list($number, $fraction) = explode('.', $number);
                                            }

                                            switch (true) {
                                                case $number < 21:
                                                    $string = $dictionary[$number];
                                                    break;
                                                case $number < 100:
                                                    $tens = ((int)($number / 10)) * 10;
                                                    $units = $number % 10;
                                                    $string = $dictionary[$tens];
                                                    if ($units) {
                                                        $string .= $hyphen . $dictionary[$units];
                                                    }
                                                    break;
                                                case $number < 1000:
                                                    $hundreds = $number / 100;
                                                    $remainder = $number % 100;
                                                    $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
                                                    if ($remainder) {
                                                        $string .= $conjunction . convert_number_to_words($remainder);
                                                    }
                                                    break;
                                                default:
                                                    $baseUnit = pow(1000, floor(log($number, 1000)));
                                                    $numBaseUnits = (int)($number / $baseUnit);
                                                    $remainder = $number % $baseUnit;
                                                    $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
                                                    if ($remainder) {
                                                        $string .= $remainder < 100 ? $conjunction : $separator;
                                                        $string .= convert_number_to_words($remainder);
                                                    }
                                                    break;
                                            }

                                            if (null !== $fraction && is_numeric($fraction)) {
                                                $string .= $decimal;
                                                $words = array();
                                                foreach (str_split((string)$fraction) as $number) {
                                                    $words[] = $dictionary[$number];
                                                }
                                                $string .= implode(' ', $words);
                                            }

                                            return $string;
                                        }
                                        ?>
                                        <tbody>
                                        @forelse($register_services as $register_service)
                                            <tr>
                                                <td class="thstyleform"><input type="checkbox" class="btn-check"
                                                                               value="{{ $register_service->id }}"></td>
                                                <td class="thstyleform">{{$register_service->id}}</td>
                                                <td class="thstyleform">{{$register_service->customer_name}}</td>
                                                <td class="thstyleform">{{number_format($register_service->total)}}</td>
                                                <td class="thstyleform">{{$register_service->order_type}}</td>
                                                <td class="thstyleform">{{date('d-m-Y H:i:s', strtotime($register_service->date))}}</td>
                                                <td class="thstyleform">

                                                    <button type="button" class="btn btn-xs btn-info" data-toggle="modal"
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
                                                                        id="exampleModalLabel">{{ __('revenue.revenue') }}</h5>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                            aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="receipts">
                                                                        <div>
                                                                            <div class="infor ">
                                                                                <p class="text-left"><strong
                                                                                    >Đơn
                                                                                        vị:</strong><span>CÔNG TY TNHH TMDV HOA TECHNOLOGY</span>
                                                                                </p>
                                                                               <p class="text-left"><strong >Địa chỉ: </strong><span>Lô 09, Tòa nhà 4S Riverside Garden, Đường số 17, Hiệp Bình Chánh, Thủ Đức, TPHCM</span></p>
                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                            <p class="title_revenue">
                                                                                <b>BIÊN LAI THU TIỀN</b></p>

                                                                            <p style="text-align: center">
                                                                                Ngày {{date("d",strtotime($register_service->date))}}
                                                                                Tháng {{date("m",strtotime($register_service->date))}}
                                                                                Năm {{date("Y",strtotime($register_service->date))}}</p>
                                                                        </div>

                                                                        <div class="clearfix">
                                                                            <table class="table table-borderless table-sm"
                                                                                   width="100%"
                                                                                   style="font-size: 16px; margin: 0 auto">
                                                                                <tbody>
                                                                                <tr class="table-light">
                                                                                    <td class="col-left">Họ tên người nộp
                                                                                        tiền:
                                                                                    </td>
                                                                                    <td class="col-right">
                                                                                        <p class="border-dotter">{{ $register_service->customer_name }}</p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="col-left">Địa chỉ:</td>
                                                                                    <td class="col-right">
                                                                                        <p class="border-dotter">{{ $register_service->customer_address }}</p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr class="table-light">
                                                                                    <td class="col-left">Lý do nộp:</td>
                                                                                    <td class="col-right">
                                                                                        <p class="border-dotter">{{$register_service->order_type}}</p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="col-left">Tổng số tiền:</td>
                                                                                    <td class="col-right">
                                                                                        <p class="border-dotter">{{number_format($register_service->total)}}
                                                                                            VND</p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr class="table-light">
                                                                                    <td class="col-left">(Viết bằng chữ):</td>
                                                                                    <td class="col-right">
                                                                                        <p class="border-dotter total_price">{{convert_number_to_words($register_service->total)}}
                                                                                            đồng.</p>
                                                                                    </td>
                                                                                </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                        <div class="clearfix">
                                                                            <p style="text-align: right">
                                                                                Ngày {{date("d",strtotime($register_service->date))}}
                                                                                Tháng {{date("m",strtotime($register_service->date))}}
                                                                                Năm {{date("Y",strtotime($register_service->date))}}</p>
                                                                        </div>
                                                                        <div class="clearfix">
                                                                            <p style="float: left"><b>Người nộp tiền</b></p>
                                                                            <p style="float: right"><b>Người lập phiếu</b></p>
                                                                        </div>

                                                                    </div>
                                                                    <br>
                                                                    <br>
                                                                    <br>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form action="{{route("admin.revenue.print")}}"
                                                                          method="POST" enctype="multipart/form-data">
                                                                        @csrf
                                                                        <input type="hidden" name="id"
                                                                               value="{{$register_service->id}}">
                                                                        <button type="submit" formtarget="_blank"
                                                                                class="btn btn-default">Xuất phiếu thu
                                                                        </button>
                                                                    </form>
                                                                    <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">{{ __('general.close') }}</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>

                                            </tr>
                                        @empty
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-right float-right" id="page">

                                    {{$register_services->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endcan
@stop

@section('javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js" charset="utf-8"></script>

    <script>
        function show(id)
        {
            $('.background-popup').show();
            $('.background-popup').addClass('d-flex align-items-center justify-content-center');
            $('.background-popup').load("/admin/invoices/"+id+"/invocereceipt")
        }
        // $(document).ready(function () {
        //     $('.mdb-select').materialSelect();
        //
        // });
        $(document).on('click', '#cancel-button', function() {
            $('.background-popup').hide();
            $('.background-popup').removeClass('d-flex align-items-center justify-content-center');
            $('.background-popup').empty();
        })
    </script>
{{--    <script>--}}


{{--        // In your Javascript (external .js resource or <script> tag)--}}
{{--        $(document).ready(function () {--}}
{{--            $('.js-example-basic-single').select2();--}}
{{--        });--}}
{{--    </script>--}}

    <script type="text/javascript">
        $(document).ready(function () {

            $("#check-all").on('click', function () {
                // alert('a')
                $('input:checkbox').not(this).prop('checked', this.checked);
            });

            $('#charts').on('click',function () {

                $('#chart_tables').removeClass('hide');
            })

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
                    url: '{{ route('admin.invoices.search-row') }}',
                    data: {
                        key: key,
                        amount: {{ isset($_GET['amount']) ? $_GET['amount'] : 'null' }}
                    },
                    success: function (response) {
                        $("#receipt-table").empty();
                        $("#receipt-table").html(response);
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
                var url = '{{ route('admin.invoices.receipts').'?amount=:amount' }}';
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

