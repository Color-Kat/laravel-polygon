@php
    /** @var \App\Models\BlogPost $item */
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

{{--                <ul class="nav nav-tabs" id="myTab" role="tablist">--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link active" id="maindata-tab" data-toggle="tab" href="#maindata" role="tab" aria-controls="maindata" aria-selected="true">Основные данные</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" id="adddata-tab" data-toggle="tab" href="#adddata" role="tab" aria-controls="adddata" aria-selected="false">Доп. данные</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}

{{--                <div class="tab-content" id="myTabContent">--}}
{{--                    <div class="tab-pane fade show active" id="maindata" role="tabpanel" aria-labelledby="maindata-tab">...12</div>--}}
{{--                    <div class="tab-pane fade" id="adddata" role="tabpanel" aria-labelledby="adddata-tab">...11111111111111</div>--}}
{{--                </div>--}}

{{--                <br>--}}

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">...1</div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...2</div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...3</div>
                </div>

{{--                <div class="tab-content">--}}
{{--                    <div class="tab-pane active" id="maindata" role="tabpanel">--}}
{{--                        <div class="form-group">--}}
{{--                            <lavel for="title">Заголовок</lavel>--}}
{{--                            <input--}}
{{--                                name="title"--}}
{{--                                value="{{old('title', $item->title)}}"--}}
{{--                                id="title"--}}
{{--                                class="form-control"--}}
{{--                                minlength="3"--}}
{{--                                required--}}
{{--                                type="text"--}}
{{--                            >--}}
{{--                        </div>--}}

{{--                        <div class="form-group">--}}
{{--                            <lavel for="slug">Индетификатор</lavel>--}}
{{--                            <input--}}
{{--                                name="slug"--}}
{{--                                value="{{old('slug', $item->slug)}}"--}}
{{--                                id="slug"--}}
{{--                                class="form-control"--}}
{{--                                type="text"--}}
{{--                            >--}}
{{--                        </div>--}}

{{--                        <div class="form-group">--}}
{{--                            <lavel for="parent_id">Родитель</lavel>--}}
{{--                            <select--}}
{{--                                name="parent_id"--}}
{{--                                id="parent_id"--}}
{{--                                class="form-control"--}}
{{--                            >--}}
{{--                                @foreach($categoryList as $categoryOption)--}}
{{--                                    <option value="{{$categoryOption->id}}"--}}
{{--                                            @if($categoryOption->id == $item->parent_id) selected @endif--}}
{{--                                    >--}}
{{--                                        {{$categoryOption->id}}. {{$categoryOption->title}}--}}
{{--                                        {{$categoryOption->id_title}}--}}
{{--                                    </option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}

{{--                        <div class="form-group">--}}
{{--                            <lavel for="description">Описание</lavel>--}}

{{--                            --}}{{--     Take old insered data by withInput() in controller@update     --}}
{{--                            <textarea--}}
{{--                                name="description"--}}
{{--                                id="description"--}}
{{--                                class="form-control"--}}
{{--                                type="text"--}}
{{--                                rows="3"--}}
{{--                            >{{old('description', $item->description)}}</textarea>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
</div>
