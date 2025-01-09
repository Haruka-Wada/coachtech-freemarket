@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('main')
<div class="main__container">
    <div class="item__wrapper">
        <div class="item__image">
            <img src="{{ $item->image }}" alt="{{ $item->name }}">
        </div>
    </div>
    <div class="item__wrapper">
        <div class="item__detail">
            <div class="item__name">
                <h2>{{ $item->name }}</h2>
            </div>
            <div class="item__brand">
                <p>{{ $item->brand }}</p>
            </div>
            <div class="item__price">
                <p>¥{{ number_format($item->price) }}</p>
            </div>
            <div class="item__icon">
                <div class="item__icon-star">
                    <img src="{{ asset('img/star.jpeg')}}" alt="お気に入り">
                </div>
                <div class="item__icon-comment">
                    <img src="{{ asset('img/comment.jpeg')}}" alt="コメント">
                </div>
            </div>
            <div class="item__purchase">
                <form action="/purchase" method="get">
                    <input type="hidden" name="item_id" value="{{ $item->id }}">
                    <button>購入する</button>
                </form>
            </div>
            <div class="item__index">
                <h2>商品説明</h2>
            </div>
            <div class="item__text">
                {{ $item->description}}
            </div>
            <div class="item__index">
                <h2>商品の情報</h2>
            </div>
            <div class="item__label">
                <h3>カテゴリー</h3>
                <div class="item__label-category">
                    @foreach($item->categories as $category)
                    <p>{{ $category->name }}</p>
                    @endforeach
                </div>
            </div>
            <div class="item__label">
                <h3>商品の状態</h3>
                <p class="item__label-condition">{{ $item->condition->name }}</p>
            </div>
        </div>
    </div>
</div>
@endsection