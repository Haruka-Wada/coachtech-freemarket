@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sell.css') }}">
@endsection

@section('main')
<div class="main__container">
    <div class="main__title">
        <h2>商品の出品</h2>
    </div>
    <form action="/sell" method="post" enctype="multipart/form-data">
        @csrf
        <div class="item__contents">
            <div class="item__label">
                <p>商品画像</p>
            </div>
            <div class="item__data-file">
                <button type="button" for="upload" class="upload__button">画像を選択する</button>
                <input type="file" id="upload" class="item__data-upload">
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
                <select name="category" id="category">
                    <option value="" selected hidden>選択してください</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
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
            <div class="item__data-textarea">
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
            <div class="item__data price">
                <input type="number" name="price" value="" placeholder="¥">
            </div>
        </div>
        <div class="item__button">
            <button>出品する</button>
        </div>
    </form>
</div>

<script type="text/javascript">
    document.querySelector(".upload__button").addEventListener("click", () => {
        document.querySelector(".item__data-upload").click();
    });
</script>

@endsection