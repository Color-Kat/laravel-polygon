@extends("layouts.app")

@section('content')
    <div class="container">
        <div class="justify-content-center row">
            <div class="col-md-12">
                <button class="btn-primary rounded-3 p-1 px-3 mb-2">
                    <a class="link-light" href="{{ route('blog.admin.posts.create') }}">Написать</a>
                </button>

                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Автор</th>
                                <th>Категория</th>
                                <th>Заголовок</th>
                                <th>Дата публикации</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($paginator as $item)
                                @php /** @var \App\Models\BlogPost $item */ @endphp
                                <tr @if(!$item->is_published) style="background: #ccc" @endif>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->user->name}}</td>
                                    <td>{{$item->category->title}}</td>
                                    <td>
                                        <a href="{{route('blog.admin.posts.edit', $item->id)}}" class="link-primary">{{$item->title}}</a>
                                    </td>
                                    <td>
                                        {{$item->is_published ? \Carbon\Carbon::parse($item->published_at)->format('d.M H:i') : ''}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot></tfoot>
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
