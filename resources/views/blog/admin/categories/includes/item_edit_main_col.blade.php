@php
    /** @var \App\Models\BlogCategory $item */
    /** @var \Illuminate\Database\Eloquent\Collection $categoryList */
@endphp
<div class="justify-content-center row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title"></div>

                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="#maindata" data-toggle="tab" role="tab" class="nav-link active">Основные данные</a>
                    </li>
                </ul>

                <br>

                <div class="tab-content">
                    <div class="tab-pane active" id="maindata" role="tabpanel">
                        <div class="form-group">
                            <lavel for="title">Заголовок</lavel>
                            <input
                                name="title"
                                value="{{old('title', $item->title)}}"
                                id="title"
                                class="form-control"
                                minlength="3"
                                required
                                type="text"
                            >
                        </div>

                        <div class="form-group">
                            <lavel for="slug">Индетификатор</lavel>
                            <input
                                name="slug"
                                value="{{old('slug', $item->slug)}}"
                                id="slug"
                                class="form-control"
                                type="text"
                            >
                        </div>

                        <div class="form-group">
                            <lavel for="parent_id">Родитель</lavel>
                            <select
                                name="parent_id"
                                id="parent_id"
                                class="form-control"
                            >
                                @foreach($categoryList as $categoryOption)
                                    <option value="{{$categoryOption->id}}"
                                            @if($categoryOption->id == $item->parent_id) selected @endif
                                    >
{{--                                        {{$categoryOption->id}}. {{$categoryOption->title}}--}}
                                        {{$categoryOption->title}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <lavel for="description">Описание</lavel>

                            {{--     Take old insered data by withInput() in controller@update     --}}
                            <textarea
                                name="description"
                                id="description"
                                class="form-control"
                                type="text"
                                rows="3"
                            >{{old('description', $item->description)}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
