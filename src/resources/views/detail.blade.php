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
                @auth
                @if(!$item->hasLikedBy(Auth::user()))
                <div class="item__icon-star">
                    <img class="like-toggle" src="{{ asset('img/star.png')}}" data-item-id="{{ $item->id }}" id="not-like" alt="お気に入り">
                    <p class="item__icon-star__counter">{{ $item->favorite_count }}</p>
                </div>
                <div class="item__icon-comment">
                    <img src="{{ asset('img/comment.jpeg')}}" alt="コメント">
                    <p class="item__icon-comment__counter"></p>
                </div>
                @else
                <div class="item__icon-star">
                    <img class="like-toggle liked" data-item-id="{{ $item->id }}" src="{{ asset('img/yellow_star.png')}}" id="liked" alt="お気に入り">
                    <p class="like-counter">{{ $item->favorite_count }}</p>
                </div>
                <div class="item__icon-comment">
                    <img src="{{ asset('img/comment.jpeg')}}" alt="コメント">
                    <p class="item__icon-comment__counter"></p>
                </div>
                @endif
                @endauth
                @guest
                <div class="item__icon-star">
                    <a href="/login">
                        <img class="like-toggle" src="{{ asset('img/star.png')}}" alt="お気に入り">
                    </a>
                    <p class="like-counter">{{ $item->favorite_count }}</p>
                </div>
                <div class="item__icon-comment">
                    <img src="{{ asset('img/comment.jpeg')}}" alt="コメント">
                    <p class="item__icon-comment__counter"></p>
                </div>
                @endguest
            </div>
            <div class="item__purchase">
                <form action="/purchase/" method="get">
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

<script type="text/javascript">
    $(function() {
        let like = $('.like-toggle');
        let likeItemId;
        like.on('click', function() {
            let $this = $(this);
            likeItemId = $this.data('item-id');

            $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '/favorite',
                    method: 'POST',
                    data: {
                        'item_id': likeItemId
                    }
                })

                .done(function(data) {
                    $this.toggleClass('liked');
                    $this.next('.like-counter').html(data.item_favorite_count);
                    if ($this.hasClass('liked')) {
                        let src = $this.attr('src').replace('star', 'yellow_star');
                        $this.attr('src', src);
                    } else {
                        let src = $this.attr('src').replace('yellow_star', 'star');
                        $this.attr('src', src);
                    }
                })

                .fail(function() {
                    console.log('fail')
                })


        })
    })
</script>
@endsection