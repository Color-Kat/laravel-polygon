@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="justify-content-center row">
            <div class="col-md-12">
                <button class="btn-primary rounded-3 p-1">
                    <a class="link-light" href="{{ route('blog.admin.categories.create') }}">Создать</a>
                </button>

                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Категория</th>
                                    <th>Родитель</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($paginator as $item)
                                    @php /** @var \App\Models\BlogCategory $item */ @endphp
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->title}}</td>
                                        <td>{{$item->parent_id}}</td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
