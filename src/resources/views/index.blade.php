@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('main')
<ul id="tab" class="tab">
    <li id="recommend" class="recommend active">おすすめ</li>
    <li id="mylist" class="mylist">
        <a href="/mylist">マイリスト</a>
    </li>
</ul>

<div id="tabbody">
    <div id="recommend" class="tabpage active">
        @foreach($items as $item)
        <div class="item">
            <img src="{{ $item->image}}" alt="{{ $item->name }}">
        </div>
        @endforeach
    </div>
    <div id="mylist" class="tabpage">

    </div>
</div>
@endsection