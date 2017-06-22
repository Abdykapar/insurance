@extends('admin.layouts.master')
@section('breadcrumbs')
    {!! Breadcrumbs::renderIfExists($a) !!}
@endsection
@section('content')
    <div class="well">
        @if(Session::has('success'))
            <p>{{ Session::get('success') }}</p>
        @endif
    </div>
    <div class="box box-primary">
        <div class="box-header ui-sortable-handle" style="cursor: move;">
            <i class="ion ion-clipboard"></i>

            <h3 class="box-title">To Do List</h3>


        </div>
        <!-- /.box-header -->
        @if ($allSub)
            <div class="box-body">
            <ul class="todo-list ui-sortable">
                @foreach($allSub as $all)
                    @if ($all->level == 1)
                        <li>
                            <!-- drag handle -->
                            <span class="handle ui-sortable-handle">
                                <i class="fa fa-ellipsis-v"></i>
                                <i class="fa fa-ellipsis-v"></i>
                              </span>
                            <!-- todo text -->
                            <a href="{{ route('admin.menu.show',$all->id) }}"><span class="text">{{ $all->name }}</span></a>
                            <!-- General tools such as edit or delete-->
                            <div class="tools">
                                <a href="{{ route('admin.menu.edit',$all->id) }}"><i class="fa fa-edit">Изменить  </i></a>
                                <a href="{{ route('admin.menu.delete',$all->id) }}"> <i class="fa fa-trash-o">Удалить</i></a>
                            </div>
                        </li>
                    @endif
                @endforeach
            </ul>

        </div>
        @endif

        <!-- /.box-body -->
        <div class="box-footer clearfix no-border">
            {{ $allSub->links() }}
            <a type="button" class="btn btn-default pull-right" href="{{ route('admin.menu.create') }}"><i class="fa fa-plus"></i> Добавить меню</a>
        </div>
    </div>
@endsection