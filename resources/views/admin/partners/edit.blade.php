@extends('admin.layouts.master')

@section('content')
    <div class="col-lg-6">
        @if(Session::has('success'))
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                <div class="alert-box success">
                    <p>{!! Session::get('success') !!}</p>
                </div>

            </div>
        @endif
    </div>
        <div class="col-lg-12">
            <h1 class="page-header">Наши партнеры</h1>
        </div>
        <!-- /.col-lg-12 -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Партнер
            </div>
            <div class="panel-body">
                <form method="post" action="{{ route('admin.partners.update',$partner->id) }}" enctype="multipart/form-data">
                    {{ Form::token() }}
                    <div class="form-group">
                        <label for="title">Тема</label>
                        <input name="title" class="form-control" type="text" id="title" value="{{ $partner->name }}">
                    </div>
                    <div class="form-group">
                        <label for="title">Тема(kg)</label>
                        <input name="titleKg" class="form-control" type="text" id="title" value="{{ $partner->nameKg }}">
                    </div>
                    <div class="form-group">
                        <label for="input">Контент</label>
                        <textarea name="content" id="input" class="fom-control" rows="15">
                            {!! $partner->content !!}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="input">Контент(kg)</label>
                        <textarea name="contentKg" id="input" class="fom-control" rows="15">
                            {!! $partner->contentKg !!}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Изменить</button>
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
@endsection