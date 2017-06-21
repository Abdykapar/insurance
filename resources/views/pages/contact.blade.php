@extends('layout.master')

@section('body')
    <section class="section">
        @if(App::isLocale('ru'))
            <h1 class="section-heading text-md-center"><b>{{ $element->name }}</b></h1>
            {!! $element->content !!}
            <hr>
        @else
            <h1 class="section-heading text-md-center"><b>{{ $element->nameKg }}</b></h1>
            {!! $element->contentKg !!}
            <hr>
        @endif
    <div class="container">
        <div class="row jobs">
            <div id="map"></div>
        </div>
    </div>
    <hr>
    </section>
@endsection