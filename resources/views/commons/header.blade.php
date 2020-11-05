<header class="mb-5">

    <nav class="navbar navbar-expand-lg navbar-light bg-warning">

        <a class="navbar-brand" href="/">やんばるエキスパート</a>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav-bar">
        

            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('新規登録') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item"><a href="/products/" class="nav-link">商品検索</a></li>
                    <li class="nav-item">{!! link_to_route('carts.index','カート',[],['class'=>'nav-link']) !!}</a></li>
                    <li class="nav-item"><a href="/products/show" class="nav-link">注文履歴</a></li>
                    <li class="nav-item">{!! link_to_route('users.show','ユーザ情報',['id'=>Auth::id()],['class'=>'nav-link']) !!}</li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                    </li>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>    
                @endguest
            </ul>
        </div>

    </nav>

</header>