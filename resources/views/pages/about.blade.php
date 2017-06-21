@extends('layout.master')

@section('body')
    <section class="section">
        @if(App::isLocale('ru'))
            <h1 class="section-heading text-md-center"><b>{{ $element->name }}</b></h1>
            {!! $element->content !!}
        @else
            <h1 class="section-heading text-md-center"><b>{{ $element->nameEn }}</b></h1>
            {!! $element->contentEn !!}
        @endif
    </section>

@endsection