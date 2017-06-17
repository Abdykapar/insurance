@extends('layout.master')

@section('body')
    <section class="section">
        <div class="card-block">
            @if (Session::has('success'))
                <h4 class="">{{ Session::get('success') }}</h4>
            @endif
            <div class="text-xs-center">
                <h3><i class="fa fa-envelope"></i> Обратная связь</h3>
                <hr class="mt-2 mb-2">
            </div>
            <form class="form-horizontal" method="post" action="{{ route('admin.feedback.store') }}">
                {{ Form::token() }}
                <div class="md-form">
                    <i class="fa fa-user prefix"></i>
                    <input type="text" id="form3" class="form-control" name="name">
                    <label for="form3">Ваше имя:</label>
                </div>

                <div class="md-form">
                    <i class="fa fa-envelope prefix"></i>
                    <input type="text" id="form2" class="form-control" name="email">
                    <label for="form2">Ваш Email :</label>
                </div>

                <div class="md-form">
                    <i class="fa fa-tag prefix"></i>
                    <input type="text" id="form32" class="form-control" name="subject">
                    <label for="form34">Тема</label>
                </div>

                <div class="md-form">
                    <i class="fa fa-pencil prefix"></i>
                    <textarea type="text" id="form8" class="md-textarea" name="text"></textarea>
                    <label for="form8">Ваше сообщение:</label>
                </div>

                <div class="text-xs-center">
                    <button class="btn btn-default">Отправить</button>
                </div>
            </form>
        </div>
    <hr>
    </section>
@endsection