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
                    Добавить логотип
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form" method="post" action="{{ route('admin.partners.image.store') }}" enctype="multipart/form-data">
                                {{ Form::token() }}
                                    <div class="col-lg-2">
                                        <label class="form-group" for="url">Url партнера: </label>
                                    </div>

                                    <div class="col-lg-10">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="url" id="url" placeholder="www.partnerlogo.kg">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="file" name="image" class="form-control">
                                </div>
                                <div class="panel-footer">
                                    <button type="submit" class="btn btn-default">Submit</button>
                                </div>
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