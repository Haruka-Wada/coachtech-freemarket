@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('main')
<div class="profile__wrapper">
    <div class="profile__contents">
        <div class="profile__image"></div>
        <div class="profile__name">
            <p>{{ !Auth::user()->name === null ? Auth::user()->name : "ユーザー名" }}</p>
        </div>
    </div>
    <div class="profile__contents-edit">
        <a href="/profile/edit">プロフィールを編集</a>
    </div>
</div>
@endsection