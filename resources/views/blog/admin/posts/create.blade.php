@extends('layouts.app')

@section('content')
    @php
        /** @var \App\Models\BlogPost $item */
        /** @var \Illuminate\Database\Eloquent\Collection $categoryList */
    @endphp

    @include('blog.admin.posts.edit')

@endsection
