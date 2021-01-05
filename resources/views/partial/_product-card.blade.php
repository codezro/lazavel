<div class="product card list-{{$numberOfCards}}">
    <div class="card-image">
        <a href="/view/{{$product->id}}"><img src="{{Storage::url($product->image[count($product->image)-1]->url)}}"></a>
    </div>
    <div class="card-content">
        <a href="/view/{{$product->id}}">{{Str::limit($product->name,30)}}</a>
    </div>
    <div class="card-action">
        <a href="/view/{{$product->id}}">&#8369; {{number_format($product->sale_price, 2, '.', ',')}}</a>
    </div>
    <span class="star padding-left-5">
        @if ($product->review->avg('rating') > 0)
            @for ($stars = 1; $stars <= 5; $stars++)
                @if ($product->review->avg('rating') >= $stars)
                    <i class="tiny material-icons">star</i>
                @elseif ( round( $product->review->avg('rating') + .25 ) >= $stars )
                    <i class="tiny material-icons">star_half</i>
                @else
                    <i class="tiny material-icons">star_border</i>
                @endif
            @endfor
        @endif
    </span>
</div>