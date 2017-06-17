@extends('admin.layouts.master')
@section('breadcrumbs')
    {!! Breadcrumbs::renderIfExists($a) !!}
@endsection
@section('content')
    <div class="col-md-10">
            @foreach($news as $new)
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <i class="fa fa-text-width"></i>

                        <h3 class="box-title">{{ $new->name }}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        {!! str_limit($new->content,400) !!}
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        {{ $new->created_at }}
                       <a href="{{ route('admin.news.edit',$new->id) }}">
                           <span class="pull-right-container">
                              <span class="fa fa-edit pull-right"> Изменить</span>
                           </span>
                       </a>
                        <a href="{{ route('admin.news.delete',$new->id) }}">
                           <span class="pull-right-container">
                              <span class="fa  fa-minus-square pull-right"> Удалить</span>
                           </span>
                       </a>
                        <a href="{{ route('admin.news.show',$new->id) }}">
                           <span class="pull-right-container">
                              <span class="fa fa-list-alt pull-right"> Показать</span>
                           </span>
                        </a>
                    </div>
                </div>
            @endforeach
            <a class="btn btn-primary" href="{{ route('admin.news.create') }}">Добавить новост</a>
    </div>
@endsection