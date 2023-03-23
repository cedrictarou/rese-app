<div {{ $attributes->merge(['class' => 'flex items-center']) }}>
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
    <span class="average-comments ml-2 font-bold">{{ round($reviews->average('rating'), 1) ?? 0 }}</span>
    @if (Route::currentRouteName() == 'detail')
        <x-comment-icon :reviews="$reviews" class="ml-2" />
    @endif
</div>
