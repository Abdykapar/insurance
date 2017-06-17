@extends('layout.new')
@section('content')
    <div class="container" id="app">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Классы профессионального риска</th>
            <th>Введите ГФОТ по категориям персонала</th>
            <th>Тариф,%</th>
            <th>Коэфф. по кол-ву ГФОТ</th>
            <th>Коэфф. по сроку</th>
            <th>сумма премии</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>"Административный
                персонал"</td>
            <td> <input type="text" class="form-control"  aria-describedby="basic-addon1" v-model="input_admin"></td>
            <td>{{ $class[14]->rate }}</td>
            <td>@{{ rate1 ? rate1:'-' }}</td>
            <td>@{{ result_Ans }}</td>
            <td>@{{ sum }}</td>
        </tr>
        <tr>
            <td>
                <select class="form-control" v-model="selected" v-on:click="myRate({{ $class }})">
                    <option selected>Выберите</option>
                    @foreach($class as $a)
                        @if ($a->id < 14)
                            <option  value={{$a->id}}>{{ $a->name }}</option>
                        @endif
                    @endforeach
                </select>
            </td>
            <td><input type="text" class="form-control"  aria-describedby="basic-addon1" v-model="input_category"></td>
            <td>@{{ rate.rate }}</td>
            <td>@{{ rate1 ? rate1:'Не введено количество ГФОТ' }}</td>
            <td>@{{ result_Ans }}</td>
            <td>@{{ sum1 }}</td>
        </tr>
        <tr>
            <td>"Вспомогательный
                персонал"</td>
            <td> <input type="text" class="form-control"  aria-describedby="basic-addon1" v-model="input_personal"></td>
            <td>{{ $class[15]->rate }}</td>
            <td>@{{ rate1 ? rate1:'-' }}</td>
            <td>@{{ result_Ans }}</td>
            <td>@{{ sum2 }}</td>
        </tr>
        </tbody>
    </table>
    <div class="col-lg-12">
    <div class="col-lg-4">

            <div class="form-group">
                <label for="exampleInputEmail1">Введите предполагаемый срок страхования</label>
                <div class="form-group">
                <label for="exampleInputEmail1">с</label>
                <input type="date" class="form-control" id="exampleInputEmail1" v-model="date"  >
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">по</label>
                <input type="date" class="form-control" id="exampleInputPassword1" v-model="to_date" >
            </div>

            <label for="exampleInputEmail1">Введите количество Гфот для определения отв-ти перед 1м работником</label>
            <select class="form-control" id="exampleInputEmail1" v-model="num_GFOT">
                @for($i = 1; $i < 21; $i++)
                    <option value={{ $i }}>{{ $i }}</option>
                @endfor
            </select>
        <br>
            <div class="form-inline">
                <p>@{{ Day }}</p>
            </div>
    </div>
        <div class="col-lg-6" style="float: right">
            <div class="form-group form-inline">
                <label for="12" class="col-md-4">Общая сумма</label>
                <input type="email" class="form-control" id="12" v-model="d_all_sum"><p hidden>@{{ all_sum }}</p>
            </div>
            <div class="form-group form-inline">
                <label for="13" class="col-md-4">нсп</label>
                <input type="email" class="form-control" id="13" value="@{{ nsp }}"><p hidden>@{{ nsp }}</p>
            </div>
            <div class="form-group form-inline">
                <label for="14" class="col-md-4">Итого к оплате</label>
                <input type="email" class="form-control" id="14" value="@{{ result }}"><p hidden>@{{ result }}</p>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

