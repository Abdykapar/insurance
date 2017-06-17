@extends('layout.subMaster')

@section('content')
    <section class="section">
        <div class="section-heading text-md-center">
            <h1>Калькулятор</h1>
        </div>

        <p>
            <button class="btn btn-primary" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Работадателя за причинение вреда<br> жизни
                и здоровью работник
            </button>
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample1" aria-expanded="false" aria-controls="collapseExample">
                Перевозчика <br>опасных грузов
            </button>
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
                Перевозчика <br>перед пассажирами
            </button>
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample3" aria-expanded="false" aria-controls="collapseExample">
                Организаций,эксплуатирующих <br>опасные производственные объекты
            </button>
        </p>
        <div class="collapse" id="collapseExample">
            <div class="card card-block">
                <div class="form-group col-md-10">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="exampleInputName2">Количество фондов оплаты труда</label>
                        </div>
                        <div class="col-md-offset-8">
                            <select class="form-control" v-model="num_GFOT">
                                @foreach($e as $el)
                                    <option value="{{ $el->id }}">{{ $el->sum_insurance }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="exampleInputName2">Производственный персонал:</label>
                        </div>
                        <div class="col-md-offset-8">
                            <input class="form-control" type="text" value="0"  v-model="input_category"><b v-if="tip" >Коэфициент:@{{ selected }}</b>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="exampleInputName2">Тип деятельности:</label>
                        </div>
                        <div class="col-md-offset-8">
                            <select class="form-control" v-model="selected"  v-on:click="myRate({{ $e }})">
                                <option value="-1">Выберите тип</option>
                                @foreach($e as $el)
                                    @if ($el->id < 15)
                                        <option value="{{ $el->id }}">
                                            {{ $el->name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="exampleInputName2">Административно-управленческий персонал:</label>
                        </div>
                        <div class="col-md-offset-8">
                            <input class="form-control" type="text" value="0" v-model="input_admin"><b>Коэфициент:{{ $e[16]->min_tarif }}</b>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="exampleInputName2">Вспомогательный персонал:</label>
                        </div>
                        <div class="col-md-offset-8">
                            <input class="form-control" type="text" value="0" v-model="input_personal"><b>Коэфициент:{{ $e[17]->min_tarif }}</b>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="exampleInputName2">Введите предполагаемый срок страхования</label>
                        </div>
                        <div class="col-md-offset-8">
                            c<input type="date" class="form-control" v-model="date">
                            по<input type="date" class="form-control" v-model="to_date">
                        </div>
                    </div>
                    <p hidden> @{{ rate1 }}</p>
                    <p hidden> @{{ sum }}</p>
                    <p hidden> @{{ sum1 }}</p>
                    <p hidden> @{{ sum2 }}</p>
                    <p hidden>@{{ Day }}</p>
                    <p hidden>@{{ all_sum }}</p>
                    <p hidden>@{{ nsp }}</p>
                    <p hidden>@{{ result }}</p>


                    <hr>
                    <h3>Итого: @{{ result }} сом</h3>
                </div>
            </div>
        </div>
        <div class="collapse" id="collapseExample1">
            <div class="card card-block">
                <div class="form-group col-md-9">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="exampleInputName2">Тип деятельности:</label>
                        </div>
                        <div class="col-md-offset-8">
                            <select class="form-control" v-model="risk">
                                @foreach($elem as $ele)
                                    <option value="{{ $ele->id }}">{{ $ele->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="exampleInputName2">Тоннаж</label>
                        </div>
                        <div class="col-md-offset-8">
                            <select class="form-control" v-model="tonna"  v-on:click="myTon({{ $elem }})">
                                <option value="-1" selected>Выберите</option>
                                @for($i =2; $i < 10; $i++)
                                    @if ($columns[$i] == 21)
                                        <option value="{{ $columns[$i] }}">
                                            свыше 20 тонн
                                        </option>
                                    @else
                                        <option value="{{ $columns[$i] }}">
                                            до    {{ $columns[$i] }} тонн
                                        </option>
                                    @endif
                                @endfor
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="exampleInputName2">Выберите период страхования</label>
                        </div>
                        <div class="col-md-offset-8">
                            <select class="form-control" v-model="dataTon">
                                @foreach($s as $ss)
                                    <option value="{{ $ss->size }}">
                                        {{ $ss->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <hr>
                    <h3>Итого: @{{ resTon }} сом  </h3><h5>(при наличной оплате: @{{ nalich }} сом) </h5>
                    <p><b>Примечание:</b><i>Для железнодорожного транспорта установлен единный минимальный размер страховой суммы для всех классов рисков в размере <b>12 000 000 сомов</b>.</i></p>
                </div>
            </div>
        </div>
        <div class="collapse" id="collapseExample2">
            <div class="card card-block">
                <div class="form-group col-md-9">
                    <h3>Для автомобильного транспорта:</h3>
                    <hr>
                    <div class="row">

                        <div class="col-md-4">
                            <label for="exampleInputName2">Тип транспортного средства:</label>
                        </div>
                        <div class="col-md-offset-8">
                            <select class="form-control" v-model="tTrans" v-on:click="myAvto({{ $types }})">
                                @foreach($types as $ele)
                                    @if($ele->description == ' тип транспортного средства')
                                        <option selected value="{{ $ele->id }}">{{ $ele->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="exampleInputName2">Тип перевозок</label>
                        </div>
                        <div class="col-md-offset-8">
                            <select class="form-control" v-model="tPerev">
                                @foreach($types as $ele)
                                    @if($ele->description == 'тип перевозок')
                                        <option selected value="{{ $ele->id }}">{{ $ele->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="exampleInputName2">Количество посадочных мест:</label>
                        </div>
                        <div class="col-md-offset-8">
                            <input class="form-control" type="text" value="0"  v-model="mesta"  v-on:click="myAvto({{ $types }})">
                        </div>
                    </div>
                    <hr>
                    <h3>Итого: @{{ tAvto ? tAvto : 0.00 }} сом</h3>
                    <h5>(при наличной оплате: @{{ tNalich }} сом) </h5>
                    <hr>
                    <h3>Для авиационного транспорта:</h3>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="exampleInputName2">Количество фактически
                                заполненных пассажирских кресел:</label>
                        </div>
                        <div class="col-md-offset-8">
                            <input class="form-control" type="text" value="0"  v-model="aviaIn"><b v-if="tip" >Коэфициент:@{{ selected }}</b>
                        </div>
                    </div>
                    <hr>
                    <h3>Итого: @{{ tAvia }} сом</h3>
                    <h5>(при наличной оплате: @{{ aviaNalich }} сом) </h5>
                    <p>
                        <b>
                            Примечание:
                        </b>
                        <i>
                            Для Ж\Д и водного транспорта согласно поставноления
                        </i>
                    </p>
                    <hr>
                </div>
            </div>
        </div>
        <div class="collapse" id="collapseExample3">
            <div class="card card-block">
                <div class="checkbox">
                    <label>
                        <input  type="checkbox" name="checkbox" v-model="check">
                        <u> Находится вблизи населенного пункта, охраняемых государством природных зон, рек, озер, сельскохозяйственных угодий.</u>
                    </label>
                </div>
                <h5><b>Типы опасных производственных объектов, на которых:</b></h5>
                @foreach($dangers as $d)
                    <div class="row">
                        <div class="col-md-8">
                            <h5>
                                {{ $d->name }}
                            </h5>
                        </div>
                        <div class="col-md-offset-8">
                            <label for="exampleInputName2" v-if="check">
                                {{ $d->minLimit }} x 0.144 x 1.5 = {{ $d->minLimit * 0.144 / 100 * 1.5 }} сом
                                <h5>(при наличной оплате: {{ $d->minLimit * 0.144 / 100 * 2 / 100 * 1.5 + $d->minLimit * 0.144 / 100 * 1.5 }} сом) </h5>
                            </label>
                            <label for="exampleInputName2" v-else="check">
                                {{ $d->minLimit }} x 0.144 = {{ $d->minLimit * 0.144 / 100 }} сом
                                <h5>(при наличной оплате: {{ $d->minLimit * 0.144 / 100 * 2 / 100 + $d->minLimit * 0.144 / 100 }} сом) </h5>
                            </label>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
        <div>
        </div>
        <hr>
    </section>
@endsection