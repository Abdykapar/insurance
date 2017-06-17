@extends('layout.master')

@section('body')
    <section class="section">
    <h1 class="section-heading text-md-center"><b>{{ $element->name }}</b></h1>
    {!! $element->content !!}
    </section>

@endsection