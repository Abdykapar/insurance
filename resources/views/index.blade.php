@extends('layout.master')

@section('body')

    <div class="slider-area" style="max-height: 330px" >
        <div id="carousel-example-generic" class="carousel slide col-md-9" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox" style="height: 500px">
                <div class="item active">
                    <img src="/template/image/160.jpg" class="img img-responsive fill"  alt="..." style="height: 500px; width: 100%">
                    <div class="carousel-caption">
                        ...
                    </div>
                </div>
                <div class="item">
                    <img src="/template/image/image.jpg" class="img img-responsive" alt="..." style="height: 500px; width: 100%">
                    <div class="carousel-caption">
                        ...
                    </div>
                </div>
                ...
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="col-md-3">
            @include('layout.subMenu')
        </div>
    </div>
    <hr>
    <div class="container">
    <div class="content-area col-md-12">
        <div class="container">
            <div class="row page-title text-center wow zoomInDown" data-wow-delay="0.1s">
                <h2>Новости</h2>
            </div>
            <div class="row how-it-work text-center" >
                @foreach($a as $new)
                    <div class="col-md-4" >
                        <div class="single-work wow fadeInUp" style="height: 400px" data-wow-delay="0.1s">
                            <div  style="height:100px;">
                                <a href="{{ route('newId',$new->id) }}">
                                    <h3>{{ $new->title }}</h3>
                                </a>
                            </div>
                            <p>{!!  $new->content !!}...</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <hr>
        <div class="container">
            <div class="row page-title text-center wow bounce"  data-wow-delay="1s">
                <h2>Наше местоположение</h2>
            </div>
            <div class="row jobs">
                <div id="map"></div>
            </div>
        </div>
        <hr>
    </div>
    </div>


@endsection