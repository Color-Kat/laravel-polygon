@extends('layouts.app')

@section('content')
    @php
        /** @var \App\Models\BlogPost $item */
        /** @var \Illuminate\Database\Eloquent\Collection $categoryList */
    @endphp

    <div class="container">
        @if($item->exists)
            <form method="POST" action="{{route('blog.admin.posts.update', $item->id)}}">
            @method('PATCH')
        @else
            <form method="POST" action="{{route('blog.admin.posts.store')}}">
        @endif
                @csrf
                @include('blog.admin.posts.includes.result_message')

                <div class="row justify-content-center">
                    <div class="col-md-8">
                        @include('blog.admin.posts.includes.post_edit_main_col')
                    </div>
                    <div class="col-md-3">
                        @include('blog.admin.posts.includes.post_edit_add_col')
                    </div>
                </div>
            </form>

        @if($item->exists)
            <form method="POST" action="{{route('blog.admin.posts.destroy', $item->id)}}">
                @method('DELETE')
                @csrf

                <div class="row justify-content-center mt-2">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <button class="btn btn-danger" type="submit">Удалить</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">

                    </div>
                </div>

            </form>
        @endif
    </div>

@endsection
