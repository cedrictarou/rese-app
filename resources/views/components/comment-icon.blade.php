<div {{ $attributes->merge(['class' => 'flex items-center']) }}>
    <i class="fa-regular fa-comments fa-lg"></i>
    <span class="count-commnets ml-2 font-bold">{{ $reviews->count() }}</span>
</div>
