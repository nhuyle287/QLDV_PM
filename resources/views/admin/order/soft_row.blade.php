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

            {{--                        <th class="thstyleform">&nbsp;</th>--}}
        </tr>
        </thead>
        <tbody>
        @forelse($register_softs as $register_soft)
            <tr>
                <td class="thstyleform"><input type="checkbox" class="btn-check"
                                               value="{{ $register_soft->id }}"></td>
                <td class="thstyleform">{{$register_soft->id}}</td>
                <td class="thstyleform">{{$register_soft->customer_name}}
                    <p class="pstyleform1">{{$register_soft->customer_email}}</p>
                </td>
                {{--                            <td class="thstyleform">{{$register_soft->staff_name}}</td>--}}
                <td class="thstyleform">{{$register_soft->software}}</td>
                <td class="thstyleform">{{$register_soft->typesoftware}}</td>
                <td class="thstyleform">{{$register_soft->status}}</td>
                <td class="thstyleform">
                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal"
                            data-target="#viewModal{{ $register_soft->id }}">
                        {{ __('general.view') }}
                    </button>
                    <div class="modal fade" id="viewModal{{ $register_soft->id }}"
                         tabindex="-1"
                         role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"
                                        id="exampleModalLabel">{{ __('order.order_soft') }}</h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table
                                        class="table table-bordered table-striped table-hover">
                                        <tbody>
                                        <tr>
                                            <td>{{ __('order.ID') }}</td>
                                            <td>{{ $register_soft->id }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('order.name_soft') }}</td>
                                            <td>{{$register_soft->software}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('order.name_customer') }}</td>
                                            <td>{{ $register_soft->customer_name }}</td>
                                        </tr>


                                        <tr>
                                            <td>{{ __('order.domain_address') }}</td>
                                            <td>{{ $register_soft->address_domain }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('order.start_date') }}</td>
                                            <td>{{date('d-m-Y', strtotime($register_soft->start_date))}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('order.end_date') }}</td>
                                            <td>{{date('d-m-Y', strtotime( $register_soft->end_date)) }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('order.status') }}</td>
                                            <td>{{ $register_soft->status }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('order.deal') }}</td>
                                            <td>{{ucfirst(array_search($register_soft->transaction,\App\Models\ConstantsModel::TRANSACTION_SERVICES))}}</td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">{{ __('general.close') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @can('order-software-update')
                        @if($register_soft->transaction==0)
                            <button id="btnStatus" type="button" class="btn btn-sm btn-secondary"
                                    data-id="{{$register_soft->id}}"
                                    data-transaction="{{$register_soft->transaction}}"
                                    data-toggle="modal"
                                    data-target="#myModal"> {{ucfirst(array_search($register_soft->transaction,$transaction_soft))}}</button>
                        @endif
                        @if($register_soft->transaction==1)
                            <button id="btnStatus" type="button" class="btn btn-sm btn-danger"
                                    data-id="{{$register_soft->id}}"
                                    data-transaction="{{$register_soft->transaction}}"
                                    data-toggle="modal"
                                    data-target="#myModal"> {{ucfirst(array_search($register_soft->transaction,$transaction_soft))}}</button>
                        @endif
                        @if($register_soft->transaction==2)
                            <button id="btnStatus" type="button" class="btn btn-sm btn-success"
                                    data-id="{{$register_soft->id}}"
                                    data-transaction="{{$register_soft->transaction}}"
                                    data-toggle="modal"
                                    data-target="#myModal"> {{ucfirst(array_search($register_soft->transaction,$transaction_soft))}}</button>
                        @endif
                    @endcan
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
                                        <option value="" selected disabled hidden>Cập nhật giao
                                            dịch
                                        </option>
                                        <option value="{{$transaction}}"

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
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            Close
                        </button>
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
