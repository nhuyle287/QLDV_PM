<div>
    <div style="background-color: #368ee0;color: white; text-align: right; padding: 0.25rem ;">
        <p style=" margin-right: 7rem"> Tổng đài
            hỗ trợ 24/7: 0988196169</p>
    </div>
    <div style="width: 80%; margin: 1rem auto">
        <div style="display: flex;">
            <img alt=""
                 src="https://www.hoatech.vn/wp-content/uploads/2015/06/005.png"
                 style=" margin-left: 0; margin-top: 5px; transform: rotate(0.00rad) translateZ(0px); -webkit-transform: rotate(0.00rad) translateZ(0px);"
                 title="logo">
            <p style="margin-left: 0.5rem">Công ty TNHH TMDV Hoa Technology</p>
        </div>
        <p style="color: black">Thông tin đơn hàng</p>
        <p style="color: red; font-weight: inherit">
            Lưu ý: Đây là email tự động, xin vui lòng không trả lời mail này.
        </p>
        <p style="color: #333333">
            Chúc mừng quý khách đã đăng ký dịch vụ thành công tại <a href="me.hoatech.vn">me.hoatech.vn</a>. Sau đây là
            chi tiết đơn hàng của quý khách
        </p>

        <table>
            <tr>
                <td colspan="2" style="background-color: #f2f2f2">
                    Thông tin đơn hàng
                </td>
            </tr>
            <tr>
                <td>
                    Mã đơn hàng:
                </td>
                <td>
                    {{$service->code}}
                </td>
            </tr>
            <tr>
                <td>
                    Email:
                </td>
                <td>
                    {{$service->email}}
                </td>
            </tr>
            <tr>
                <td colspan="2" style="background-color: #f2f2f2">
                    Thông tin mua hàng
                </td>

            </tr>
            <tr>
                <td>
                    Họ và tên
                </td>
                <td>
                    {{$service->customer_name}}
                </td>
            </tr>
            <tr>
                <td>
                    Số điện thoại
                </td>
                <td>
                    {{$service->phone_number}}
                </td>
            </tr>
            <tr>
                <td>
                    Địa chỉ
                </td>
                <td>
                    {{$service->address}}
                </td>
            </tr>

            <tr>
                <td>
                    Ghi chú
                </td>
                <td>
                    {{$service->notes}}
                </td>
            </tr>

            <tr>
                <td style="background-color: #f2f2f2">
                    Thông tin thanh toán
                </td>
                <td>

                </td>
            </tr>
            <tr>
                <td>
                    Hình thức thanh toán
                </td>
                <td>

                </td>
            </tr>
            <tr>
                <td>
                    Ngày đăng ký
                </td>
                <td>
                    {{date('d-m-Y',strtotime ($service->start_date))}}
                </td>
            </tr>


        </table>


        <table style="width: 100%;text-align: left;">
            <tr style=" color: black; width: 70%; background-color: #f7f7f7;border-bottom-color: #ccc;  border-bottom-style: dashed;    border-bottom-width: 1px;    border-collapse: collapse;    border-right-color: #ccc;    border-right-style: dashed;
            border-right-width: 1px;padding: 0.5rem ">
                <th style="background-color: #f7f7f7;border-bottom-color: #ccc;  border-bottom-style: dashed;    border-bottom-width: 1px;    border-collapse: collapse;    border-right-color: #ccc;    border-right-style: dashed;
            border-right-width: 1px;padding: 0.5rem">
                    Dịch vụ
                </th>
                <th style="background-color: #f7f7f7;border-bottom-color: #ccc;  border-bottom-style: dashed;    border-bottom-width: 1px;    border-collapse: collapse;    border-right-color: #ccc;    border-right-style: dashed;
            border-right-width: 1px;padding: 0.5rem">
                    Thời gian đặt
                </th>
                <th style="background-color: #f7f7f7;border-bottom-color: #ccc;  border-bottom-style: dashed;    border-bottom-width: 1px;    border-collapse: collapse;    border-right-color: #ccc;    border-right-style: dashed;
            border-right-width: 1px;padding: 0.5rem">
                    Phí khởi tạo
                </th>
                <th style="background-color: #f7f7f7;border-bottom-color: #ccc;  border-bottom-style: dashed;    border-bottom-width: 1px;    border-collapse: collapse;    border-right-color: #ccc;    border-right-style: dashed;
            border-right-width: 1px;padding: 0.5rem">
                    Phí duy trì
                </th>
                <th style="background-color: #f7f7f7;border-bottom-color: #ccc;  border-bottom-style: dashed;    border-bottom-width: 1px;    border-collapse: collapse;    border-right-color: #ccc;    border-right-style: dashed;
            border-right-width: 1px;padding: 0.5rem">
                    Thành tiền
                </th>

            </tr>
            <tr style="color: #333333;border-bottom-color: #ccc;  border-bottom-style: dashed;    border-bottom-width: 1px;    border-collapse: collapse;    border-right-color: #ccc;    border-right-style: dashed;
                        border-right-width: 1px;padding: 0.5rem">
                <td style="border-bottom-color: #ccc;  border-bottom-style: dashed;    border-bottom-width: 1px;    border-collapse: collapse;    border-right-color: #ccc;    border-right-style: dashed;
                        border-right-width: 1px;padding: 0.5rem">
                    @if($service->software!=null)
                        {{$service->software}}
                    @endif

                </td>
                <td style="border-bottom-color: #ccc;  border-bottom-style: dashed;    border-bottom-width: 1px;    border-collapse: collapse;    border-right-color: #ccc;    border-right-style: dashed;
                        border-right-width: 1px;padding: 0.5rem">
                    {{$service->date_using}} tháng
                </td>
                @if($service->software!=null)
                    @if($extend==0)
                        <td style="border-bottom-color: #ccc;  border-bottom-style: dashed;    border-bottom-width: 1px;    border-collapse: collapse;    border-right-color: #ccc;    border-right-style: dashed;
                        border-right-width: 1px;padding: 0.5rem">{{number_format($service->softwares_price)}} đ</td>
                        <td style="border-bottom-color: #ccc;  border-bottom-style: dashed;    border-bottom-width: 1px;    border-collapse: collapse;    border-right-color: #ccc;    border-right-style: dashed;
                        border-right-width: 1px;padding: 0.5rem">0 đ</td>
                        <td style="border-bottom-color: #ccc;  border-bottom-style: dashed;    border-bottom-width: 1px;    border-collapse: collapse;    border-right-color: #ccc;    border-right-style: dashed;
                        border-right-width: 1px;padding: 0.5rem">{{number_format(($service->softwares_price*($service->date_using/12)))}} đ</td>
                    @endif
                    @if($extend==1)
                        <td>0 đ</td>
                        <td>{{number_format($service->softwares_price)}} đ</td>
                        <td>{{number_format(($service->softwares_price*($service->date_using/12)))}} đ</td>
                    @endif

                @endif


            </tr>
            <tr>
                <td colspan="4" style="border-bottom-color: #ccc;  border-bottom-style: dashed;    border-bottom-width: 1px;    border-collapse: collapse;    border-right-color: #ccc;    border-right-style: dashed;
                        border-right-width: 1px;padding: 0.5rem; text-align: right">Tổng đơn hàng</td>
                @if($service->software!=null)
                    <td style="border-bottom-color: #ccc;  border-bottom-style: dashed;    border-bottom-width: 1px;    border-collapse: collapse;    border-right-color: #ccc;    border-right-style: dashed;
                        border-right-width: 1px;padding: 0.5rem">{{number_format(($service->softwares_price*($service->date_using/12)))}} đ</td>
                @endif
            </tr>
        </table>
        <p style="color: #333333;">
            Quý khách vui lòng phản hồi cho chúng tôi trong vòng 24h theo đường dây nóng <span style="color: black">0988196169</span>
            hoặc gửi về
            <a href="contact@hoatech.vn">contact@hoatech.vn</a> trong trường hợp dịch vụ đăng ký không đúng. Công ty
            TNHH TMDV Hoa Technology không thể
            và sẽ không chịu trách nhiệm pháp lý và bồi thường đối với bất kỳ tổn thất hoặc thiệt hại nào phát sinh do
            bạn không tuân thủ quy định này.
        </p>
        <div>
            <div>
                <h4>Danh sách ngân hàng thanh toán qua hình thức chuyển khoản</h4>
                <h6>Ngân hàng Đông Á – DAB Quận 9</h6>
                <p>Số TK: 0108206471</p>
                <p>Chủ TK:<i> Lê Thanh Hòa</i></p>
            </div>
            <div>
                <h4>Ngân hàng Á Châu – Chi nhánh Hồ Chí Minh (Sài Gòn)</h4>
                <p>Số TK: 203351129</p>
                <p>Chủ TK: <i>Lê Thanh Hòa</i></p>
            </div>
        </div>

        <p style="color: black">
            Hỗ trợ dịch vụ và chăm sóc khách hàng 24/7
        </p>
        <p style="color: black">Hotline: <span style="color: red">0988196169</span></p>
        <p style="color: black">Cảm ơn Quý khách đã tin tưởng và sử dụng dịch vụ của Công ty TNHH TMDV Hoa
            Technology!</p>
    </div>
    <div style="text-align: center; background-color: #368ee0;color: white; padding: 0.25rem">
        <p>Công ty TNHH TMDV Hoa Technology</p>
        <p>Địa chỉ: 102B, Tăng Nhơn Phú, Tăng Nhơn Phú B, Quận 9, Tp.Hồ Chí Minh</p>
        <p>
            Hotline: 0988196169 Website: <a href="http://me.hoatech.vn" style="color: white">http://me.hoatech.vn</a>
        </p>
    </div>

</div>

