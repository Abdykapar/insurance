@extends('layout.master')

@section('body')

    <section class="section extra-margins">

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

    </section>


@endsection