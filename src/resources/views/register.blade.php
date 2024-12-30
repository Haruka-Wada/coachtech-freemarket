@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('main')
<div class="main__title">
    <h2>会員登録</h2>
</div>
<div class="main__contents">
    <form action="/register" method="post">
        <div class="main__item">
            <p>メールアドレス</p>
            <input name="email"></input>
        </div>
        <div class="main__item">
            <p>パスワード</p>
            <input name="password"></input>
        </div>
        <div class="register__button">
            <button>登録する</button>
        </div>
    </form>
</div>
<div class="main__link">
    <a href="/login">ログインはこちら</a>
</div>
@endsection