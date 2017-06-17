@extends('layout.master')

@section('body')
    <section class="section">
    <h1 class="section-heading text-md-center"><b>{{ $element->name }}</b></h1>
    {!! $element->content !!}
    <hr>
    <div class="container">
        <div class="row jobs">
            <div id="map"></div>
        </div>
    </div>
    <hr>
    </section>
@endsection