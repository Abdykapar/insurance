@extends('layout.master')

@section('body')

    <section class="section extra-margins">
        @if(App::isLocale('ru'))
            <h1 class="section-heading">{{ $new->name }}</h1>
            <p class="section-description">

            </p>
            <div class="row">
                <div class="col-md-12 mb-r">
                    <div class="row">
                    {!! $new->content !!}
                    </div>
                </div>

            </div>

            <hr>
        @else
            <h1 class="section-heading">{{ $new->nameKg }}</h1>
            <p class="section-description">

            </p>
            <div class="row">
                <div class="col-md-12 mb-r">
                    <div class="row">
                        {!! $new->contentKg !!}
                    </div>
                </div>

            </div>

            <hr>
        @endif
    </section>


@endsection