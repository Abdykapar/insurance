@extends('admin.layout.master')
@section('css')
    <meta charset="UTF-8">
    <title>Summernote</title>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
@endsection
@section('content')
    <br>
    <div class="row">
    <div class="panel panel-green">
        <div class="panel-heading">
            Создать новост
        </div>
        <div class="panel-body">
            <form method="post" action="{{ url('example') }}" enctype="multipart/form-data">
                {{ Form::token() }}
                <div class="form-group">
                    <label for="title">Тема</label>
                    <input name="title" class="form-control" type="text" id="title">
                </div>
                <div class="form-group">
                    <textarea name="content" id="input" class="fom-control">

                    </textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Создать</button>
                </div>
            </form>
        </div>
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