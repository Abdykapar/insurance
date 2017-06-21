@extends('admin.layouts.master')

@section('content')
    <div class="col-md-10" id="app">
        <div class="box box-solid">
            Ru : <input type="checkbox" name="check" value="1" class="box-input" v-model="radio" v-on:click="clicked()">
            Kg : <input type="checkbox" name="checkKg" value="1" class="box-input" v-model="radioKg" v-on:click="clickedKg()">
            <div v-if="seen">
                <div class="box-header with-border">
                    <i class="fa fa-text-width"></i>
                    <h3 class="box-title">{{ $new->name }}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    {!! $new->content !!}
                </div>
            </div>
            <div v-if="seenKg">
                <div class="box-header with-border">
                    <i class="fa fa-text-width"></i>
                    <h3 class="box-title">{{ $new->nameKg }}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    {!! $new->contentKg !!}
                </div>
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
            </div>
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