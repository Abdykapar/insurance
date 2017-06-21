<div class="col-lg-3">
    <div class="social-section"><a href="{{ route('calc') }}">
    <button type="button" class="btn btn-primary btn-lg" href="{{ route('calc') }}">
        <i class="fa fa-calculator fa-5x left"> </i> {{ trans('menu.calculator') }}
    </button></a>
    </div>
    <hr>
    <ul>
        @if ($sub)
            @if(App::isLocale('ru'))
                @foreach($sub as $all)
                    @if ($all->level == 1)
                        <li>
                            <a href="{{ route('index.submenu',$all->id) }}"><span class="text">{{ $all->name }}</span></a>
                        </li>
                    @endif
                @endforeach
            @else
                @foreach($sub as $all)
                    @if ($all->level == 1)
                        <li>
                            <a href="{{ route('index.submenu',$all->id) }}"><span class="text">{{ $all->nameKg }}</span></a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endif
    </ul>
</div>
