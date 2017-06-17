<div class="col-lg-3">
    <div class="social-section"><a href="{{ route('calc') }}">
    <button type="button" class="btn btn-primary btn-lg" href="{{ route('calc') }}">
        <i class="fa fa-calculator fa-5x left"> </i> Калькулятор
    </button></a>
    </div>
    <hr>
    <ul>
        @if ($sub)
            @foreach($sub as $all)
                @if ($all->level == 1)
                    <li>
                        <a href="{{ route('index.submenu',$all->id) }}"><span class="text">{{ $all->name }}</span></a>
                    </li>
                @endif
            @endforeach
        @endif
    </ul>
</div>
