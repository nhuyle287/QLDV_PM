<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
            <th style="width: 10px"><input type="checkbox" id="check-all"></th>
            <th class="thstyleform">{{__('order.ID')}}</th>
            <th class="thstyleform">
                {{__('order.name_customer')}}
            </th>
            <th class="thstyleform">{{__('order.name_service')}}</th>
            <th class="thstyleform">{{__('order.deal')}}</th>
        </tr>
        </thead>
        <tbody>
        <?php $stt = 1?>
        @forelse($register_services as $register_service)
            <tr>
                <td><input type="checkbox" class="btn-check" value="{{ $register_service->id }}"></td>
                <td class="thstyleform">{{$stt++}}</td>
                <td class="thstyleform">{{$register_service->customer_name}}
                    <p class="pstyleform1">{{$register_service->customer_email}}</p></td>
                <td class="thstyleform">{{$register_service->domain_name}}{{$register_service->hosting_name}}{{$register_service->vps_name}}{{$register_service->email_name}}{{$register_service->ssl_name}}{{$register_service->website_name}}
                    <p class="pstyleform1">{{$register_service->address_domain}}</p></td>

                <td class="thstyleform">
                    <button id="btnStatus" type="button" class="btn btn-primary"
                            data-id="{{$register_service->id}}"
                            data-transaction="{{$register_service->transaction}}"
                            data-toggle="modal"
                            data-target="#myModal"> {{ucfirst(array_search($register_service->transaction,$transaction_services))}}</button>
                </td>

            </tr>
        @empty

        @endforelse
        {{--cập nhật tình trạng --}}
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Cập nhật trạng thái</h4>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="{{route('admin.order.updatetservices')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id" id="id" value="">
                            <div class="form-group">

                                <select
                                    class="form-control" name="transaction" id="transaction">
                                    @foreach($transaction_services as $transaction)
                                        <option value="" selected disabled hidden>Cập nhật giao dịch
                                        </option>
                                        <option value="{{$transaction}}">
                                            {{ucfirst(array_search($transaction,$transaction_services))}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group">
                            </div>
                            <button style="background: green;color: white;" type="submit"
                                    class="btn btn-default">Save
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
        </tbody>
    </table>
</div>
<div class="clearfix">
    <div class="text-right" style="float: right ; margin-top: 5px" id="page">
        {{ $register_services->links() }}
    </div>
</div>
