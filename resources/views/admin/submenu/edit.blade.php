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
            <div class="panel-body">
                {{ Form::model($submenu, ['route' => ['admin.menu.update',$submenu->id],'files' => true,'method' => 'put']) }}
                    {{ Form::token() }}
                    <div class="form-group">
                        {{ Form::label('title', 'Тема') }}
                        {{ Form::text('title', $submenu->name,['class'=>'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('input', 'Контент') }}
                        <textarea name="content" id="input" class="fom-control" rows="15">
                            {{ $submenu->content }}
                        </textarea>
                    </div>
                    <div class="form-group">
                        @if (count($sub))
                            <label for="select">Связь</label>
                            <select class="form-control" id="select" name="relation">
                                <option value="0">Нет</option>
                                @foreach($sub as $all)
                                    @if ($all->id == $submenu->relation)
                                    <option class="active" value="{{ $all->id }}">{{ $all->name }}</option>
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
@endsection