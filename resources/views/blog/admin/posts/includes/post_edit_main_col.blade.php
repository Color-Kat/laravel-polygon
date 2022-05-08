@php
    /** @var \App\Models\BlogPost $item */
    /** @var \Illuminate\Database\Eloquent\Collection $categoryList */

@endphp
<div class="justify-content-center row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    @if($item->is_published)
                        Опубликовано
                    @else
                        Черновик
                    @endif
                </div>

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="maindata-tab" data-toggle="tab" href="#maindata" role="tab"
                           aria-controls="maindata" aria-selected="true">Основные данные</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="adddata-tab" data-toggle="tab" href="#adddata" role="tab"
                           aria-controls="adddata" aria-selected="false">Доп. данные</a>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    {{--          MAIN DATA          --}}
                    <div class="tab-pane fade show active" id="maindata" role="tabpanel" aria-labelledby="maindata-tab">
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
                            <lavel for="description">Текст статьи</lavel>

                            <textarea
                                name="content_raw"
                                id="content_raw"
                                class="form-control"
                                type="text"
                                rows="20"
                            >{{old('content_raw', $item->content_raw)}}</textarea>
                        </div>
                    </div>

                    {{--          ADDITIONAL DATA          --}}
                    <div class="tab-pane fade" id="adddata" role="tabpanel" aria-labelledby="adddata-tab">
                        <div class="form-group">
                            <lavel for="category_id">Категория</lavel>
                            <select
                                name="category_id"
                                id="category_id"
                                class="form-control"
                            >
                                @foreach($categoryList as $categoryOption)
                                    <option value="{{$categoryOption->id}}"
                                            @if($categoryOption->id == $item->category_id) selected @endif
                                    >
                                        {{$categoryOption->id_title}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <lavel for="slug">Идентификатор</lavel>
                            <input
                                name="slug"
                                value="{{old('slug', $item->slug)}}"
                                id="slug"
                                class="form-control"
                                type="text"
                            >
                        </div>

                        <div class="form-group">
                            <lavel for="excerpt">Выдержка</lavel>

                            <textarea
                                name="excerpt"
                                id="excerpt"
                                class="form-control"
                                type="text"
                                rows="3"
                            >{{old('excerpt', $item->excerpt)}}</textarea>
                        </div>

                        <div class="form-check">
                            {{--     For default value     --}}
                            <input type="hidden" value="0" name="is_published">

                            <input
                                name="is_published"
                                type="checkbox"
                                class="form-check-input"
                                value="{{$item->is_published}}"
                                @if($item->is_published) checked @endif
                            >

                            <div class="form-check-label" for="is_published">Опубликовано</div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
