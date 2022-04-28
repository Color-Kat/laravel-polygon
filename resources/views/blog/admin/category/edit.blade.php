@extends('layouts.app')

@section('content')
    @php /** @var \App\Models\BlogPost $item */ @endphp
    <form method="POST" action="{{route('blog.admin.categories.update', $item->id)}}">
        @method('PATCH')
        @csrf

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">

                </div>
                <div class="col-md-3"></div>
            </div>
        </div>

    </form>
@endsection
