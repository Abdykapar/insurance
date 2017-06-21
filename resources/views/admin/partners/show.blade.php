@extends('admin.layouts.master')
@section('breadcrumbs')
    {!! Breadcrumbs::renderIfExists('') !!}
@endsection
@section('content')
    <div id="app">
    Ru : <input type="checkbox" name="check" value="1" class="box-input" v-model="radio" v-on:click="clicked()">
    Kg : <input type="checkbox" name="checkKg" value="1" class="box-input" v-model="radioKg" v-on:click="clickedKg()">

        <div class="col-lg-12">
            <h1 class="page-header">{{ $partner->name }}</h1>
        </div>
        <!-- /.col-lg-12 -->

        <div class="col-lg-12">
            <div v-if="seen">
                <div class="panel-body">
                    {!! $partner->content  !!}
                </div>
            </div>
            <div v-if="seenKg">
                <div class="panel-body">
                    {!! $partner->contentKg  !!}
                </div>
            </div>
            <!-- /.panel-body -->
            <div class="panel-footer" style="margin-bottom: 6px">
                <div class="row">
                    <div class="col-md-6">
                        <div class="btn-group">
                            <a href="{{ route('admin.partners.edit',$partner->id) }}">
                                <button type="button" class="btn btn-success  btn-md" data-toggle="tooltip" title="Изменить">
                                    <i class="fa fa-edit" style="color: white"></i>
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="right" style="float:right ">
                            {{ $partner->created_at }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- /.col-lg-12 -->
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