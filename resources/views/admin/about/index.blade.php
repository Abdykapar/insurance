@extends('admin.layouts.master')

@section('breadcrumbs')
    {!! Breadcrumbs::renderIfExists($a) !!}
@endsection
@section('content')
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <i class="fa fa-text-width"></i>

                <h3 class="box-title">{{ $about->name }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                {!! $about->content !!}
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                {{ $about->created_at }}
               <a href="{{ route('admin.about.edit',$about->id) }}">
                   <span class="pull-right-container">
                      <span class="fa fa-edit pull-right"> Изменить</span>
                   </span>
               </a>
            </div>
        </div>
        <!-- /.box -->
    </div>
@endsection