@extends('layout.master')

@section('body')
    <section class="section">
        <h1 class="text-md-center section-heading">{{ trans('menu.partners') }}</h1>
        @foreach($logo as $l)
                <div class="col-md-3">

                    <div class="card ">
                         <a href="{{ $l->name }}" target="_blank">
                             <img src="/uploads/partners/{{ $l->logo }}" class=""  style="height: 60px; width: 100%">
                         </a>
                    </div>
                </div>
            @endforeach
        @if(App::isLocale('ru'))
        <div class="section-description ">
            <div class="col-md-10">
            {!! $element->content !!}
            </div>
        </div>
        @else
            <div class="section-description ">
                <div class="col-md-10">
                    {!! $element->contentKg !!}
                </div>
            </div>
        @endif
    <hr>
    </section>
@endsection