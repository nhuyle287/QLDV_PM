<div class="grid-container" id="domains">
    @forelse($hostings as $hosting)
        <div class="card card-sytle">
            {{--                                <div class="card-img-top" style="background-image: url({{ 'storage/'. $hosting->images }});" ></div>--}}
            <div class="card-body">
                <strong style="color: #fb6901fa" class="card-text">{{strtoupper($hosting->name)}}</strong>
                <p class="card-text">Giá: {{$hosting->price}}</p>
                <p class="card-text">Dung lượng: {{$hosting->capacity}}</p>
                <p class="card-text">Băng thông:{{$hosting->bandwith}}</p>
                <div style="text-align: center">
                    <button type="button" class="btn btn-xs btn-info" data-toggle="modal"
                            data-target="#viewModal{{ $hosting->id }}">
                        {{ __('general.view') }}
                    </button>
                    <div class="modal fade" id="viewModal{{ $hosting->id }}" tabindex="-1"
                         role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"
                                        id="exampleModalLabel">Hosting</h5>
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
                                            <td>{{ $hosting->id }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tên hosting</td>
                                            <td>{{ $hosting->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Giá</td>
                                            <td>{{ $hosting->price }}</td>
                                        </tr>
                                        <tr>
                                            <td>Dung lượng</td>
                                            <td>{{ $hosting->capacity }}</td>
                                        </tr>
                                        <tr>
                                            <td>Băng thông</td>
                                            <td>{{ $hosting->bandwith }}</td>
                                        </tr>
                                        <tr>
                                            <td>Sub Domain</td>
                                            <td>{{ $hosting->sub_domain }}</td>
                                        </tr>
                                        <tr>
                                            <td>Số lượng email</td>
                                            <td>{{ $hosting->email }}</td>
                                        </tr>
                                        <tr>
                                            <td>Ftp</td>
                                            <td>{{ $hosting->ftp }}</td>
                                        </tr>
                                        <tr>
                                            <td>Database</td>
                                            <td>{{ $hosting->database }}</td>
                                        </tr>
                                        <tr>
                                            <td>Adddon Domain</td>
                                            <td>{{ $hosting->adddon_domain }}</td>
                                        </tr>
                                        <tr>
                                            <td>Park Domain</td>
                                            <td>{{ $hosting->park_domain }}</td>
                                        </tr>
                                        <tr>
                                            <td>Ghi chú</td>
                                            <td>{{ $hosting->notes }}</td>
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
                    @can('hosting-update')
                        <a href="{{route('admin.hostings.edit', [$hosting->id])}}"
                           class="btn btn-xs btn-success">{{ __('general.edit') }}</a>
                    @endcan
                    @can('domain-delete')
                        <button type="button" class="btn btn-xs btn-danger" data-toggle="modal"
                                data-target="#deleteItemModal{{ $hosting->id }}">
                            {{ __('general.delete') }}
                        </button>
                        <form action="{{ route('admin.hostings.destroy') }}" method="POST">
                            @csrf
                            <div class="modal fade" id="deleteItemModal{{ $hosting->id }}"
                                 tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"
                                                id="exampleModalLabel">Hosting</h5>
                                            <button type="button" class="close"
                                                    data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="text" name="id" value="{{ $hosting->id }}"
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

    {{ $hostings->links() }}
</div>
