@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('main')
<div class="main__title">
    <h2>ログイン</h2>
</div>
<div class="main__contents">
    <form action="/login" method="post">
        <div class="main__item">
            <p>メールアドレス</p>
            <input name="email"></input>
        </div>
        <div class="main__item">
            <p>パスワード</p>
            <input name="password"></input>
        </div>
        <div class="register__button">
            <button>ログインする</button>
        </div>
    </form>
</div>
<div class="main__link">
    <a href="/register">会員登録はこちら</a>
</div>
@endsection