@extends('admin.layouts.master')

@section('content')
    <div class="col-md-10">
        <div class="box box-solid">
            <div class="box-header with-border">
                <i class="fa fa-text-width"></i>

                <h3 class="box-title">{{ $feedback->name }}</h3>
                <h4 class="box-title">{{ $feedback->subject }}</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                {!! $feedback->content !!}
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                {{ $feedback->created_at }}
                <a href="{{ route('admin.feedback.delete',$feedback->id) }}">
                       <span class="pull-right-container">
                          <span class="fa  fa-minus-square pull-right"> Удалить</span>
                       </span>
                </a>
            </div>
        </div>
        <!-- /.box -->
    </div>
@endsection