@php
    /** @var \App\Models\BlogCategory $item */
    /** @var \Illuminate\Database\Eloquent\Collection $categoryList */
@endphp

<div class="justify-content-center row pb-1">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </div>
    </div>
</div>

@if($item->exists)
    <div class="justify-content-center row mb-1">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li>ID: {{$item->id}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="justify-content-center row mb-1">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <lavel for="title">Создано</lavel>
                        <input type="text" value="{{$item->created_at}}" class="form-control" disabled>
                    </div>

                    <div class="form-group">
                        <lavel for="title">Изменено</lavel>
                        <input type="text" value="{{$item->updated_at}}" class="form-control" disabled>
                    </div>

                    <div class="form-group">
                        <lavel for="title">Опубликовано</lavel>
                        <input type="text" value="{{$item->published_at}}" class="form-control" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
