@extends('admin.layouts.master')
@section('breadcrumbs')
    {!! Breadcrumbs::renderIfExists($a,$menu->id) !!}
@endsection
@section('content')
    <div class="col-md-10">
        <div class="box box-solid">
            <div class="box-header with-border">
                <i class="fa fa-text-width"></i>

                <h3 class="box-title">{{ $menu->name }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                {!! $menu->content !!}
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                {{ $menu->created_at }}
                <a href="{{ route('admin.menu.edit',$menu->id) }}">
                   <span class="pull-right-container">
                      <span class="fa fa-edit pull-right"> Изменить</span>
                   </span>
                </a>
                <a href="{{ route('admin.menu.delete',$menu->id) }}">
                       <span class="pull-right-container">
                          <span class="fa  fa-minus-square pull-right"> Удалить</span>
                       </span>
                </a>
            </div>
        </div>
        @if ($subsubmenu)
            <div class="box-body">
                <ul class="todo-list ui-sortable">
                    @foreach($subsubmenu as $all)
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
                                    <a href="{{ route('admin.menu.edit',$all->id) }}"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('admin.menu.delete',$all->id) }}"><i class="fa fa-trash-o"></i></a>
                                </div>
                            </li>
                    @endforeach
                </ul>

            </div>
        @endif
        <div class="box-footer clearfix no-border">
            <a type="button" class="btn btn-default pull-right" href="{{ route('admin.menu.create.item',$menu->id) }}"><i class="fa fa-plus"></i> Добавить меню</a>
        </div>
        <!-- /.box -->
    </div>
@endsection