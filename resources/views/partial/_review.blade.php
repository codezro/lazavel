@foreach ($reviews as $review)
    <div class="review">
        <div class="box">
            <img class="profile" src="https://www.w3schools.com/w3css/img_avatar3.png" alt="profile-images">
            <span class="padding-left-10">{{ucfirst($review->user->first_name)}} {{ucfirst($review->user->last_name)}}</span>
        </div>
        <div class="star">
            @for ($i = 1; $i <= 5; $i++)
                @if ($review->rating >= $i)
                    <i class="tiny material-icons">star</i>
                @else
                    <i class="tiny material-icons">star_border</i>
                @endif
            @endfor
            <span class="padding-left-10 date"><sup>{{date('d/m/Y', strtotime($review->created_at))}}</sup></span>
        </div>
        <div>
            {{$review->details}}
        </div>
    </div>
<div class="divider"></div>
@endforeach