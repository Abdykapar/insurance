@extends('layout.master')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div id="carousel-example-1" class="carousel slide carousel-fade" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-1" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-1" data-slide-to="1"></li>
                        <li data-target="#carousel-example-1" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox" style="height: 400px">
                        <div class="carousel-item active" >
                            <img src="/image/160.jpg" alt="First slide"  class="img-fluid figure-img" style="height: 400px;width: 100%" >
                        </div>
                        <div class="carousel-item">
                            <img src="/image/sl4.jpg" alt="Second slide"  class="img-fluid figure-img" style="height: 400px;width: 100%">
                        </div>
                        <div class="carousel-item">
                            <img src="/image/image.jpg" alt="Third slide" class="img-fluid figure-img" style="height: 400px;width: 100%">
                        </div>
                    </div>
                    <a class="left carousel-control" href="#carousel-example-1" role="button" data-slide="prev">
                        <span class="icon-prev" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-1" role="button" data-slide="next">
                        <span class="icon-next" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

           @include('layout.subMenu')
        </div>
    </div>
    <div class="container" style="margin-top: 20px">
        <section class="section">
            <h3 class="section-heading text-md-center">{{ trans('menu.news') }}</h3>
            @if(App::isLocale('ru'))
                @foreach($news as $new)
                    @if($new->name != '')
                        <div class="col-md-6">
                            <div class="card card-cascade narrower">
                                <div class="card-block text-xs-center">
                                    <h5>{{ $new->created_at }}</h5>
                                    <h4 class="card-title">
                                        <strong>
                                            <a href="{{ route('newId',$new->id) }}">{{ $new->name }}</a>
                                        </strong>
                                    </h4>
                                    <p class="card-text">
                                        {!! str_limit($new->content,200) !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif
        @endforeach
                @else
                    @foreach($news as $new)
                        @if($new->nameKg != '')
                            <div class="col-md-6">
                                <div class="card card-cascade narrower">
                                    <div class="card-block text-xs-center">
                                        <h5>{{ $new->created_at }}</h5>
                                        <h4 class="card-title">
                                            <strong>
                                                <a href="{{ route('newId',$new->id) }}">{{ $new->nameKg }}</a>
                                            </strong>
                                        </h4>
                                        <p class="card-text">
                                            {!! str_limit($new->contentKg,200) !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
        </section>
        <hr>
    </div>
    <div class="container">
        <section class="section">
            <h3 class="section-heading text-md-center">{{ trans('menu.address') }}</h3>
            <div id="map">
            </div>
        </section>
        <hr>
        <div class="container">
        </div>

    </div>
@endsection