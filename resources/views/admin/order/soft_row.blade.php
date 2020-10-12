<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
            <th style="width: 10px"><input type="checkbox" id="check-all"></th>
            <th class="thstyleform">{{__('order.ID')}}</th>
            <th class="thstyleform">{{__('order.name_customer')}}</th>
            <th class="thstyleform">{{__('order.name_soft')}}</th>
            <th class="thstyleform">{{__('order.category_soft')}}</th>
            <th class="thstyleform">{{__('order.status')}}</th>

            <th class="thstyleform">{{__('order.deal')}}</th>


        </tr>
        </thead>
        <tbody>

        @forelse($register_softs as $register_soft)
        <tr>
            <td class="thstyleform"><input type="checkbox" class="btn-check" value="{{ $register_soft->id }}"></td>
            <td class="thstyleform">{{$register_soft->id}}</td>
            <td class="thstyleform">{{$register_soft->customer_name}}
                <p class="pstyleform1">{{$register_soft->customer_email}}</p>
            </td>

            <td class="thstyleform">{{$register_soft->software}}</td>
            <td class="thstyleform">{{$register_soft->typesoftware}}</td>
            <td class="thstyleform">{{$register_soft->status}}</td>
            <td class="thstyleform">
                <button id="btnStatus" type="button" class="btn btn-primary"
                        data-id="{{$register_soft->id}}"
                        data-transaction="{{$register_soft->transaction}}"
                        data-toggle="modal"
                        data-target="#myModal"> {{ucfirst(array_search($register_soft->transaction,$transaction_soft))}}</button>
            </td>

        </tr>
        @empty
        <tr>
            <td colspan="9" class="text-center">{{ __('general.nodata') }}</td>
        </tr>
        @endforelse

        {{--cập nhật tình trạng --}}
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Cập nhật giao dịch</h4>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="{{route('admin.order.updatetssoft')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id" id="id" value="">
                            <div class="form-group">

                                <select
                                    class="form-control" name="transaction" id="transaction">
                                    @foreach($transaction_soft as $transaction)
                                    <option value="" selected disabled hidden>Cập nhật giao dịch
                                    </option>
                                    <option value="{{$transaction}}"
                                            @if($register_soft->id && $transaction==$register_soft->transaction) selected @endif>
                                        {{ucfirst(array_search($transaction,$transaction_soft))}}</option>
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
        {{ $register_softs->links() }}
    </div>
</div>
