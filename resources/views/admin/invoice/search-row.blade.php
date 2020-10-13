{{--                        <div >--}}
{{--                            <div class="row">--}}
{{--                                <p style=" margin-left: 6%; font-size: 25px">Tổng Doanh thu: {{number_format($total_)}}</p>--}}
{{--                                <div class="col-md-12">--}}
{{--                                    {!! $chart->container() !!}--}}
{{--                                </div>--}}
{{--                                {!! $chart->script() !!}--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <br>--}}
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
                    <th class="thstyleform">Chức năng</th>
                </tr>
                </thead>
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

                            <a href="{{route('admin.invoices.invocereceipt',[$register_service->id])}}" class="btn btn-sm btn-info">Xem phiếu thu</a>
                        </td>

                    </tr>
                @empty
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="text-right" id="page">

            {{$register_services->links()}}
        </div>
    </div>
</div>
