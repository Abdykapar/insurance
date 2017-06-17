@extends('admin.layouts.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Наши партнеры</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-10">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Изменить
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">

                            <form role="form" method="post" action="{{ route('admin.partners.image.update',$partner->id) }}" enctype="multipart/form-data">
                                {{ Form::token() }}
                                <div class="form-group">
                                    <label>Url: </label>
                                    <input class="form-control" placeholder="" name="url" value="{{ $partner->name }}">
                                </div>
                                <img src="/uploads/partners/{{ $partner->logo }}" class="img img-responsive img-rounded" alt="Cinque Terre" width="200px" height="200px">
                                <br>
                                <input type="file" name="image" value="{{ $partner->logo }}" >
                                <button type="submit" class="btn btn-default">Сохранить</button>
                            </form>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
@endsection