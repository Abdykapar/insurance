@extends('layout.master')

@section('body')
    <div class="col-md-9">
        @yield('content')
    </div>
    @include('layout.submenu')
@endsection