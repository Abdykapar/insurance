@extends('admin.layouts.master')
@section('breadcrumbs')
    {!! Breadcrumbs::renderIfExists('sub_edit',$submenu->id) !!}
@endsection
@section('content')
    <br>
        <div class="panel panel-default">
            <div class="panel-heading">
                Изменить меню
            </div>
            <div class="panel-body" id="app">
                {{ Form::model($submenu, ['route' => ['admin.menu.update',$submenu->id],'files' => true,'method' => 'put']) }}
                    {{ Form::token() }}
                    <div class="form-group">
                        {{ Form::label('title', 'Тема') }}
                        {{ Form::text('title', $submenu->name,['class'=>'form-control']) }}
                    </div>
                <div class="form-group">
                    {{ Form::label('title', 'Тема(kg)') }}
                    {{ Form::text('titleKg', $submenu->nameKg,['class'=>'form-control']) }}
                </div>
                    <div class="form-group">
                        {{ Form::label('radio', 'Изменить файл (word,pdf) ') }}
                        <input v-model="radio" type="checkbox" name="radio" value="1" v-on:click="fileIsUp()">
                    </div>
                    @if($file!='')
                        <p>{{ $file->original_name }}</p>
                    @endif
                    <div v-if="seen" class="form-group">
                        {{ Form::label('file', 'Выберите файл') }}
                        {{ Form::file('file', ['class'=>'form-control']) }}
                    </div>
                <div class="form-group">
                    {{ Form::label('radio', 'Изменить файл(kg) (word,pdf) ') }}
                    <input v-model="radioKg" type="checkbox" name="radioKg" value="1" v-on:click="fileIsUpKg()">
                </div>
                @if($file1!='')
                    <p>{{ $file1->original_name }}</p>
                @endif
                <div v-if="seenKg" class="form-group">
                    {{ Form::label('file', 'Выберите файл(kg)') }}
                    {{ Form::file('file1', ['class'=>'form-control']) }}
                </div>
                    <div class="form-group">
                        {{ Form::label('input', 'Контент') }}
                        <textarea name="content" id="input" class="fom-control" rows="8">
                            {{ $submenu->content }}
                        </textarea>
                    </div>
                <div class="form-group">
                    {{ Form::label('input', 'Контент(kg)') }}
                    <textarea name="contentKg" id="input" class="fom-control" rows="8">
                            {{ $submenu->contentKg }}
                        </textarea>
                </div>
                    <div class="form-group">
                        @if (count($sub))
                            <label for="select">Связь</label>
                            <select class="form-control" id="select" name="relation">
                                <option value="0">Нет</option>
                                @foreach($sub as $all)
                                    @if ($all->id == $submenu->relation)
                                        <option selected class="active" value="{{ $all->id }}">{{ $all->name }}</option>
                                    @else
                                        <option value="{{ $all->id }}">{{ $all->name }}</option>
                                    @endif
                                @endforeach

                            </select>
                        @endif
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Изменить</button>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    <script src="{{ URL::to('/tinymce/js/tinymce/tinymce.min.js') }}"></script>
    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    <script>
        var editor_config = {
            path_absolute : "/",
            selector: "textarea",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
            file_browser_callback : function(field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file : cmsURL,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no"
                });
            }
        };

        tinymce.init(editor_config);
    </script>
    <script src="/vue/vue.js"></script>
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                message: 'Hello Vue!',
                seen: false,
                seenKg: false,
                radio: 0,
                radioKg: 0,
            },
            computed: {
                fileIsUp: function () {
                    if (this.radio == 1){
                        this.seen = false
                    }
                    else {
                        this.seen = true
                    }
                },
                fileIsUpKg: function () {
                    if (this.radioKg == 1){
                        this.seenKg = false
                    }
                    else {
                        this.seenKg = true
                    }
                }
            }
        })
    </script>
@endsection