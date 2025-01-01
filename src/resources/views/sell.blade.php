@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sell.css') }}">
@endsection

@section('main')
<div class="main__container">
    <div class="main__title">
        <h2>商品の出品</h2>
    </div>
    <div class="item__contents">
        <div class="item__label">
            <p>商品画像</p>
        </div>
        <div class="item__data">
            <input type="file">
        </div>
    </div>
    <div class="item__contents">
        <div class="item__headline">
            <p>商品の詳細</p>
        </div>
        <div class="item__label">
            <p>カテゴリー</p>
        </div>
        <div class="item__data">
        </div>
        <div class="item__label">
            <p>商品の状態</p>
        </div>
        <div class="item__data">
            <select name="condition" id="condition">
                <option value="" selected hidden>選択してください</option>
                @foreach($conditions as $condition)
                <option value="{{ $condition->id }}">{{ $condition->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="item__contents">
        <div class="item__headline">
            <p>商品名と説明</p>
        </div>
        <div class="item__label">
            <p>商品名</p>
        </div>
        <div class="item__data">
            <input type="text">
        </div>
        <div class="item__label">
            <p>商品の説明</p>
        </div>
        <div class="item__data">
            <textarea name="description" id=""></textarea>
        </div>
    </div>
    <div class="item__contents">
        <div class="item__headline">
            <p>販売価格</p>
        </div>
        <div class="item__label">
            <p>販売価格</p>
        </div>
        <div class="item__data">
            <input type="text">
        </div>
    </div>
</div>
@endsection