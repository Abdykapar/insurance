@extends('admin.layouts.master')
@section('breadcrumbs')
    {!! Breadcrumbs::renderIfExists($ab) !!}
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Наши партнеры</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Текст
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>Тема</th>
                                <th>Текст</th>
                                <th style="width: 170px"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($a as $new)
                                <tr class="gradeA">
                                    <td>{{ $new->name }}</td>
                                    <td style="max-width:400px">{!! $new->content !!}</td>
                                    <td>
                                        <div class="btn-group inline">
                                            <a href="{{ route('admin.partners.show',$new->id) }}">
                                                <button type="button" class="btn btn-info btn-circle btn-lg" data-toggle="tooltip" title="Посмотреть" data-placement="left">
                                                    <i class="fa fa-info-circle"></i>
                                                 </button>
                                            </a>
                                            <a href="{{ route('admin.partners.edit',$new->id) }}">
                                                <button type="button" class="btn btn-success btn-circle btn-lg" data-toggle="tooltip" title="Изменить">
                                                    <i class="fa fa-edit" style="color: white"></i>
                                                </button>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>Имя</th>
                                <th>Лого</th>
                                <th style="width: 200px"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($logo as $new)
                                <tr class="gradeA">
                                    <td>{{ $new->name }}</td>
                                    <td>
                                        <img src="/uploads/partners/{{ $new->logo }}" class="img img-responsive img-rounded" alt="Cinque Terre" width="100px" height="100px">
                                    </td>
                                    <td>
                                        <div class="btn-group inline">
                                            <a href="{{ route('admin.partners.image.show',$new->id) }}">
                                                <button type="button" class="btn btn-info btn-circle btn-lg" data-toggle="tooltip" title="Посмотреть" data-placement="left">
                                                    <i class="fa fa-info-circle"></i>
                                                </button>
                                            </a>
                                            <a href="{{ route('admin.partners.image.edit',$new->id) }}">
                                                <button type="button" class="btn btn-success btn-circle btn-lg" data-toggle="tooltip" title="Изменить">
                                                    <i class="fa fa-edit" style="color: white"></i>
                                            </button>
                                            </a>
                                            <a href="{{ route('admin.partners.image.delete',$new->id) }}">
                                                <button type="button" class="btn btn-warning btn-circle btn-lg" data-toggle="tooltip" title="Удалить">
                                                    <i class="fa fa-times"></i>
                                            </button></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('admin.partners.image.create') }}">
                            <button type="button" class="btn btn-primary btn-md">
                                 Добавить логотип
                            </button>
                        </a>
                    </div>
                    <!-- /.panel-body -->
                </div>
            </div>
            <!-- /.col-lg-6 (nested) -->
        </div>
@endsection
