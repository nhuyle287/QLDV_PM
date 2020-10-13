@extends('layout.master')
@section('title')
    Sổ quỹ
@stop
@section('css')

    <style>
        body {
            font-family: "Roboto";
        }

        .receipts {
            margin-left: 20%;
            width: 707px;
            text-align: center;
            margin-top: 10px;
            padding: 10px 25px;
        }

        .infor {
            text-align: left;
        }

        p {
            margin-bottom: 0;
        }

        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }

        .col-left {
            text-align: left;
            width: 26%;
        }

        .col-right {
            text-align: left;
        }

        .border-dotter {
            border-bottom: 1px dotted;
        }
    </style>
@stop
@section('content')
    <div class="content">
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
    </div>

    <div class="panel panel-default">
        <div id="color1" class="card abcdef">
            <!-- Card header -->
            <div class="card-header" role="tab" id="heading79">
                <div class="receipts">
                    <div>
                        <div class="infor">
                            <p style=" margin-bottom: 0;"><strong style=" margin-bottom: 0;">Đơn vị:</strong><span>CÔNG TY TNHH HI TECH THIÊN QUÂN</span>
                            </p>
                            <strong>Địa chỉ: </strong><span>Lô 09, Tòa nhà 4S Riverside Garden, Đường số 17, Hiệp Bình Chánh, Thủ Đức, TPHCM</span>
                        </div>
                    </div>
                    <div>
                        <p style="text-align: center;
    font-size: 30px;
    margin-bottom: 0px;"><b>BIÊN LAI THU TIỀN</b></p>

                        <p>Ngày {{date("d",strtotime($register_service->date))}} Tháng {{date("m",strtotime($register_service->date))}} Năm {{date("Y",strtotime($register_service->date))}}</p>
                    </div>
                    <?php
                    function convert_number_to_words($number)
                    {

                        $hyphen = ' ';
                        $conjunction = '  ';
                        $separator = ' ';
                        $negative = 'âm ';
                        $decimal = ' phẩy ';
                        $dictionary = array(
                            0 => 'Không',
                            1 => 'Một',
                            2 => 'Hai',
                            3 => 'Ba',
                            4 => 'Bốn',
                            5 => 'Năm',
                            6 => 'Sáu',
                            7 => 'Bảy',
                            8 => 'Tám',
                            9 => 'Chín',
                            10 => 'Mười',
                            11 => 'Mười một',
                            12 => 'Mười hai',
                            13 => 'Mười ba',
                            14 => 'Mười bốn',
                            15 => 'Mười năm',
                            16 => 'Mười sáu',
                            17 => 'Mười bảy',
                            18 => 'Mười tám',
                            19 => 'Mười chín',
                            20 => 'Hai mươi',
                            30 => 'Ba mươi',
                            40 => 'Bốn mươi',
                            50 => 'Năm mươi',
                            60 => 'Sáu mươi',
                            70 => 'Bảy mươi',
                            80 => 'Tám mươi',
                            90 => 'Chín mươi',
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
                    <div class="clearfix">
                        <table class="table table-borderless table-sm" width="100%"
                               style="font-size: 16px; margin: 0 auto">
                            <tbody>
                            <tr class="table-light">
                                <td class="col-left">Họ tên người nộp tiền:</td>
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
                                    <p class="border-dotter">{{$register_service->total}} VND</p>
                                </td>
                            </tr>
                            <tr class="table-light">
                                <td class="col-left">(Viết bằng chữ):</td>
                                <td class="col-right">
                                    <p class="border-dotter">{{convert_number_to_words($register_service->total)}}
                                        đồng.</p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="clearfix">
                        <p style="text-align: right">Ngày {{date("d")}} Tháng {{date("m")}} Năm {{date("Y")}}</p>
                    </div>
                    <div class="clearfix">
                        <p style="float: left"><b>Người nộp tiền</b></p>
                        <p style="float: right"><b>Người lập phiếu</b></p>
                    </div>

                </div>
            </div>
            <br>
            <br>
            <br>
            <div class="clearfix" style="margin: 10px 5px; display: flex; justify-content: flex-end;">
                <a style="margin-right: 5px" href="{{ route('admin.invoices.receipts') }}" class="btn btn-default">{{ __('general.back') }}</a>
                <form action="{{route("admin.revenue.print")}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$register_service->id}}">
                    <button type="submit" formtarget="_blank" class="btn btn-default">Xuất phiếu thu</button>
                </form>
            </div>


        </div>
    </div>

@stop





{{--@extends('layout.master')--}}

{{--@section('content')--}}


{{--    <section class="content">--}}
{{--        <div class="">--}}
{{--            <div class="row">--}}
{{--                <div class="col-12">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-header">--}}
{{--                            <h3 class="card-title">Thông Tin Dịch Vụ</h3>--}}
{{--                        </div>--}}
{{--                        <!-- /.card-header -->--}}
{{--                        <div class="card-body">--}}
{{--                            <table class="table table-bordered table-striped">--}}
{{--                                <tr>--}}
{{--                                    <th>ID</th>--}}
{{--                                    <td>{{ $register_service->id }}</td>--}}

{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <th>Code</th>--}}
{{--                                    <td>{{ $register_service->code }}</td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <th>Customer Name</th>--}}
{{--                                    <td>{{ $customer_name }}</td>--}}
{{--                                </tr>--}}

{{--                                <tr>--}}
{{--                                    <th>Service Name</th>--}}
{{--                                    <td>{{$register_service->domain_name}}{{$register_service->hosting_name}}{{$register_service->vps_name}}{{$register_service->email_name}}{{$register_service->ssl_name}}{{$register_service->website_name}}</td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}

{{--                                    <th>Start Date</th>--}}
{{--                                    <td>{{ $register_service->start_date }}</td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}

{{--                                    <th>End Date</th>--}}
{{--                                    <td>{{ $register_service->end_date }}</td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}

{{--                                    <th>Exist Date</th>--}}
{{--                                    <td>{{ $register_service->exist_date }}</td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}

{{--                                    <th>Notes</th>--}}
{{--                                    <td>{{ $register_service->notes }}</td>--}}
{{--                                </tr>--}}

{{--                            </table>--}}
{{--                        </div>--}}
{{--                        <!-- /.card-body -->--}}
{{--                    </div>--}}
{{--                    <!-- /.card -->--}}

{{--                    <a href="{{ route('admin.register_services.index') }}" class="btn btn-default">{{ __('general.back') }}</a>--}}


{{--                </div>--}}
{{--                <!-- /.col -->--}}
{{--            </div>--}}
{{--            <!-- /.row -->--}}
{{--        </div>--}}
{{--        <!-- /.container-fluid -->--}}
{{--    </section>--}}

{{--@stop--}}
