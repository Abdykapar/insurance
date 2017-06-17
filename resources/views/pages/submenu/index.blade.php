@extends('layout.subMaster')
@section('breadcrumbs')

@endsection
@section('content')

    <section class="section">
        {!! Breadcrumbs::renderIfExists('submenu',$submenu->id) !!}
        <h1 class="section-heading text-md-center">{{ $submenu->name }}</h1>
        @if ($subsub)
            <div class="list-group">
                @foreach($subsub as $s)
                        <a href="{{ route('index.submenu',$s->id) }}" class="list-group-item list-group-item-success">
                            {{ $s->name }}
                        </a>
                @endforeach
            </div>
        @endif
        <br>
        <br>
        <div class="section-description">
            {!! $submenu->content !!}
        </div>
    </section>
@endsection