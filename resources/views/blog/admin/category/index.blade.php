@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="justify-content-center row">
            <div class="col-md-12">
                <button class="btn-primary rounded-3 p-1 px-3 mb-2">
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
                                    <td>
                                        <a class="link-primary"
                                           href="{{ route('blog.admin.categories.edit', $item->id) }}">{{$item->title}}</a>
                                    </td>
                                    <td>
                                        <span @if(in_array($item->parent_id, [0, 1])) style="color: #ccc" @endif >
                                            {{$item->parent_id}}
                                        </span>
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{--    Display paginator if there is more than one page     --}}
        @if($paginator->total() > $paginator->count())
            <div class="justify-content-center row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            {{$paginator->links()}}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
