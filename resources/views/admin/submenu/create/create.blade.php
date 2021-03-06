@extends('admin.layouts.master')
@section('breadcrumbs')
    {!! Breadcrumbs::render('sub_create_create',$item->id) !!}
@endsection
@section('content')
    <br>
        <div class="panel panel-default">
            <div class="panel-heading">
                Добавить sub меню
            </div>
            <div class="panel-body">
                <form method="post" action="{{ route('admin.menu.store') }}" enctype="multipart/form-data">
                    {{ Form::token() }}
                    <div class="form-group">
                        <label for="title">Имя</label>
                        <input name="title" class="form-control" type="text" id="title" >
                    </div>
                    <div class="form-group">
                        <label for="title">Имя(kg)</label>
                        <input name="titleKg" class="form-control" type="text" id="title" >
                    </div>
                    <div class="form-group">
                        {{ Form::label('radio', 'Добавить файл (word,pdf) ') }}
                        <input v-model="radio" type="checkbox" name="radio" value="1" v-on:click="fileIsUp()">
                    </div>
                    <div v-if="seen" class="form-group">
                        {{ Form::label('file', 'Выберите файл') }}
                        {{ Form::file('file', ['class'=>'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('radio', 'Добавить файл(kg) (word,pdf) ') }}
                        <input v-model="radioKg" type="checkbox" name="radioKg" value="1" v-on:click="fileIsUpKg()">
                    </div>
                    <div v-if="seenKg" class="form-group">
                        {{ Form::label('file', 'Выберите файл') }}
                        {{ Form::file('file1', ['class'=>'form-control']) }}
                    </div>
                    <div class="form-group">
                        <label for="input">Контент</label>
                        <textarea name="content" id="input" class="fom-control" rows="15">
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="input">Контент(kg)</label>
                        <textarea name="contentKg" id="input" class="fom-control" rows="15">
                        </textarea>
                    </div>
                    <div class="form-group">
                       <input type="hidden" name="relation" value="{{ $item->id }}">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Добавить</button>
                    </div>
                </form>
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
                radioKg:0
            },
            computed: {
                fileIsUp: function () {
                    if (this.radio == 1){
                        this.seen = true
                    }
                    else {
                        this.seen = false
                    }
                },
                fileIsUpKg: function () {
                    if (this.radioKg == 1){
                        this.seenKg = true
                    }
                    else {
                        this.seenKg = false
                    }
                }
            }
        })
    </script>
@endsection