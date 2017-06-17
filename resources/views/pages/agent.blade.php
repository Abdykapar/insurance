@extends('layout.master')

@section('body')
    <section class="section">
        <h1 class="section-heading text-md-center">Наши агенты</h1>
        <div class="container" style="margin-top: 20px">
            @foreach($agents as $agent)
                <div class="col-md-6">
                    <div class="card card-cascade narrower">
                        <div class="card-block text-xs-center">
                            <h4 class="card-title"><strong>{{ $agent->name }}</strong></h4>
                            <p class="card-text">
                                {!! str_limit($agent->content,200) !!}
                            </p>

                        </div>

                    </div>
                </div>
            @endforeach
            <hr>
        </div>
    </section>
@endsection