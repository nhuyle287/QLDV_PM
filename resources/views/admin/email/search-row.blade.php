<div class="grid-container" id="domains">
    @forelse($emails as $email)
        <div class="card card-sytle">
            {{--                                <div class="card-img-top" style="background-image: url({{ 'storage/'. $hosting->images }});" ></div>--}}
            <div class="card-body">
                <strong style="color: rgba(251,105,1,0.98)" class="card-text">{{$email->name}}</strong>
                <p class="card-text">Giá: {{$email->price}}</p>
                <p class="card-text">Dung lượng: {{$email->capacity}}</p>
                <p class="card-text">Email Number:{{$email->email_number}}</p>
                <p class="card-text">Email Forwarder:{{$email->email_forwarder}}</p>
                <p class="card-text">Email List:{{$email->email_list}}</p>
                <p class="card-text">Parked-domains:{{$email->parked_domains}}</p>
                <div style="text-align: center">
                    <button type="button" class="btn btn-xs btn-info" data-toggle="modal"
                            data-target="#viewModal{{ $email->id }}">
                        {{ __('general.view') }}
                    </button>
                    <div class="modal fade" id="viewModal{{ $email->id }}" tabindex="-1"
                         role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"
                                        id="exampleModalLabel">Email</h5>
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
                                            <td>{{ $email->id }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tên email</td>
                                            <td>{{ $email->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Giá</td>
                                            <td>{{ $email->price }}</td>
                                        </tr>
                                        <tr>
                                            <td>Dung lượng</td>
                                            <td>{{ $email->capacity }}</td>
                                        </tr>
                                        <tr>
                                            <td>Số lượng email</td>
                                            <td>{{ $email->email_number }}</td>
                                        </tr>
                                        <tr>
                                            <td>Số lượng email forrwarder</td>
                                            <td>{{ $email->email_forwarder }}</td>
                                        </tr>
                                        <tr>
                                            <td>Danh sách email</td>
                                            <td>{{ $email->email_list }}</td>
                                        </tr>
                                        <tr>
                                            <td>Park domains</td>
                                            <td>{{ $email->parked_domains }}</td>
                                        </tr>

                                        <tr>
                                            <td>Ghi chú</td>
                                            <td>{{ $email->notes }}</td>
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
                    @can('email-update')
                        <a href="{{route('admin.emails.edit', [$email->id])}}"
                           class="btn btn-xs btn-success">{{ __('general.edit') }}</a>
                    @endcan
                    @can('email-delete')
                        <button type="button" class="btn btn-xs btn-danger" data-toggle="modal"
                                data-target="#deleteItemModal{{ $email->id }}">
                            {{ __('general.delete') }}
                        </button>
                        <form action="{{ route('admin.emails.destroy') }}" method="POST">
                            @csrf
                            <div class="modal fade" id="deleteItemModal{{ $email->id }}"
                                 tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"
                                                id="exampleModalLabel">Email</h5>
                                            <button type="button" class="close"
                                                    data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="text" name="id" value="{{ $email->id }}"
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
    {{--hien thi phan trang--}}
    {{ $emails->links() }}
</div>
