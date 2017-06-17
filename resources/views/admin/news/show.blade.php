@extends('admin.layouts.master')

@section('content')
    <div class="col-md-10">
        <div class="box box-solid">
            <div class="box-header with-border">
                <i class="fa fa-text-width"></i>

                <h3 class="box-title">{{ $new->name }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                {!! $new->content !!}
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                {{ $new->created_at }}
                <a href="{{ route('admin.news.show',$new->id) }}">
                   <span class="pull-right-container">
                      <span class="fa fa-edit pull-right"> Изменить</span>
                   </span>
                </a>
                <a href="{{ route('admin.news.delete',$new->id) }}">
                       <span class="pull-right-container">
                          <span class="fa  fa-minus-square pull-right"> Удалить</span>
                       </span>
                </a>
            </div>
        </div>
        <!-- /.box -->
    </div>
@endsection