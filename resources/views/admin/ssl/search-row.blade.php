<div class="grid-container" id="domains">
    @forelse($ssls as $ssl)
        <div class="card card-sytle">
            {{--                                <div class="card-img-top" style="background-image: url({{ 'storage/'. $hosting->images }});" ></div>--}}
            <div class="card-body">
                <strong style="color: #fb6901fa" class="card-text">{{strtoupper($ssl->name)}}</strong>
                <p class="card-text">Giá: {{$ssl->price}}</p>
                <p class="card-text">Insurance Policy: {{$ssl->insurance_policy}}</p>
                <p class="card-text">Domain Number:{{$ssl->domain_number}}</p>
                <p class="card-text">Reliability:{{$ssl->reliability}}</p>
                <p class="card-text">Green Bar:{{$ssl->green_bar}}</p>
                <p class="card-text">Sans:{{$ssl->sans}}</p>
                <div style="text-align: center">
                    <button type="button" class="btn btn-xs btn-info" data-toggle="modal"
                            data-target="#viewModal{{ $ssl->id }}">
                        {{ __('general.view') }}
                    </button>
                    <div class="modal fade" id="viewModal{{ $ssl->id }}" tabindex="-1"
                         role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"
                                        id="exampleModalLabel">SSL</h5>
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
                                            <td>STT</td>
                                            <td>{{ $ssl->id }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tên hosting</td>
                                            <td>{{ $ssl->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Giá</td>
                                            <td>{{ $ssl->price }}</td>
                                        </tr>
                                        <tr>
                                            <td>Bảo hiểm</td>
                                            <td>{{ $ssl->insurance_policy }}</td>
                                        </tr>
                                        <tr>
                                            <td>Số lượng tên miền</td>
                                            <td>{{ $ssl->domain_number }}</td>
                                        </tr>
                                        <tr>
                                            <td>Độ tin cậy</td>
                                            <td>{{ $ssl->reliability }}</td>
                                        </tr>
                                        <tr>
                                            <td>Geen bar</td>
                                            <td>{{ $ssl->green_bar }}</td>
                                        </tr>
                                        <tr>
                                            <td>Sans</td>
                                            <td>{{ $ssl->sans }}</td>
                                        </tr>
                                        <tr>
                                            <td>Ghi chú</td>
                                            <td>{{ $ssl->notes }}</td>
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
                    @can('ssl-update')
                        <a href="{{route('admin.ssls.edit', [$ssl->id])}}"
                           class="btn btn-xs btn-success">{{ __('general.edit') }}</a>
                    @endcan
                    @can('ssl-delete')
                        <button type="button" class="btn btn-xs btn-danger" data-toggle="modal"
                                data-target="#deleteItemModal{{ $ssl->id }}">
                            {{ __('general.delete') }}
                        </button>
                        <form action="{{ route('admin.ssls.destroy') }}" method="POST">
                            @csrf
                            <div class="modal fade" id="deleteItemModal{{ $ssl->id }}"
                                 tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"
                                                id="exampleModalLabel">SSL</h5>
                                            <button type="button" class="close"
                                                    data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="text" name="id" value="{{ $ssl->id }}"
                                                   style="display: none">
                                            <p>{{ __('general.confirm_delete') }}</p>
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


                </div>
            </div>
        </div>
    @empty
    @endforelse
</div>


<div class="text-right">

    {{ $ssls->links() }}
</div>
