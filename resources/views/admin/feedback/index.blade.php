@extends('admin.layouts.master')
@section('breadcrumbs')
    {!! Breadcrumbs::renderIfExists('feedback') !!}
@endsection
@section('content')
    <div class="col-md-10">
        @foreach($feedbacks as $new)
            <div class="box box-solid">
                <div class="box-header with-border">
                    <i class="fa fa-text-width"></i>

                    <h3 class="box-title">{{ $new->name }}</h3>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <h4 class="box-title">{{ $new->subject }}</h4>
                    {!! str_limit($new->content,400) !!}
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    {{ $new->created_at }}
                    <a href="{{ route('admin.feedback.show',$new->id) }}">
                           <span class="pull-right-container">
                              <span class="fa fa-list-alt pull-right"> Показать</span>
                           </span>
                    </a>
                    <a href="{{ route('admin.feedback.delete',$new->id) }}">
                       <span class="pull-right-container">
                          <span class="fa  fa-minus-square pull-right"> Удалить</span>
                       </span>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection