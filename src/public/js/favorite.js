$(function() {
    let like = $('.like-toggle');
    let likeItemId;
    like.on('click', function() {
        let $this = $(this);
        likeItemId = $this.data('item-id');
        let thisCount = $(".item__icon-star-counter").html();
        thisCount = Number(thisCount);

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
                thisCount = thisCount + 1;
                $(".item__icon-star-counter").html(thisCount);
            } else {
                let src = $this.attr('src').replace('yellow_star', 'star');
                $this.attr('src', src);
                thisCount = thisCount - 1;
                $(".item__icon-star-counter").html(thisCount);
            }
        })

        .fail(function() {
            console.log('fail')
        })

    })
})