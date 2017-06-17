@extends('layout.master')

@section('body')
    <section class="section">
        <h1 class="section-heading text-md-center">Новости</h1>
    <div class="container" style="margin-top: 20px">
        @foreach($news as $new)
            <div class="col-md-6">
                <div class="card card-cascade narrower">

                    <div class="card-block text-xs-center">
                        <h5>{{ $new->created_at }}</h5>
                        <h4 class="card-title"><strong><a href="{{ route('newId',$new->id) }}">{{ $new->name }}</a></strong></h4>

                        <p class="card-text">
                            {!! str_limit($new->content,200) !!}
                        </p>


                    </div>

                </div>
            </div>
        @endforeach
        <hr>

    </div>

    </section>
@endsection