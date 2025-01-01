<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>coachtechフリマ</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layouts/common.css') }}">
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header__wrapper">
            <div class="header__logo">
                <img src="{{ asset('img/logo.svg') }}" alt="coachtech">
            </div>
            <div class="header__search">
                <form action="/search" method="post" class="header__search-form">
                    @csrf
                    <input type="text" name="keyword" placeholder="なにをお探しですか?">
                </form>
            </div>
            <div class="header__nav">
                @if(Auth::check())
                <div class="header__nav__item">
                    <button>ログイン</button>
                </div>
                <div class="header__nav__item">
                    <button>会員登録</button>
                </div>
                @else
                <form action="/logout" class="header__nav__item">
                    <button>ログアウト</button>
                </form>
                <div class="header__nav__item">
                    <button>マイページ</button>
                </div>
                @endif
                <div class="header__nav__sell">
                    <button>出品</button>
                </div>
            </div>
        </div>
    </header>
    <main class="main">
        @yield('main')
    </main>
</body>

</html>