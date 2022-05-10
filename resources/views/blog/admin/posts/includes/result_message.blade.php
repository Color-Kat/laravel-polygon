@php
    /** @var \Illuminate\Support\ViewErrorBag $errors */
@endphp

@if($errors->any())
    <div class="justify-content-center row">
        <div class="col-md-11">
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif

@if(session('success'))
    <div class="justify-content-center row">
        <div class="col-md-11">
            <div class="alert alert-success" role="alert">
                {{session()->get('success')}}
            </div>
        </div>
    </div>
@endif
