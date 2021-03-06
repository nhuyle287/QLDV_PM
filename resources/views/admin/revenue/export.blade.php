<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Document</title>
    <!-- CSS only -->
    {{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"--}}
    {{--          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">--}}
    <style>
        body {
            font-family: DejaVu Sans;
            font-size: 12px;
        }


        .container {
            margin-left: 5%;
            margin-right: 5%;
        }





        .table{
            border: none;
        }
        .col-left {
            text-align: left;
            width: 30%;
        }

        .col-right {
            text-align: left;
        }

        .border-dotter {
            border-bottom: 1px dotted;
            margin-bottom: 0; margin-top: 0;
        }
    </style>
</head>

<body>
<div class="container">
    <div class="content">
        <div class="card-header" role="tab" id="heading79">
            <div class="receipts">
                <div>
                    <div class="infor">
                        <p style=" margin-bottom: 0; margin-top: 0"><strong style=" margin-bottom: 0; margin-top: 0">Đơn vị:</strong><span>CÔNG TY TNHH HI TECH THIÊN QUÂN</span>
                        </p>
                        <strong style=" margin-bottom: 0;">Địa chỉ: </strong><span>Lô 09, Tòa nhà 4S Riverside Garden, Đường số 17, Hiệp Bình Chánh, Thủ Đức, TPHCM</span>
                    </div>
                </div>
                <div>
                    <p style="text-align: center;
    font-size: 30px;
    margin-bottom: 5px;"><b>BIÊN LAI THU TIỀN</b></p>

                    <p style="text-align: center;margin-bottom: 0; margin-top: 0;">Ngày {{date("d")}} Tháng {{date("m")}} Năm {{date("Y")}}</p>
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
                                <p class="border-dotter">{{ $register_service->name }}</p>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-left">Địa chỉ:</td>
                            <td class="col-right">
                                <p class="border-dotter">{{ $register_service->address }}</p>
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
                <div class="clearfix" style="margin-bottom: 0; margin-top: 0;">
                    <p style="text-align: right;margin-bottom: 0; margin-top: 0;">Ngày {{date("d")}} Tháng {{date("m")}} Năm {{date("Y")}}</p>
                </div>
                <div class="clearfix">
                    <div style="float: left"><b>Người nộp tiền</b></div>
                    <div style="float: right"><b>Người lập phiếu</b></div>
                </div>

            </div>
        </div>
        <br>
        <br>
        <br>
    </div>
</div>
</body>

</html>
