@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mylist.css') }}">
@endsection

@section('main')
<ul id="tab" class="tab">
    <li id="recommend" class="recommend">
        <a href="/">おすすめ</a>
    </li>
    <li id="mylist" class="mylist">マイリスト</li>
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

<script type="text/javascript">
    $(function() {
        $('.tab li').click(function() {
            var num = $('.tab li').index(this);
            console.log(num);
            $('.tab li').removeClass('active');
            $(this).addClass('active');
            $('.tabpage').removeClass('active').eq(num).addClass('active');
        });
    })
</script>
@endsection