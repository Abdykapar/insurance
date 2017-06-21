@extends('layout.subMaster')

@section('content')
    <section class="section">
        @if(App::isLocale('ru'))
            <h1 class="section-heading text-md-center">Результат по запросу "{{ $word }}"</h1>
            <div class="list-group">

                    @if ($data['news'])
                        @foreach($data['news'] as $new)
                            <a href="{{ route('newId',$new->id) }}" class="list-group-item">
                                <h4 class="list-group-item-heading">{{ $new->name }}</h4>
                                <p class="list-group-item-text">
                                    {!! str_limit($new->content,200) !!}
                                </p>
                            </a>
                        @endforeach
                    @endif
                    @if($data['about'])
                        @foreach($data['about'] as $new)
                            <a href="{{ route('about') }}" class="list-group-item">
                                <h4 class="list-group-item-heading">{{ $new->name }}</h4>
                                <p class="list-group-item-text">
                                    {!! str_limit($new->content,200) !!}
                                </p>
                            </a>
                        @endforeach
                        @endif
                    @if($data['agent'])
                        @foreach($data['agent'] as $new)
                            <a href="{{ route('agent') }}" class="list-group-item">
                                <h4 class="list-group-item-heading">{{ $new->name }}</h4>
                                <p class="list-group-item-text">
                                    {!! str_limit($new->content,200) !!}
                                </p>
                            </a>
                        @endforeach
                        @endif
                    @if($data['partner'])
                        @foreach($data['partner'] as $new)
                            <a href="{{ route('partner') }}" class="list-group-item">
                                <h4 class="list-group-item-heading">{{ $new->name }}</h4>
                                <p class="list-group-item-text">
                                    {!! str_limit($new->content,200) !!}
                                </p>
                            </a>
                        @endforeach
                        @endif
                    @if($data['submenu'])
                        @foreach($data['submenu'] as $new)
                            <a href="{{ route('index.submenu',$new->id) }}" class="list-group-item">
                                <h4 class="list-group-item-heading">{{ $new->name }}</h4>
                                <p class="list-group-item-text">
                                    {!! str_limit($new->content,200) !!}
                                </p>
                            </a>
                        @endforeach
                    @endif
            </div>
        @else
            <h1 class="section-heading text-md-center">"{{ $word }}" сөзүнүн жыйынтыгы</h1>
            <div class="list-group">
                @if ($data['news'])
                    @foreach($data['news'] as $new)
                        <a href="{{ route('newId',$new->id) }}" class="list-group-item">
                            <h4 class="list-group-item-heading">{{ $new->nameKg }}</h4>
                            <p class="list-group-item-text">
                                {!! str_limit($new->contentKg,200) !!}
                            </p>
                        </a>
                    @endforeach
                @endif
                @if($data['about'])
                    @foreach($data['about'] as $new)
                        <a href="{{ route('about') }}" class="list-group-item">
                            <h4 class="list-group-item-heading">{{ $new->nameKg }}</h4>
                            <p class="list-group-item-text">
                                {!! str_limit($new->contentKg,200) !!}
                            </p>
                        </a>
                    @endforeach
                @endif
                @if($data['agent'])
                    @foreach($data['agent'] as $new)
                        <a href="{{ route('agent') }}" class="list-group-item">
                            <h4 class="list-group-item-heading">{{ $new->nameKg }}</h4>
                            <p class="list-group-item-text">
                                {!! str_limit($new->contentKg,200) !!}
                            </p>
                        </a>
                    @endforeach
                @endif
                @if($data['partner'])
                    @foreach($data['partner'] as $new)
                        <a href="{{ route('partner') }}" class="list-group-item">
                            <h4 class="list-group-item-heading">{{ $new->name }}</h4>
                            <p class="list-group-item-text">
                                {!! str_limit($new->content,200) !!}
                            </p>
                        </a>
                    @endforeach
                @endif
                @if($data['submenu'])
                    @foreach($data['submenu'] as $new)
                        <a href="{{ route('index.submenu',$new->id) }}" class="list-group-item">
                            <h4 class="list-group-item-heading">{{ $new->nameKg }}</h4>
                            <p class="list-group-item-text">
                                {!! str_limit($new->contentKg,200) !!}
                            </p>
                        </a>
                    @endforeach
                @endif
            </div>
        @endif
    </section>
@endsection