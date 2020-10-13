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


        .title {
            text-align: center;
            margin-top: 0px !important;
            padding-top: -50px !important;
        }

        .law {
            list-style: none;
            /* Remove HTML bullets */
            padding: 0;
            margin: 0;
        }

        .law li {
            padding-left: 16px;
        }

        .law li::before {
            content: "-";
            /* Insert content that looks like bullets */
            padding-right: 8px;
            color: black;
            /* Or a color you prefer */
        }

        .support {
            list-style: none;
        }

        .value_contract {
            list-style: none;
            /* Remove HTML bullets */
            padding: 0;
            margin: 0;
        }

        .value_contract li {
            padding-left: 16px;
        }

        .value_contract li::before {
            content: "+";
            /* Insert content that looks like bullets */
            padding-right: 8px;
            color: black;
            /* Or a color you prefer */
        }

        table {
            width: 100%;
        }

        table tr,
        table td,
        table th {
            border: 1px dashed black;
            padding: 5px;
        }

        .service, .service td, .service th {
            border: 1px solid slategrey;
        }

        .register {
            display: inline-block;

        }

        .schedule_head {
            text-align: center;
        }

        .function,
        .function tr,
        .function th,
        .function td {
            border: 1px solid slategrey;
        }

        .time,
        .time tr,
        .time td,
        .time th {
            border: 1px solid slategrey;
        }

        p, ul {
            margin-top: 0 !important;
            margin-bottom: 0 !important;
        }
    </style>
</head>

