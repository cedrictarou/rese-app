<div id="modal"
    class="fixed z-50 left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white rounded-lg p-6 hidden opacity-0 transition-all duration-300 ease-in-out">
    <button id="close-modal" class="absolute -top-10 -right-10"><i class="fa-solid fa-xmark fa-xl text-white"></i></button>
    <x-title3 class="mb-4" title="お客様のご意見をお聞かせください。" />
    <form action="{{ route('review', $shop['id']) }}" method="POST">
        @csrf
        <div class="flex flex-row-reverse items-center justify-end mb-4">
            @for ($i = 5; $i >= 1; $i--)
                <input type="radio" class="star-rating hidden" name="rating" value="{{ $i }}"
                    id="star-{{ $i }}" {{ $i === 5 ? 'required' : '' }}>
                <label class="star-rating-label text-2xl text-gray-400 cursor-pointer mr-2"
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

<div id="modal-overlay" class="fixed z-40 inset-0 bg-secondary-dark opacity-50 hidden transition-opacity duration-300">
