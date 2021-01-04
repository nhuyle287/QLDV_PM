@extends('layout.master')
@section('title')
    Hợp đồng
@stop
@section('css')

    <style>
        body{
            font-family: "Roboto";
        }
        .head {
            display: flex;
            flex-wrap: nowrap;
            margin-left: 10%;
        }

        #infor {
            list-style-type: none;
        }

        .title {
            text-align: center;
        }

        .title p {
            margin-bottom: 0 !important;
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
            border: 1px solid black;
            padding: 4px;
        }
        .service, .service td,  .service th {
            border:1px solid slategrey;
        }

        .register {
            display: flex;
            justify-content: space-around;
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
    </style>
@stop
@section('content')
    <div class="content" style="padding: 1%">
        <section class="header">
            <div class="head">
                <span>
              <img alt=""
                   src="https://www.hoatech.vn/wp-content/uploads/2015/06/005.png"
                   style=" margin-left: 0; margin-top: 5px; transform: rotate(0.00rad) translateZ(0px); -webkit-transform: rotate(0.00rad) translateZ(0px);"
                   title="logo HoaTech">
            </span>
                <div class="infor">
                    <ul id="infor">
                        <li>CÔNG TY TNHH THƯƠNG MẠI DỊCH VỤ HOA TECHNOLOGY</li>
                        <li> Đc: 102B, Tăng Nhơn Phú, Phường Tăng Nhơn Phú B, Quận 9, Tp HCM</li>
                        <li> Điện thoại: <strong> 0868856175 - Website: www.hoatech.vn - Email :
                                contact@hoatech.vn</strong></li>
                    </ul>
                    <hr style="margin-left: 40px;border: 0.02px solid #101010b8;"/>


                </div>
            </div>
            <div class="title">
                <p><strong>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</strong></p>
                <p><strong> Độc lập - Tự do - Hạnh phúc</strong></p>
                <p>***********</p>
                <p><strong>HỢP ĐỒNG THIẾT KẾ WEBSITE</strong></p>
                <p>Số: 01-{{$day}}{{$month}}/HĐTKW/{{$year}}</p>
            </div>
            <div>
                <ul class="law">
                    <li>Căn cứ Luật Thương mại nước CHXHCN Việt Nam, luật Thương mại sửa đổi thông qua ngày 14/06/2006
                    </li>
                    <li>Căn cứ vào quy định về quản lý, cung cấp và sử dụng tài nguyên Internet hiện hành của Bộ Thông
                        tin và Truyền thông.
                    </li>
                    <li>Căn cứ bộ luật dân sự năm 2005</li>
                    <li>Căn cứ vào yêu cầu và khả năng của hai bên.</li>
                </ul>


            </div>

            <p>Hôm nay, ngày {{$day}} tháng {{$month}} năm {{$year}}, tại công ty TNHH THƯƠNG MẠI DỊCH VỤ HOA TECHNOLOGY chúng tôi gồm
                có:</p>

            <div class="infor_contract">
                <div class="infor_custom">
                    <table>
                        <tr>
                            <td colspan="6" rowspan="1">
                                <strong>Bên A: </strong>
                                <span style="font-weight: bold">{{$nameA}}</span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="1">
                                Người đại diên
                            </td>
                            <td colspan="2" style="font-weight: bold">
                                {{$name}}
                            </td>
                            <td colspan="1">Chức vụ</td>
                            <td colspan="2" rowspan="1" style="font-weight: bold">{{$position}}

                            </td>
                        </tr>
                        <tr>
                            <td>
                                Địa chỉ
                            </td>
                            <td colspan="5" rowspan="1" style="font-weight: bold">
                                {{$address}}
                            </td>

                        </tr>
                        <tr>
                            <td>
                                Điện thoại
                            </td>
                            <td colspan="2" style="font-weight: bold">
                                {{$telephone}}
                            </td>
                            <td colspan="1">Số Fax</td>
                            <td colspan="2" rowspan="1" style="font-weight: bold">{{$fax}}

                            </td>
                        </tr>
                        <tr>
                            <td>
                                Số tài khoản
                            </td>
                            <td colspan="2" style="font-weight: bold">
                                {{$account_number}}
                            </td>
                            <td colspan="1">MỞ tại ngân hàng</td>
                            <td colspan="2" rowspan="1" style="font-weight: bold">{{$open_at}}

                            </td>
                        </tr>
                        <tr>
                            <td>
                                Mã số thuế
                            </td>
                            <td colspan="2" style="font-weight: bold">
                                {{$tax_number}}
                            </td>
                            <td colspan="1">Email</td>
                            <td colspan="2" rowspan="1" style="font-weight: bold">{{$email}}

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
                            <td colspan="2" rowspan="1"><strong>Giám đốc</strong>>
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
                            <td colspan="2" rowspan="1"><strong>Ngân hàng Á Châu ACB Chi nhánh Hồ Chí Minh</strong>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                Chủ tài khoản:
                            </td>
                            <td colspan="2">
                                <strong>Lê Thanh Hòa</strong>
                            </td>
                            <td colspan="3"></td>

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
                    Sau khi bàn bạc thảo luận hai bên đồng ý ký hợp đồng thiết kế website với những nội dung và điều
                    khoản sau:
                </p>
                <div class="rules">
                    <div class="rule1">
                        <strong>ĐIỀU 1: NỘI DUNG CÔNG VIỆC</strong>
                        <ol style="list-style-type: none;">
                            <li>1.1 Bên B có trách nhiệm thiết kế cho bên A 01 website với nội dung theo phụ lục đính
                                kèm
                            </li>
                            <li>1.2 Bên B giao quyền quản trị trang web cho khách hàng theo sự chỉ định của bên A sau
                                khi nghiệm thu.
                            </li>
                            <li>1.3 Bên B chịu trách nhiệm cung cấp không gian lưu trữ Website cho trang web trong thời
                                gian hợp đồng có hiệu lực
                            </li>
                            <li>1.4 Website được bên B bảo hành trong thời gian 01 năm kể từ ngày ký nghiệm thu.</li>
                            <li>1.5 Bàn giao mã nguồn cho bên A khi bàn giao và thanh lý hợp đồng</li>
                        </ol>
                    </div>

                    <div class="rule2">
                        <strong>ĐIỀU 2: PHÍ DỊCH VỤ VÀ PHƯƠNG THỨC THANH TOÁN</strong>
                        <ol style="list-style-type: none;">
                            <li>2.1. Chi phí thiết kế website, hosting và tên miền bao gồm:
                                <table class="service">
                                    <tr style="text-align: center">
                                        <th>Nội dung</th>
                                        <th>Đơn giá (VNĐ)</th>
                                        <th>Số lượng</th>
                                        <th>Thành tiền (VNĐ)</th>
                                    </tr>
                                    <?php $stt = 0;$vat = 0;$sum = 0


                                    ?>



                                    @foreach($a as $list_chil)
                                        <tr>

                                            <th>{{$list_chil[0]}}</th>
                                            <th style="text-align: right">{{$list_chil[1]}}</th>
                                            <th style="text-align: right">{{$list_chil[2]}}</th>
                                            <th style="text-align: right">{{number_format($list_chil[3])}}</th>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th>{{$name_hosting}}</th>
                                        <th style="text-align: right">{{number_format($price_hosting)}}</th>
                                        <th style="text-align: right">{{$quantity_hosting}}</th>
                                        <th style="text-align: right">{{number_format($total_hosting)}}</th>

                                    </tr>
                                    <tr>
                                        <th>{{$name_domain}}</th>
                                        <th style="text-align: right">{{number_format($price_domain)}}</th>
                                        <th style="text-align: right">{{$quantity_domain}}</th>
                                        <th style="text-align: right">{{number_format($total_domain)}}</th>

                                    </tr>
                                    <tr>
                                        <th>{{$name_ssl}}</th>
                                        <th style="text-align: right">{{number_format($price_ssl)}}</th>
                                        <th style="text-align: right">{{$quantity_ssl}}</th>
                                        <th style="text-align: right">{{number_format($total_ssl)}}</th>

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
                                        <td colspan="3"><strong>Tổng</strong></td>
                                        <td style="text-align: right"><strong>{{number_format($total)}} </strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" ><strong>Mã khuyến mãi</strong></td>
                                        <td style="text-align: right"><strong>{{$promotion}}</strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><strong>Tổng tiền</strong></td>
                                        <td style="text-align: right"><strong>{{number_format($total_price)}} </strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4"><strong>Bằng chữ: {{convert_number_to_words($total_price)}}
                                                đồng</strong></td>

                                    </tr>
                                </table>
                            </li>
                            <li>2.2. Giá trị hợp đồng được thanh toán làm hai đợt
                                <ul class="value_contract">
                                    <li>Đợt 01: Thanh toán phí thiết kế website, tên miền, hosting và SSL sau khi ký kết hợp đồng
                                        theo điều khoản 2.1.
                                        <p style="margin-bottom: 0">Với số tiền thanh toán là: <span
                                                style="font-weight: bold;">{{number_format($price1)}} VNĐ</span></p>
                                        <p style="margin-bottom: 0">(Bằng chữ: {{convert_number_to_words($price1)}}
                                            đồng)</p>
                                    </li>
                                    <li>Đợt 02: Thanh toán chi phí còn lại sau khi nghiệm thu và thanh lý hợp đồng

                                        <p style="margin-bottom: 0">Với số tiền thanh toán là:<span
                                                style="font-weight: bold;"> {{number_format($price2)}} VNĐ</span></p>

                                        <p style="margin-bottom: 0">(Bằng chữ: {{convert_number_to_words($price2)}}
                                            đồng)</p>
                                    </li>
                                </ul>
                            </li>
                            <li>2.3 Hình thức thanh toán bằng hình thức chuyển khoản.</li>
                        </ol>
                    </div>


                    <div class="rule3">
                        <strong>ĐIỀU 3: QUYỀN VÀ NGHĨA VỤ BÊN A</strong>
                        <ol style="list-style-type: none;">
                            <li>3.1 Bên A có nghĩa vụ:

                                <ul style="list-style-type: disc;">
                                    <li>Cung cấp thông tin đầy đủ và kịp thời để bên B thực hiện việc thiết kế
                                        Website.
                                    </li>
                                    <li>Tuân thủ giao diện thiết kế Website và những nội dung đã được hai bên thống nhất
                                        trước khi việc thiết kế Website bắt đầu.
                                    </li>
                                    <li>Thanh toán cho Bên B đầy đủ các khoản chi phí khi Bên B hoàn tất công việc và
                                        bàn giao, nghiệm thu cho Bên A.
                                    </li>
                                    <li>Phải thanh toán đầy đủ các khoản chi phí còn lại theo hợp đồng trong trường hợp
                                        Bên A đơn phương hủy bỏ hợp đồng.
                                    </li>
                                </ul>
                            </li>
                            <li>3.2 Bên A có quyền:
                                <ul style="list-style-type: disc;">
                                    <li>Được bảo đảm bí mật nội dung thông tin cá nhân truyền đưa qua mạng.</li>
                                    <li>Khiếu nại về chất lượng dịch vụ, cước dịch vụ do Bên B cung cấp. Khiếu nại phải
                                        được gửi bằng văn bản cho Bên B không chậm quá 15 (mười lăm) ngày kể từ ngày
                                        phát sinh vấn đề.
                                    </li>
                                </ul>
                            </li>
                        </ol>

                    </div>


                    <div class="rule4">
                        <strong>
                            ĐIỀU 4: QUYỀN VÀ NGHĨA VỤ BÊN B
                        </strong>
                        <ol style="list-style-type: none;">
                            <li> 4.1 Bên B có nghĩa vụ:
                                <ul style="list-style-type: disc;">
                                    <li>Bên B có trách nhiệm hoàn tất quá trình thiết kế theo đúng thời gian cam kết của
                                        hợp đồng với Bên A.
                                    </li>
                                    <li>Hai bên sẽ cùng tiến hành buổi tổng kết và nghiệm thu hợp đồng trên cơ sở như
                                        sau:
                                        <ul class="value_contract">
                                            <li>Hệ thống Website được thực hiện hoàn chỉnh và đầy đủ theo đúng các nội
                                                dung trong hợp đồng.
                                            </li>
                                            <li>Hướng dẫn Bên A người sử dụng và quản trị thông tin trên Website.</li>
                                        </ul>
                                    </li>
                                    <li>Tư vấn miễn phí cho bên A trong quá trình hoàn thiện website suốt thời hạn bảo
                                        hành.
                                    </li>
                                    <li>Cung cấp dịch vụ theo đúng nội dung đã thỏa thuận trong Hợp đồng.</li>
                                    <li>Bảo đảm chất lượng dịch vụ theo đúng các quy định về tiêu chuẩn chất lượng dịch
                                        vụ.
                                    </li>
                                    <li>Tuân thủ giao diện thiết kế Website và những nội dung đã được hai bên thống nhất
                                        trước khi việc thiết kế Website bắt đầu.
                                    </li>
                                    <li>Giữ bí mật nội dung thông tin do Bên A truyền đưa trên mạng trừ những trường hợp
                                        đặc biệt theo quy định của pháp luật.
                                    </li>
                                    <li>Kiểm tra, sửa chữa, khắc phục các sự cố xảy ra làm gián đoạn việc sử dụng
                                        Website trong vòng 24 giờ kể từ lúc phát sinh sự cố và Bên A không phải thanh
                                        toán khoản lệ phí sửa chữa này. Trong trường hợp hư hỏng do Bên
                                        A gây ra thì bên A phải thanh toán đầy đủ các khoản chi phí sửa chữa.
                                    </li>
                                    <li>Bên B phải hoàn trả lại 70% chi phí đã nhận từ bên A nếu bên B không thể thực
                                        hiện theo các yêu cầu ở mục phụ lục hợp đồng.
                                    </li>
                                </ul>
                            </li>
                            <li>4.2 Bên B có quyền:
                                <ul style="list-style-type: disc;">
                                    <li>Yêu cầu Bên A cung cấp tài liệu theo thời gian quy định để Bên B thực hiện việc
                                        thiết kế Website theo phụ lục yêu cầu cung cấp tài liệu.
                                    </li>
                                    <li>Yêu cầu bên A thanh toán đầy đủ chi phí khi bên B đã hoàn thành các yêu cầu
                                        trong phụ lục hợp đồng kèm theo.
                                    </li>
                                    <li>Thu thêm phí thiết kế nếu bên A yêu cầu thêm các chức năng ngoài những chức năng
                                        đã ký kết trong hợp đồng.
                                    </li>
                                </ul>
                            </li>
                        </ol>
                    </div>


                    <div class="rule5">
                        <strong>ĐIỀU 5: ĐIỀU KHOẢN CHUNG</strong>
                        <ol style="list-style-type: none;">
                            <li>5.1 Mọi sửa đổi, bổ sung hợp đồng phải được ghi nhận bằng văn bản và cả hai bên nhất trí
                                thông qua.
                            </li>
                            <li>5.2 Hai bên tạo điều kiện cho nhau hoàn thành đúng tiến độ hợp đồng.</li>
                            <li>5.3 Mọi tranh chấp trong quá trình thực hiện hợp đồng sẽ được hai bên cùng cố gắng bàn
                                bạc giải quyết bằng thương lượng. Nếu những vấn đề phát sinh không thể thỏa thuận được
                                giữa hai bên thì sẽ đưa ra giải quyết tại Tòa án
                                Kinh tế TP Hồ Chí Minh. Phán quyết của Tòa án là phán quyết cuối cùng đối với cả hai
                                bên. Toàn bộ chi phí xét xử do bên thua chịu.
                            </li>
                            <li>5.4 Hợp đồng này được lập thành 02 (hai) bản có giá trị như nhau, Bên A giữ 01 (một)
                                bản, Bên B giữ 01 (một) bản có hiệu lực kể từ ngày ký.
                            </li>
                        </ol>
                    </div>


                </div>
            </div>
            <div class="register">
                <div>
                    <strong>
                        ĐẠI DIỆN BÊN A
                    </strong>
                    <P>(Ký tên, đóng dấu)</P>
                </div>
                <div>
                    <strong>
                        ĐẠI DIỆN BÊN B
                    </strong>
                    <P>(Ký tên, đóng dấu)</P>
                    <br>
                    <br>
                    <br>
                    <br>
                    <p>
                        <strong>LÊ THANH HÒA</strong>
                    </p>

                </div>
            </div>

        </section>
        <br>
        <br>
        <br>
        <section class="schedule">
            <div class="schedule_head">
                <p><strong>PHỤ LỤC</strong></p>
                <p>
                    <strong>ĐỀ ÁN THIẾT KẾ MỚI WEBSITE</strong>
                </p>
                <p><strong><u>PHẦN I – YÊU CẦU CHUNG</u></strong></p>
            </div>
            <div class="schedule_required">
                <ol style="list-style-type: none">
                    <li><strong>I. YÊU CẦU CHUNG</strong>
                        <ul class="law">
                            <li>Website được thiết kế bằng ngông ngữ lập trình: PHP hoặc các ngôn ngữ khác thích hợp với
                                nhiều trình duyệt nhất.
                            </li>
                            <li>Website chuẩn seo đánh giá >= 95%.</li>
                            <li>Dung lượng và bố cục thích hợp để người dùng dễ dàng download. Các đường link chính xác
                                rõ ràng giúp người dùng download nhanh nhất.
                            </li>
                            <li>Website có thể thay đổi / cập nhật thường xuyên theo yêu cầu hoạt động của công ty. Nhân
                                viên phụ trách website dễ dàng vận hành và thay đổi theo yêu cầu của công ty.
                            </li>
                        </ul>
                    </li>
                    <li><strong>II. YÊU CẦU VỀ GIAO DIỆN</strong>
                        <ul class="law">
                            <li>Giao diện dựa trên Hệ thống nhận diện thương hiệu của khách hàng để xây dựng giao diện
                                riêng, đặc trưng theo từng lĩnh vực của khách hàng.
                            </li>
                        </ul>
                    </li>
                    <li><strong>III. YÊU CẦU VỀ CHỨC NĂNG</strong>
                        <table class="function">
                            <tr>
                                <th colspan="1">
                                    Loại trang
                                </th>
                                <th colspan="2">Tính năng</th>
                            </tr>
                            <tr>
                                <td colspan="1"><span>Trang chủ</span></td>
                                <td colspan="2">
                                    @if($func_home!==null)

                                        <ul class="value_contract">
                                            @foreach($func_home as $list_chil)
                                                <li>  {{$list_chil[0]}}</li>
                                            @endforeach
                                        </ul>

                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">Module tin tức blog</td>
                                <td colspan="2">
                                    <ul class="law">
                                        <li>Bao gồm các chức năng sau:
                                            <ul class="value_contract">
                                                <li>Các bài viết giới thiệu về công ty.</li>
                                                <li>Trang show tin theo chủ để.</li>
                                                <li>Trang show chi tiết tin.</li>
                                                <li>Module tin mới nhất.</li>
                                                <li>Module tin liên quan.</li>
                                                <li>Module danh mục tin tức theo chủ đề.</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">Module dịch vụ</td>
                                <td colspan="2" rowspan="1">
                                    <ul class="value_contract">
                                        <li>Module hiển thị danh mục dịch vụ.</li>
                                        <li>Module hiển thị chi tiết dịch vụ.</li>
                                        <li>Module hiển thị chi tiết dịch vụ, dự án mới nhất.</li>
                                        <li>Module hiển thị chi tiết dịch vụ, dự án liên quan.</li>

                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">Module slide</td>
                                <td colspan="2" rowspan="1">
                                    <ul class="value_contract">
                                        <li>Module slide trình diễn ảnh (Slide Banner).</li>
                                        <li>Module slide tin tức.</li>
                                    </ul>
                                </td>
                            </tr>
                            @if($func_product!==null)
                                <tr>
                                    <td colspan="1">Module sản phẩm</td>
                                    <td colspan="2" rowspan="1">
                                        <ul class="value_contract">
                                            @foreach($func_product as $list_chil)
                                                <li>{{$list_chil[0]}}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                            @endif
                            <tr>
                                <td colspan="1">Module hỗ trợ trực tuyến</td>
                                <td colspan="2" rowspan="1">
                                    <p style="margin-bottom: 0">Bao gồm các thông tin: </p>
                                    <ul class="value_contract">
                                        <li>Số điện thoại.</li>
                                        <li>Zalo, facebook, email.</li>
                                        <li>Webchat.</li>

                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">Module liên hệ</td>
                                <td colspan="2" rowspan="1">

                                    <p style="margin-bottom: 0">Bao gồm các chức năng: </p>
                                    <ul class="value_contract">
                                        <li>Form gửi mail liên hệ.</li>
                                        <li>Bản đồ Google Maps.</li>

                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">Module liên kết web</td>
                                <td colspan="2" rowspan="1">
                                    Cho phép tạo link liên kết đến các website khác.
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">Module quảng cáo</td>
                                <td colspan="2" rowspan="1">
                                    Cho phép đặt các banner quảng cáo lên web.
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">Module Seo</td>
                                <td colspan="2">
                                    <ul class="law">
                                        <li>Bao gồm các module FaceBox, Like, Share…</li>
                                        <li>Tối ưu SEO cho website thông qua hệ quản trị website.</li>
                                        <li>Tối ưu về Seo Onpage.</li>
                                        <li>Cấu trúc website và liên kết được tối ưu.</li>
                                        <li>Tối ưu từng trang nội dung (thiết lập tiêu đề, mô tả, từ khóa).</li>
                                        <li>Thiết lập mặc định các thẻ SEO đề mục từ H1 - H6.</li>
                                        <li>Tạo file robots.txt, sitemap.xml hoàn toàn tự động.</li>
                                        <li>Tối ưu các thẻ alt cho img, title cho ảnh và cho liên kết.</li>
                                        <li>Thiết lập google-site-verification.</li>
                                        <li>Thiết lập Google ID Analytics.</li>
                                        <li>Thiết lập các thẻ SEO khác thông qua hệ quản trị.</li>
                                        <li>Tối ưu onpage.</li>
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="1">Module footer</td>
                                <td colspan="2">
                                    <ul class="law">
                                        <li>Show thông tin công ty cuối trang.</li>
                                        <li>Hỗ trợ nút lên đầu trang.</li>
                                        <li>Tích hợp đăng ký website với bộ công thương.</li>
                                        <li>Các thông tin mạng xã hội.</li>

                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">Phần quản trị nội dung(Admin)</td>
                                <td colspan="2">
                                    <ul class="law">
                                        <li>Giúp người quản trị tự cập nhật thêm/ xóa/ sửa nội dung.</li>
                                        <li>Cấp phát và thu hồi quyền truy cập website.</li>

                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">Tương thích thiết bị di độn</td>
                                <td colspan="2" rowspan="1">
                                    Website thân thiện với các thiết bị di động của người dùng.
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">Ngôn ngữ</td>
                                <td colspan="2">
                                    {{$func_language}}
{{--                                    @if($func_language!==null)--}}

{{--                                        <ul class="value_contract">--}}
{{--                                            @foreach($func_language as $list_chil)--}}
{{--                                                <li>  {{$list_chil[0]}}</li>--}}
{{--                                            @endforeach--}}
{{--                                        </ul>--}}

{{--                                    @endif--}}
                                </td>
                            </tr>
                            @if($func_different!=null)
                                <tr>
                                    <td colspan="1">Tính năng khác</td>
                                    <td colspan="2">
                                        <ul class="value_contract">
                                            @foreach($func_different as $list_chil)
                                                <li>  {{$list_chil[0]}}</li>
                                            @endforeach
                                        </ul>

                                    </td>
                                </tr>
                            @endif
                        </table>
                        <br>
                        <p style="margin-bottom: 0"><strong>Ghi chú:</strong></p>
                        <ul style="list-style-type: disc;">
                            <li>Ngoài những chức năng trên bên B còn hỗ trợ tối ưu hóa website để thân thiện với bộ máy
                                tìm kiếm của Google
                            </li>
                            <li>Nếu khách hàng có yêu cầu thêm chức năng ngoài những chức năng đã liệt kê ở trên thì
                                chúng tôi sẽ xem xét có thể hỗ trợ hoặc tính phí tuy theo độ phức tạp của chức năng đó.
                            </li>
                        </ul>
                    </li>
                    <li><strong>IV. THỜI GIAN THỰC HIỆN</strong>
                        <p>Thời gian hoàn thành thiết kế website (không bao gồm nhập liệu sản phẩm):<span
                            >{{$date_finish}} ngày kể từ ngày ký hợp đồng.</span></p>
                        <table class="time">
                            <tr>
                                <th>STT</th>
                                <th>Nội dung công việc</th>
                                <th>Thời gian dự tính</th>
                                <th>Trách nhiệm</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Cung cấp thông tin theo yêu cầu</td>
                                <td>{{$date_infor}} ngày</td>
                                <td>Khách Hàng</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Thiết kế Demo</td>
                                <td>{{$date_demo}} ngày</td>
                                <td>Công Ty</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Thiết kế, lập trình web, nhập liệu.</td>
                                <td>{{$date_code}} ngày</td>
                                <td>Công Ty</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Nghiệm thu đưa vào hoạt động.</td>
                                <td> {{$date_test}} ngày</td>
                                <td>Công Ty và Khách Hàng</td>
                            </tr>
                        </table>
                    </li>
                    <li><strong>V. CHÍNH SÁCH BẢO HÀNH – BẢO TRÌ</strong>
                        <ol style="list-style-type: none;">
                            <li><strong>1. Mục tiêu hoạt động bảo hành, hỗ trợ</strong>
                                <ul class="law">
                                    <li>Đảm bảo website sau khi nghiệm thu hoạt động ổn định để mang lại lợi ích lâu dài
                                        cho khách hàng.
                                    </li>
                                    <li>Đáp ứng các điều khoản trong bảng phụ lục này.</li>
                                    <li>Theo dõi quá trình sử dụng, ghi nhận các lỗi về tốc độ xử lý và tiến hành sửa
                                        đổi nếu cần thiết.
                                    </li>
                                    <li>Tư vấn, đề xuất những lỗi mà trong quá trình sử dụng sẽ phát sinh.</li>

                                </ul>
                            </li>
                            <li><strong>2. Thời gian bảo hành</strong>
                                <ul class="law">
                                    <li>Với các sản phẩm website chúng tôi luôn thực hiện việc bảo hành, bảo trì miễn
                                        phí trong vòng 01 năm. Bất cứ khi nào có lỗi phát sinh, hãy gọi ngay cho chúng
                                        tôi để được tư vấn.
                                    </li>


                                </ul>
                            </li>
                            <li><strong>3. Các hình thức hỗ trợ bảo hành, bảo trì sản phẩm</strong>
                                <ul class="law">
                                    <li>Nhân viên kỹ thuật của chúng tôi sẽ tiến hành khắc phục lỗi hoặc sự cố đối với
                                        website và hosting khi có thông báo từ khách hàng.
                                    </li>
                                    <li>Hoặc có các hình thức hỗ trợ từ xa như: điện thoại, email, live chat… với các
                                        lỗi đơn giản.

                                    </li>


                                </ul>
                                <p style="margin-bottom: 0"><strong>Lưu ý:</strong>
                                <ul class="support">
                                    <li>Phạm vi bảo hành: Dịch vụ bảo hành giới hạn trong việc sửa lỗi chức năng do
                                        HOATECH xây dựng (các chức năng được xác định cụ thể trong hợp đồng ký kết với
                                        khách hàng).
                                    </li>
                                    <li>Phạm vi bảo hành không bao gồm các trường hợp lỗi do các nguyên nhân sau:
                                        <ul class="law">
                                            <li>Lỗi do vận hành không đúng hướng dẫn sử dụng, do sự vô ý, cẩu thả.</li>
                                            <li>Lỗi do tai nạn cháy nổ, thiên tai do môi trường gây ra.</li>
                                        </ul>
                                    </li>
                                </ul>
                                </p>
                            </li>
                        </ol>
                    </li>
                    <li><strong>VI. DUY TRÌ WEBSITE (Nếu có)</strong>
                        <ul class="law">
                            <li>{{$name_hosting}}:  {{number_format($total_hosting)}} VNĐ, {{$name_domain}}:  {{number_format($total_domain_remain)}}VNĐ
                            </li>
                            <li>{{$name_ssl}}: {{number_format($total_ssl)}} VNĐ</li>
                        </ul>
                        <p style="margin-bottom: 0">
                            Tổng số tiền duy trì hằng năm là: {{number_format($total_remain)}} VNĐ /năm.
                        </p>
                        <p>Phụ lục này là một phần không thể tách rời của hợp đồng: <span style="color: red;">01-{{$day}}{{$month}}/HĐTK/{{$year}}</span>
                        </p>
                    </li>
                </ol>
            </div>
            <div class="register">
                <div>
                    <strong>
                        ĐẠI DIỆN BÊN A
                    </strong>
                    <P>(Ký tên, đóng dấu)</P>
                </div>
                <div>
                    <strong>
                        ĐẠI DIỆN BÊN B
                    </strong>
                    <P>(Ký tên, đóng dấu)</P>
                    <br>
                    <br>
                    <br>
                    <br>
                    <p>
                        <strong>LÊ THANH HÒA</strong>
                    </p>

                </div>
            </div>

        </section>

    </div>

    <form action="{{route("admin.contract.printWS")}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id_customer" value="{{$id_customer}}">
        <input type="hidden" name="id_website" value="{{$id_website}}">
        <input type="hidden" name="id_hosting" value="{{$id_hosting}}">
        <input type="hidden" name="id_ssl" value="{{$id_ssl}}">
        <input type="hidden" name="id_domain" value="{{$id_domain}}">
        <input type="hidden" name="date_create" value="{{$date_create}}">
        <input type="hidden" name="price1" value="{{$price1}}">
        <input type="hidden" name="price2" value="{{$price2}}">
        <input type="hidden" name="quantityWS" value="{{$quantityWS}}">
        <input type="hidden" name="quantityHosting" value="{{$quantity_hosting}}">
        <input type="hidden" name="quantityDomain" value="{{$quantity_domain}}">
        <input type="hidden" name="quantitySSL" value="{{$quantity_ssl}}">
        <input type="hidden" name="total_price" value="{{$total_price}}">
        <input type="hidden" name="promotion" value="{{$promotion}}">
        <input type="hidden" name="discount" value="{{$discount}}">
        <input type="hidden" name="language" value="{{$func_language}}">
        <input type="hidden" name="function_product[]" value="{{$function_product}}">
        <input type="hidden" name="function_different[]" value="{{$function_different}}">
        <input type="hidden" name="function_home[]" value="{{$function_home}}">
        <input type="hidden" name="total_hosting" value="{{$total_hosting}}">
        <input type="hidden" name="total_domain" value="{{$total_domain}}">
        <input type="hidden" name="total_ssL" value="{{$total_ssl}}">
        <input type="hidden" name="totalWS" value="{{$totalWS}}">
        <input type="hidden" name="total_remain" value="{{$total_remain}}">

        <input type="hidden" name="date_finish" value="{{$date_finish}}">
        <input type="hidden" name="date_infor" value="{{$date_infor}}">
        <input type="hidden" name="date_demo" value="{{$date_demo}}">
        <input type="hidden" name="date_code" value="{{$date_code}}">
        <input type="hidden" name="date_test" value="{{$date_test}}">


        <button type="submit" class="btn btn-info" formtarget="_blank">In hợp đồng</button>
    </form>


@stop

