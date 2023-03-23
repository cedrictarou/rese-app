<div class="mt-10" id="comments-box">
    <div class="flex">
        <x-title3 title="他のお客様のレビュー" class="mb-4" />
        <x-button class="ml-auto" id="open-modal">レビューを書く</x-button>
    </div>
    @if (empty($reviews) || count($reviews) === 0)
        <p>コメントはありません</p>
    @endif
    @foreach ($reviews as $review)
        <div class="mb-2">
            <div class="flex">
                <span class="mr-2 font-semibold">{{ $review->user['name'] }}</span>
                <ul class="flex">
                    {{-- ratingの数だけ星をつける --}}
                    @for ($i = 1; $i <= $review['rating']; $i++)
                        <li><i class="fa-solid fa-star text-yellow-500"></i></li>
                    @endfor
                    @for ($i = 0; $i < 5 - $review['rating']; $i++)
                        <li><i class="fa-solid fa-star text-secondary-dark"></i></li>
                    @endfor
                </ul>
            </div>
            <p class="comment-text text-secondary-dark">{{ $review['comment'] }}</p>
        </div>
    @endforeach
</div>
