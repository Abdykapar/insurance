@extends('layout.master')

@section('body')
    <section class="section">
        <h1 class="section-heading text-md-center">{{ trans('menu.agents') }}</h1>
        @if(App::isLocale('ru'))
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
        @else
            <div class="container" style="margin-top: 20px">
                @foreach($agents as $agent)
                    <div class="col-md-6">
                        <div class="card card-cascade narrower">
                            <div class="card-block text-xs-center">
                                <h4 class="card-title"><strong>{{ $agent->nameKg }}</strong></h4>
                                <p class="card-text">
                                    {!! str_limit($agent->contentKg,200) !!}
                                </p>

                            </div>

                        </div>
                    </div>
                @endforeach
                <hr>
            </div>
        @endif
    </section>
@endsection