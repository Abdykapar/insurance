@extends('admin.layouts.master')

@section('content')
    <div class="col-lg-6">
        <br>
        @if(Session::has('success'))
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                <div class="alert-box success">
                    <p>{!! Session::get('success') !!}</p>
                </div>
                {{ Session::forget('success') }}
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ $partner->name }}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel-body">
                <img src="/uploads/partners/{{ $partner->logo }}" class="img img-responsive img-rounded" alt="Cinque Terre" width="200px" height="200px">
                <br>
            </div>
            <!-- /.panel-body -->
            <div class="panel-footer" style="margin-bottom: 6px">
                <div class="row">
                    <div class="col-md-6">
                        <div class="btn-group">
                            <a href="{{ route('admin.partners.image.edit',$partner->id) }}">
                                <button type="button" class="btn btn-success btn-md" data-toggle="tooltip" title="Изменить">
                                    <i class="fa fa-edit" style="color: white"></i>
                                </button>
                            </a>
                            <a href="{{ route('admin.partners.image.delete',$partner->id) }}">
                                <button type="button" class="btn btn-warning  btn-md" data-toggle="tooltip" title="Удалить">
                                    <i class="fa fa-times"></i>
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="right" style="float:right ">
                            {{ $partner->created_at }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
@endsection