<body>
<div class="container">
    <div class="content">
        <section class="header">
            <div class="head"
                 style=" display:inline-block; margin-top: 30px !important;margin-bottom: 0 !important; padding-bottom: 0 !important;">
                <span style="padding-bottom: 0 !important;">
                    <img alt=""
                         src="https://www.hoatech.vn/wp-content/uploads/2015/06/005.png"
                         style=" margin-left: 0; margin-top: 5px; transform: rotate(0.00rad) translateZ(0px); -webkit-transform: rotate(0.00rad) translateZ(0px);"
                         title="logo">
                </span>
                <span class="infor" style="display: inline-block;padding-bottom: 0 !important;">
                    <p>CÔNG TY TNHH THƯƠNG MẠI DỊCH VỤ HOA TECHNOLOGY </p>
                    <p> Đc: 102B, Tăng Nhơn Phú, Phường Tăng Nhơn Phú B, Quận 9, Tp
                        HCM </p>
                    <p style="margin-bottom: 0 !important;"><u
                            style="margin-bottom: 0 !important;padding-bottom: 0 !important;"> Điện thoại: <strong
                                style="margin-bottom: 0 !important; padding-bottom: 0 !important;"> 0868856175 - Website:
                                www.hoatech.vn - Emall : contact@hoatech.vn </strong></u></p>

                </span>
            </div>
            <div class="title">
                <p style="margin-bottom: 0 !important;"><strong>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</strong></p>
                <p style="margin-bottom: 0 !important;"><strong> Độc lập - Tự do - Hạnh phúc</strong></p>
                <p style="margin-bottom: 0 !important;">***********</p>
                <p style="margin-bottom: 0 !important;"><strong>HỢP ĐỒNG CUNG CẤP DỊCH VỤ HOSTING LƯU TRỮ DỮ LIỆU TRÊN
                        INTERNET</strong></p>


                <p style="margin-bottom: 50px !important;">Số:{{$con->code}}</p>
            </div>
            <div>
                <ul class="law" style="text-align: justify">
                    <li>Căn cứ Bộ Luật Dân Sự của nước CHXHCNVN năm 2005.</li>
                    <li>Căn cứ Luật Thương mại Việt Nam năm 2005.</li>
                    <li>Căn cứ các văn bản pháp luật về viễn thông.</li>
                </ul>


            </div>

            <p style="margin-bottom: 0;text-align: justify">Hôm nay, ngày {{$day}} tháng {{$month}} năm {{$year}}, tại
                công
                ty
                TNHH THƯƠNG MẠI DỊCH VỤ HOA TECHNOLOGY
                chúng tôi gồm
                có:</p>
            <div class="infor_contract">
                <div class="infor_custom">
                    <table>

                        <tr>
                            <td colspan="6" rowspan="1">
                                <strong>Bên A: </strong>
                                <span style="font-weight: bold">{{$cus->nameStore}}</span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="1">
                                Người đại diện
                            </td>
                            <td colspan="2" style="font-weight: bold">
                                {{$cus->name}}
                            </td>
                            <td colspan="1">Chức vụ</td>
                            <td colspan="2" rowspan="1" style="font-weight: bold">{{$cus->position}}

                            </td>
                        </tr>
                        <tr>
                            <td>
                                Địa chỉ
                            </td>
                            <td colspan="5" rowspan="1" style="font-weight: bold">
                                {{$cus->address}}
                            </td>

                        </tr>
                        <tr>
                            <td>
                                Điện thoại
                            </td>
                            <td colspan="2" style="font-weight: bold">
                                {{$cus->phone_number}}
                            </td>
                            <td colspan="1">Số Fax</td>
                            <td colspan="2" rowspan="1" style="font-weight: bold">{{$cus->fax_number}}

                            </td>
                        </tr>
                        <tr>
                            <td>
                                Số tài khoản
                            </td>
                            <td colspan="2" style="font-weight: bold">
                                {{$cus->account_number}}
                            </td>
                            <td colspan="1">MỞ tại ngân hàng</td>
                            <td colspan="2" rowspan="1" style="font-weight: bold">{{$cus->open_at}}

                            </td>
                        </tr>
                        <tr>
                            <td>
                                Mã số thuế
                            </td>
                            <td colspan="2" style="font-weight: bold">
                                {{$cus->tax_number}}
                            </td>
                            <td colspan="1">Email</td>
                            <td colspan="2" rowspan="1" style="font-weight: bold">{{$cus->email}}

                            </td>
                        </tr>
                        <tr>
                            <td colspan="6" rowspan="1">
                                <strong>Bên B: </strong>
                                <span><strong>CÔNG TY TNHH THƯƠNG MẠI DỊCH VỤ HOA TECHNOLOGY</strong></span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="1">
                                Người đại diện:
                            </td>
                            <td colspan="2">
                                <strong>Lê Thanh Hòa</strong>
                            </td>
                            <td colspan="1">Chức vụ:</td>
                            <td colspan="2" rowspan="1"><strong>Giám đốc</strong>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Địa chỉ:
                            </td>
                            <td colspan="5" rowspan="1">
                                <strong>102B, Tăng Nhơn Phú, P. Tăng Nhơn Phú B, Quận 9, Tp. HCM</strong>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                Điện thoại:
                            </td>
                            <td colspan="2">
                                <strong>0988 196 169</strong>
                            </td>
                            <td colspan="1">Số Fax:</td>
                            <td colspan="2" rowspan="1">

                            </td>
                        </tr>
                        <tr>
                            <td>
                                Số tài khoản:
                            </td>
                            <td colspan="2">
                                <strong>203351129</strong>
                            </td>
                            <td colspan="1">MỞ tại ngân hàng:</td>
                            <td colspan="2" rowspan="1"><strong>Ngân hàng Á Châu ACB Chi nhánh Hồ Chí
                                    Minh</strong>

                            </td>
                        </tr>

                        <tr>
                            <td>
                                Mã số thuế
                            </td>
                            <td colspan="2">
                                <strong>0313275605</strong>
                            </td>
                            <td colspan="1">Email</td>
                            <td colspan="2" rowspan="1"><strong>contact@hoatech.vn</strong>

                            </td>
                        </tr>

                    </table>
                </div>
                <p>
                    <strong>Hai Bên thống nhất ký kết Hợp đồng với các điều khoản sau đây:</strong>
                </p>
                <div class="rules">
                    <div class="rule1">
                        <strong style="margin-bottom: 0 !important;">ĐIỀU 1: NỘI DUNG CUNG CẤP DỊCH VỤ</strong>
                        <p>Bên B cung cấp dịch vụ cho Bên A với các khoản mục, số lượng, kinh phí như sau:</p>
                        <ol style="list-style-type: none;margin-top: 0 !important; text-align: justify">
                            <li>1.1. Dịch vụ cung cấp: dịch vụ vps lưu trữ dữ liệu trên internet</li>
                            <li>1.2. Giá cước: Hai bên thống nhất thỏa thuận giá cước như sau:

                            </li>

                        </ol>
                        <p style="page-break-after:always;"></p>
                        <table class="service">
                            <tr>
                                <th>Nội dung</th>
                                <th>Đơn giá (VNĐ)</th>
                                <th>Số lượng</th>
                                <th>Thành tiền (VNĐ)</th>
                            </tr>
                            <tr>
                                @if($hosting !== null)
                                    <th style="text-align: left">{{$hosting->capacity}}</th>
                                    <th style="text-align: right">{{number_format($hosting->price)}}</th>
                                    <th style="text-align: right">{{$con->quantity_hosting}}</th>
                                    <th style="text-align: right">{{number_format($con->total_price)}}</th>
                                @endif
                            </tr>


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

                            <tr>
                                <th colspan="3" style="text-align: left">Tổng</th>
                                <th style="text-align: right">
                                    {{number_format($con->total_price - $con->discount_price)}}
                                </th>
                            </tr>
                            @if($con->promotion!==null)
                                <tr>
                                    <th colspan="3" style="text-align: left">Mã khuyến mãi</th>
                                    <th style="text-align: right">
                                        {{$con->promotion}}
                                    </th>
                                </tr>
                            @endif
                            <tr>
                                <td colspan="3"><strong>VAT 10%</strong></td>
                                <td style="text-align: right"><strong>{{number_format($con->total_price+$con->discount_price-($hosting->price*$con->quantity_hosting))}}</strong></td>
                            </tr>
                            <tr>
                                <th colspan="3" style="text-align: left">Tổng tiền</th>
                                <th style="text-align: right">{{number_format($con->total_price)}}
                                </th>
                            </tr>
                            <tr>
                                <th colspan="4">Bằng
                                    chữ: {{convert_number_to_words($con->total_price)}}
                                    đồng
                                </th>

                            </tr>
                        </table>
                    </div>

                    <div class="rule2">
                        <strong style="margin-bottom: 0 !important;">ĐIỀU 2: PHƯƠNG THỨC THANH TOÁN</strong>
                        <ol style="list-style-type: none;margin-top: 0 !important; text-align: justify">
                            <li>2.1. Sau khi ký Hợp đồng, Bên A thanh toán ngay cho Bên B toàn bộ giá trị Hợp đồng bao
                                gồm các khoản phí dịch vụ sau:
                                <ul style="list-style-type: disc;margin-top: 0 !important; text-align: justify">
                                    <li>
                                        Phí dịch vụ tên miền lưu trữ dữ liệu trên internet với số tiền thanh toán là:
                                        {{number_format($con->total_price)}}đ
                                        ({{convert_number_to_words($con->total_price)}} đồng)
                                    </li>
                                </ul>

                                <p>Các khoản phí trên sẽ không được hoàn lại cho Bên A trong trường hợp Bên A đơn phương
                                    chấm dứt hợp đồng trái với quy định tại hợp đồng này.</p>
                            </li>
                            <li>2.2. Trường hợp Bên A thanh toán không đúng hạn, Bên B ngay lập tức có quyền tạm ngừng
                                cung cấp dịch vụ mà không cần phải thông báo trước cho Bên A cho đến khi bên A thanh
                                toán đủ và đúng hạn theo quy định tại điều 2.1
                                hợp đồng này.

                            </li>
                            <li>2.3. Bên B cung cấp hóa đơn hợp lệ cho Bên A cho việc thanh toán phí thuê dịch vụ của
                                Hợp đồng này.
                            </li>
                        </ol>
                    </div>


                    <div class="rule3">
                        <strong> ĐIỀU 3: TRÁCH NHIỆM CỦA BÊN A</strong>
                        <ol style="list-style-type: none;margin-top: 0 !important; text-align: justify">
                            <li>3.1. Cung cấp đầy đủ thông tin theo yêu cầu của Bên B trong vòng 05 (năm) ngày làm việc
                                kể từ ngày Hợp đồng ký kết để Bên B tiến hành thực hiện Hợp đồng. Bên B không chịu trách
                                nhiệm nếu việc cung cấp thông tin không đúng
                                hạn và đầy đủ của Bên A làm chậm tiến độ Hợp đồng.


                            </li>
                            <li>3.2. Chịu trách nhiệm về nội dung thông tin thuê Bên B lưu trữ, hoặc các thông tin do
                                Bên A tự cài đặt trên máy chủ đặt tại địa điểm thực hiện dịch vụ của Bên B, đảm bảo các
                                thông tin này không chứa các phần mềm phá hoại
                                và không trái với đạo đức xã hội, quy định của pháp luật.

                            </li>
                            <li>3.3. Không sử dụng dịch vụ của Bên B cung cấp cho mục đích SpamMail (gửi thư rác).
                                Trường hợp Bên A vi phạm nghĩa vụ này, Bên A hoàn toàn tự mình chịu trách nhiệm. Bên B
                                không chịu trách nhiệm hay liên quan đến những vi
                                phạm của Bên A.
                            </li>
                            <li>3.4. Có trách nhiệm bảo mật quyền đăng nhập vào Hệ thống quản trị tên miền và lưu trữ
                                website (Cpanel), tài khoản cập nhật thông tin (FTP – File Transfer Protocol), các tài
                                khoản thư điện tử theo tên miền riêng do Bên B
                                cấp. Trường hợp bên A sử dụng hoặc cung cấp cho bên thứ ba (ngoài hợp đồng này) quyền
                                đăng nhập vào hệ thống để thực hiện các hành vi vi phạm pháp luật thì Bên A hoàn toàn
                                chịu trách nhiệm.
                            </li>
                            <li>3.5. Chịu trách nhiệm quản lý nội dung các thư điện tử được gửi đi từ hộp thư trong tài
                                khoản của Bên A.
                            </li>
                            <li>3.6. Tuân thủ theo đúng các quy định của Nhà nước về sử dụng dịch vụ Internet, quyền sở
                                hữu công nghiệp, bản quyền phần mềm cài đặt trên máy chủ (nếu có), bí mật quốc gia, an
                                ninh, văn hóa.
                            </li>
                            <li>3.7. Thanh toán đầy đủ và đúng hạn các khoản đã được nêu trong <strong>Điều 1</strong>
                                và <strong>Điều 2</strong> của Hợp đồng này.
                            </li>
                            <li>3.8. Thông báo cho Bên B về sự thay đổi tên, địa chỉ, địa chỉ gửi hóa đơn thanh toán, số
                                tài khoản, thời gian ngừng dịch vụ (nếu có) trước ít nhất trước 15 (mười lăm) ngày làm
                                việc.
                            </li>
                            <li>3.9. Đảm bảo người đại diện ký hợp đồng này là người có quyền hoặc đã được ủy quyền của
                                Bên A để ký hợp đồng, chứng từ.
                            </li>
                            <li>3.10. Được quyền khiếu nại về chất lượng dịch vụ và giá cước theo quy định của Pháp
                                luật.
                            </li>
                        </ol>

                    </div>


                    <div class="rule4">
                        <strong style="margin-bottom: 0 !important;">
                            ĐIỀU 4: TRÁCH NHIỆM CỦA BÊN B
                        </strong>
                        <ol style="list-style-type: none;margin-top: 0 !important; text-align: justify">
                            <li>4.1. Cung cấp dịch vụ theo đúng nội dung đã thoả thuận tại <strong>Điều 1</strong> của
                                Hợp đồng này và bảo đảm chất lượng dịch vụ theo đúng các quy định về tiêu chuẩn chất
                                lượng dịch vụ.
                            </li>
                            <li>4.2. Cung cấp hóa đơn tài chính sau khi bên A thanh toán xong toàn bộ giá trị Hợp
                                đồng.
                            </li>
                            <li>4.3. Hướng dẫn Bên A thực hiện đúng quy trình khai thác dịch vụ và các quy định pháp
                                luật hiện hành.
                            </li>
                            <li>4.4. Tuân thủ các quy định pháp luật về quyền sở hữu công nghiệp, bản quyền.</li>
                            <li>4.5. Không chịu trách nhiệm hoặc bồi thường thiệt hại nào về việc mất mát hay hư hỏng
                                đối với dữ liệu của Bên A được lưu trữ trên máy chủ trong các trường hợp do lỗi của Bên
                                A.
                            </li>
                            <li>4.6. Không chịu bất cứ trách nhiệm nào và không phải bồi thường cho Bên A trong trường
                                hợp dữ liệu của Bên A thuê Bên B lưu giữ hoặc hệ thống lưu trữ bị gián đoạn do lỗi của
                                bên A hoặc do website (trang thông tin điện tử)
                                bị tấn công (trực tiếp hoặc gián tiếp) hoặc do sự cố bất khả kháng theo quy định tại
                                Điều 6 dưới đây.
                            </li>
                            <li>4.7. Nhanh chóng giải quyết các khiếu nại của Bên A về chất lượng dịch vụ, cước phí
                                nhưng không được quá 20 (Hai mươi) ngày làm việc kể từ ngày nhận được khiếu nại. Trường
                                hợp pháp luật có thay đổi về thời hạn giải quyết
                                khiếu nại nêu trên thì Hai bên sẽ thực hiện theo quy định của pháp luật hiện hành tại
                                thời điểm đó
                            </li>
                        </ol>
                    </div>


                    <div class="rule5">
                        <strong style="margin-bottom: 0 !important;"> ĐIỀU 5: TẠM NGỪNG DỊCH VỤ VÀ ĐƠN PHƯƠNG CHẤM DỨT
                            HỢP ĐỒNG</strong>
                        <ol style="list-style-type: none;margin-top: 0 !important; text-align: justify">
                            <li>5.1. Dịch vụ được tạm ngừng trong các trường hợp sau:
                            </li>
                            <li>5.1.1. Khi nhận được yêu cầu bằng văn bản của Bên A. Trường hợp này Bên A vẫn phải thanh
                                toán phí thuê bao dịch vụ cho Bên B. Thời gian tạm ngừng dịch vụ không quá 30 (ba mươi)
                                ngày tính từ ngày Bên B nhận được văn bản
                                của Bên A.
                            </li>
                            <li>5.1.2. Bên A vi phạm các điều khoản đã cam kết trong Hợp đồng.</li>
                            <li>5.1.3. Bên A dùng máy chủ vào bất kì mục đích/hình thức nào trái với quy định của pháp
                                luật Việt Nam.
                            </li>
                            <li>5.1.4. Bên A lưu trữ, truyền bá các dữ liệu cấu thành hoặc khuyến khích các hình thức
                                phạm tội; hoặc các dữ liệu mang tính vi phạm luật sáng chế, nhãn hiệu, quyền thiết kế,
                                bản quyền hay bất kì quyền sở hữu trí tuệ hoặc
                                bất kỳ quy định nào khác của pháp luật.
                            </li>
                            <li>5.1.5. Bên A sử dụng máy chủ của mình để gửi thư rác.</li>
                            <li>5.1.6. Bên A không thanh toán các chi phí đầy đủ và đúng hạn theo quy định tại điều 1 và
                                điều 2 Hợp đồng này.
                            </li>
                            <li>5.1.7. Trường hợp có yêu cầu của cơ quan Nhà nước có thẩm quyền; hoặc trường hợp Bất khả
                                kháng theo quy định tại Điều 6 dưới đây. Trường hợp này, Bên B không có trách nhiệm
                                thông báo trước cho Bên A.
                            </li>
                            <li>5.2. Bên B không có trách nhiệm thông báo cho Bên A và Bên A phải thanh toán phí thuê
                                bao dịch vụ trong thời gian tạm ngừng dịch vụ theo quy định tại điều 5.1.2, điều 5.1.3,
                                điều 5.1.4, điều 5.1.5, và điều 5.1.6 của Hợp
                                đồng này. Dịch vụ chỉ được Bên B mở lại sau khi Bên A chấm dứt việc vi phạm các điều
                                khoản quy định trong Hợp đồng này và nộp đầy đủ các khoản phí phát sinh do việc vi phạm
                                (nếu có).
                            </li>
                            <li>5.3. Đơn phương chấm dứt Hợp đồng:</li>
                            <li>5.3.1. Bên B có quyền đơn phương chấm dứt Hợp đồng khi Bên A tạm ngừng dịch vụ theo điều
                                5.1.2, điều 5.1.3, điều 5.1.4, điều 5.1.5 và điều 5.1.6 Hợp đồng này mà Bên A vẫn không
                                khắc phục trong thời gian 30 (ba mươi) ngày
                                làm việc kể từ ngày Bên B ngừng cung cấp dịch vụ.
                                <ul style="list-style-type: none;margin-top: 0 !important; text-align: justify">
                                    <li>
                                        (a) Trường hợp này Bên A có nghĩa vụ thanh toán cước phí của kỳ thuê bao và các
                                        khoản nợ khác (nếu có) cho đến thời điểm Bên B đơn phương chấm dứt Hợp đồng
                                        trong vòng 10 (mười) ngày làm việc, kể từ ngày nhận được thông báo của Bên B.
                                    </li>
                                    <li>(b) Bên A bị phạt khoản tiền bằng 8% phần giá trị vi phạm và bồi thường 50% giá
                                        trị Hợp đồng cho bên B.
                                    </li>
                                </ul>
                            </li>
                            <li>5.3.2. Bên A đơn phương chấm dứt Hợp đồng khi:
                                <ul style="list-style-type: none;margin-top: 0 !important; text-align: justify">
                                    <li>(a) Trường hợp Bên B không vi phạm nghĩa vụ trong Hợp đồng này thì Bên A bồi
                                        thường cho Bên B chi phí tương đương với 50% giá trị của Hợp đồng.
                                    </li>
                                    <li>(b) Trường hợp nếu Bên A lựa chọn các gói dịch vụ ưu đãi theo chương trình
                                        khuyến mại và theo đó đã cam kết sử dụng dịch vụ trong một thời hạn nhất định mà
                                        đơn phương chấm dứt hợp đồng trước thời hạn đã cam kết
                                        thì phải hoàn trả lại cước phí cho bên B các ưu đãi, các nội dung (sản phẩm)
                                        khuyến mại đó (bao gồm cả việc hoàn trả lại tiền cước đã được giảm trừ tương
                                        ứng).
                                    </li>
                                    <li>(c) Bên B vi phạm bất kỳ nghĩa vụ nào trong Hợp đồng này mà không thể khắc phục
                                        trong vòng 30 (ba mươi) ngày làm việc kể từ ngày Bên B nhận được thông báo vi
                                        phạm. Trường hợp này bên B có nghĩa vụ đưa ra phương
                                        án dịch vụ hoặc sản phẩm thay thế do bên B cung cấp cho bên A với giá trị tương
                                        đương.
                                    </li>
                                </ul>
                            </li>
                        </ol>
                    </div>

                    <div class="rule6">
                        <strong style="margin-bottom: 0 !important;">ĐIỀU 6: BẤT KHẢ KHÁNG</strong>
                        <ul style="list-style-type: none;margin-top: 0 !important; text-align: justify">
                            <li>6.1. Nếu một trong hai Bên chịu ảnh hưởng của các sự kiện bất khả kháng (như: thiên tai,
                                địch họa, lũ lụt, bão, hoả hoạn, động đất hoặc các hiểm họa thiên tai khác; hoặc việc
                                đình công hay can thiệp của Nhà nước; hay bất
                                kỳ sự kiện nào khác xảy ra ngoài tầm kiểm soát của bất kỳ Bên nào và không thể lường
                                trước được), thì được tạm hoãn thực hiện nghĩa vụ của hợp đồng, với điều kiện là Bên bị
                                ảnh hưởng đó đã áp dụng mọi biện pháp cần
                                thiết và có thể để ngăn ngừa, hạn chế hoặc khắc phục hậu quả của sự kiện đó.
                            </li>
                            <li>6.2. Bên bị ảnh hưởng bởi sự kiện bất khả kháng có nghĩa vụ thông báo cho bên còn lại.
                                Trong trường hợp sự kiện bất khả kháng xảy ra, các Bên được miễn trách nhiệm bồi thường
                                thiệt hại.
                            </li>
                            <li>6.3. Nếu sự kiện bất khả kháng không chấm dứt trong vòng 40 (bốn mươi) ngày làm việc
                                hoặc một khoảng thời gian lâu hơn và vẫn tiếp tục ảnh hướng đến việc thực hiện Hợp đồng
                                thì bên nào cũng có quyền đơn phương chấm dứt
                                Hợp đồng và thông báo cho bên còn lại bằng văn bản trong vòng 10 (mười) ngày làm việc kể
                                từ ngày dự định chấm dứt.
                            </li>
                            <li>6.4. Khi sự kiện bất khả kháng chấm dứt, các Bên sẽ tiếp tục thực hiện Hợp đồng nếu việc
                                tiếp tục thực hiện Hợp đồng là có thể được.
                            </li>
                        </ul>
                    </div>

                    <div class="rule7">
                        <strong style="margin-bottom: 0 !important;"> ĐIỀU 7: THỜI HẠN HỢP ĐỒNG</strong>
                        <p>
                            Hợp đồng này có hiệu lực kể từ ngày ký. Hợp đồng có thời hạn 12 tháng kể từ ngày ký hợp đồng
                            này. Trước khi hết hạn hợp đồng 30 (ba mươi) ngày làm việc, Bên B gửi thông báo cho Bên A và
                            đề nghị gia hạn. Trường hợp tiếp tục gia hạn Hợp đồng, Bên A ký xác
                            nhận vào thông báo gia hạn Hợp đồng và nộp đầy đủ các khoản phí mà Bên B quy định trong
                            thông báo gia hạn Hợp đồng.
                        </p>
                    </div>
                    <div class="rule8">
                        <strong style="margin-bottom: 0 !important;">ĐIỀU 8: ĐIỀU KHOẢN CHUNG</strong>
                        <ul style="list-style-type: none;margin-top: 0 !important; text-align: justify">
                            <li>8.1. Hai Bên cam kết thực hiện đúng các điều khoản của Hợp đồng, Bên nào vi phạm sẽ phải
                                chịu trách nhiệm theo quy định tại Hợp đồng và pháp luật.
                            </li>
                            <li>8.2. Trường hợp một Bên muốn thay đổi bất kỳ nội dung nào của Hợp đồng phải thông báo
                                bằng văn bản cho Bên còn lại ít nhất trước 15 (mười lăm) ngày làm việc. Nếu Hai Bên
                                thống nhất được nội dung thay đổi thì các thay đổi
                                phải được lập bằng văn bản và được ký, đóng dấu hợp pháp của hai bên. Mọi chi phí phát
                                sinh liên quan đến việc thay đổi nội dung Hợp đồng do Bên nào thì Bên đó có trách nhiệm
                                thanh toán.
                            </li>
                            <li>8.3. Mọi tranh chấp phát sinh trong quá trình thực hiện Hợp đồng này (nếu có) sẽ được
                                Hai Bên thương lượng giải quyết trên tinh thần hợp tác, tôn trọng lẫn nhau. Trường hợp
                                Hai Bên không thống nhất, Bên bị vi phạm có quyền
                                khởi kiện ra Tòa án, phán quyết của Tòa án là quyết định cuối cùng buộc Các Bên phải
                                chấp hành.
                            </li>
                            <li>8.4. Hợp đồng này được lập thành 02 (ba) bản có giá trị pháp lý như nhau, Bên A giữ 01
                                (một) bản và Bên B giữ 01 (một) bản.
                            </li>
                        </ul>
                    </div>

                    <div class="register" style="display: flex">

                        <div style="float: left;clear:both">
                            <strong>
                                ĐẠI DIỆN BÊN A
                            </strong>
                            <p>(Ký tên, đóng dấu)</p>
                            <br/>
                            <br/>
                            <br/>
                        </div>
                        <div style="float: right;clear:both">
                            <strong>
                                ĐẠI DIỆN BÊN B
                            </strong>
                            <p>(Ký tên, đóng dấu)</p>
                            <br/>
                            <br/>
                            <br/>
                            <br/>
                            <br/>
                            <p>
                                <strong>LÊ THANH HÒA</strong>
                            </p>

                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
</div>
</body>

</html>
