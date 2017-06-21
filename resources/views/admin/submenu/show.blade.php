@extends('admin.layouts.master')
@section('breadcrumbs')
    {!! Breadcrumbs::renderIfExists($a,$menu->id) !!}
@endsection
@section('content')
    <div class="col-md-10" id="app">
        <div class="box box-solid" >
            Ru : <input type="checkbox" name="check" value="1" class="box-input" v-model="radio" v-on:click="clicked()">
            Kg : <input type="checkbox" name="checkKg" value="1" class="box-input" v-model="radioKg" v-on:click="clickedKg()">

            <div v-if="seen">
            <div class="box-header with-border">
                <i class="fa fa-text-width"></i>

                <h3 class="box-title">{{ $menu->name }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                {!! $menu->content !!}
                @if($file)
                    <div class="row">
                        <ul>
                            <li>{{ $file->original_name }}</li>
                        </ul>
                    </div>
                @endif
            </div>
                </div>
            <div v-if="seenKg">
                <div class="box-header with-border">
                    <i class="fa fa-text-width"></i>

                    <h3 class="box-title">{{ $menu->nameKg }}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    {!! $menu->contentKg !!}
                    @if($file1)
                        <div class="row">
                            <ul>
                                <li>{{ $file1->original_name }}</li>
                            </ul>
                        </div>
                    @endif
                </div>
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
    <script src="/vue/vue.js"></script>
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                message: 'Hello Vue!',
                seen: true,
                radio: 1,
                radioKg: 0,
                seenKg: false
            },
            computed: {
                clicked: function () {
                    if (this.radio == 1){
                        this.seen = false
                    }
                    else {
                        this.seen = true
                    }
                },
                clickedKg: function () {
                    if (this.radioKg == 1){
                        this.seenKg = false
                    }
                    else {
                        this.seenKg = true
                    }
                }

            }
        })
    </script>
@endsection