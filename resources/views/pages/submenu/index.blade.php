@extends('layout.subMaster')
@section('breadcrumbs')

@endsection
@section('content')

    <section class="section">
        {!! Breadcrumbs::renderIfExists('submenu',$submenu->id) !!}
        @if(App::isLocale('ru'))
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
        <div>
            {!! $submenu->content !!}
            @if($file!='')
                <div class="row">
                    <ul>
                        <li>
                            <a href="https://docs.google.com/viewerng/viewer?url=gso.kg/files/{{ $file->name }}" target="_blank">
                                {{ $file->original_name }}
                            </a>
                        </li>
                    </ul>
                </div>
            @endif
        </div>
            @else
            <h1 class="section-heading text-md-center">{{ $submenu->nameKg }}</h1>
            @if ($subsub)
                <div class="list-group">
                    @foreach($subsub as $s)
                        <a href="{{ route('index.submenu',$s->id) }}" class="list-group-item list-group-item-success">
                            {{ $s->nameKg }}
                        </a>
                    @endforeach
                </div>
            @endif
            <br>
            <br>
            <div>
                {!! $submenu->contentKg !!}
                @if($file1!='')
                    <div class="row">
                        <ul>
                            <li>
                                <a href="https://docs.google.com/viewerng/viewer?url=gso.kg/files/{{ $file1->nameKg }}" target="_blank">
                                    {{ $file1->original_name }}
                                </a>
                            </li>
                        </ul>
                    </div>
                @endif
            </div>
            @endif
    </section>
@endsection