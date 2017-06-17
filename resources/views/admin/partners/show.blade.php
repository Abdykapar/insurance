@extends('admin.layouts.master')
@section('breadcrumbs')
    {!! Breadcrumbs::renderIfExists('') !!}
@endsection
@section('content')
        <div class="col-lg-12">
            <h1 class="page-header">{{ $partner->name }}</h1>
        </div>
        <!-- /.col-lg-12 -->
        <div class="col-lg-12">
            <div class="panel-body">
                {!! $partner->content  !!}
            </div>
            <!-- /.panel-body -->
            <div class="panel-footer" style="margin-bottom: 6px">
                <div class="row">
                    <div class="col-md-6">
                        <div class="btn-group">
                            <a href="{{ route('admin.partners.edit',$partner->id) }}">
                                <button type="button" class="btn btn-success  btn-md" data-toggle="tooltip" title="Изменить">
                                    <i class="fa fa-edit" style="color: white"></i>
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
@endsection