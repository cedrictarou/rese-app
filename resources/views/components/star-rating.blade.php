<div class="flex">
    <ul class="flex">
        {{-- ratingの数だけ星をつける --}}
        @php
            $rating_average = $reviews->average('rating');
        @endphp
        @for ($i = 1; $i <= $rating_average; $i++)
            <li><i class="fa-solid fa-star text-yellow-500"></i></li>
        @endfor
        @for ($i = 0; $i < 5 - $rating_average; $i++)
            <li><i class="fa-solid fa-star text-secondary-dark"></i></li>
        @endfor

    </ul>
    <span class="average-comments ml-2 font-bold">{{ $reviews->average('rating') ?? 0 }}</span>
    <div class="ml-5">
        <i class="fa-regular fa-comments fa-lg"></i>
        <span class="count-commnets ml-2 font-bold">{{ $reviews->count() }}</span>
    </div>

</div>
