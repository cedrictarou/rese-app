<div class="mt-10" id="comments-box">
    <div class="flex">
        <x-title3 title="他のお客様のレビュー" class="mb-4" />
        <x-button class="ml-auto" id="open-modal">レビューを書く</x-button>
    </div>
    @for ($i = 1; $i < 5; $i++)
        <div class="mb-2">
            <div class="flex">
                <span class="mr-2 font-semibold">ユーザー{{ $i }}</span>
                <ul class="flex">
                    <li><i class="fa-solid fa-star text-yellow-500"></i></li>
                    <li><i class="fa-solid fa-star text-yellow-500"></i></li>
                    <li><i class="fa-solid fa-star text-yellow-500"></i></li>
                    <li><i class="fa-solid fa-star text-secondary-dark"></i></li>
                    <li><i class="fa-solid fa-star text-secondary-dark"></i></li>
                </ul>
            </div>
            <p class="text-secondary-dark">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Inventore
                neque dolore
                doloremquenam,
                excepturi quam eligendi facilis corrupti voluptas quas culpa dolorem. Reiciendis
                officiis autem eaque praesentium recusandae.</p>
        </div>
    @endfor
</div>
