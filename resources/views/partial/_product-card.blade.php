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
        <i class="material-icons tiny">star</i>
        <i class="material-icons tiny">star</i>
        <i class="material-icons tiny">star</i>
        <i class="material-icons tiny">star</i>
        <i class="material-icons tiny">star</i>
    </span>
</div>