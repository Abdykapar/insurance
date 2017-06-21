@extends('admin.layouts.master')

@section('content')
    <div class="col-md-10">
        <div class="box box-solid" id="app">
            Ru : <input type="checkbox" name="check" value="1" class="box-input" v-model="radio" v-on:click="clicked()">
            Kg : <input type="checkbox" name="checkKg" value="1" class="box-input" v-model="radioKg" v-on:click="clickedKg()">
            <div v-if="seen">
                <div class="box-header with-border">
                    <i class="fa fa-text-width"></i>
                    <h3 class="box-title">{{ $agent->name }}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    {!! $agent->content !!}
                </div>
            </div>
                <div v-if="seenKg">
                    <div class="box-header with-border">
                        <i class="fa fa-text-width"></i>
                        <h3 class="box-title">{{ $agent->nameKg }}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        {!! $agent->contentKg !!}
                    </div>
                </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        {{ $agent->created_at }}
                        <a href="{{ route('admin.agent.edit',$agent->id) }}">
                       <span class="pull-right-container">
                          <span class="fa fa-edit pull-right"> Изменить</span>
                       </span>
                        </a>
                        <a href="{{ route('admin.agent.delete',$agent->id) }}">
                           <span class="pull-right-container">
                              <span class="fa  fa-minus-square pull-right"> Удалить</span>
                           </span>
                        </a>
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