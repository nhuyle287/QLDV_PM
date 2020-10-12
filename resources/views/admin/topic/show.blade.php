@extends('layout.master')

@section('content')

    <section class="content">
        <div class="">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title" style="font-weight: bold; font-size: 200%;">Thông tin chi tiết</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $topic->id }}</td>
                                </tr>
                                <tr>
                                    <th>NAME</th>
                                    <td>{{ $topic->name }}</td>
                                </tr>
                                <tr>
                                    <th>CATEGORY TOPiC</th>
                                        <td> @foreach($category_topic as $category)
                                                @if($topic->category_id==$category->category_id)
                                                    {{$category->name_category}}
                                                @endif
                                            @endforeach
                                        </td>
                                </tr>
                                <tr>
                                    <th>SUPPORT</th>
                                    <td>{{ $topic->support }}</td>
                                </tr>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <a href="{{ route('admin.topic.index') }}" class="btn btn-default">{{ __('general.back') }}</a>


                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

@stop
