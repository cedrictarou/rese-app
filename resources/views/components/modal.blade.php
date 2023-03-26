<div {{ $attributes->merge() }}>
    <div id="modal" class="modal opacity-0 hidden">
        <button id="close-modal" class="absolute -top-10 -right-10"><i
                class="fa-solid fa-xmark fa-xl text-white"></i></button>
        <x-title3 class="mb-4" title="お客様のご意見をお聞かせください。" />
        <form action="{{ route('review', $shop['id']) }}" method="POST">
            @csrf
            <div class="flex flex-row-reverse items-center justify-end mb-4">
                @for ($i = 5; $i >= 1; $i--)
                    <input type="radio" class="star-rating hidden" name="rating" value="{{ $i }}"
                        id="star-{{ $i }}" {{ $i === 5 ? 'required' : '' }}>
                    <label class="star-rating-label text-2xl text-secondary cursor-pointer mr-2"
                        for="star-{{ $i }}"><i class="fa-solid fa-star"></i></label>
                @endfor
            </div>
            <div>
                <textarea name="comment" placeholder="コメントを入力してください。" class="rounded" rows="3" required></textarea>
            </div>
            <div class="mt-5 flex justify-end">
                <x-button>コメントする</x-button>
            </div>
        </form>
    </div>
    {{-- overlay --}}
    <div id="modal-overlay" class="overlay hidden">
    </div>

</div>
