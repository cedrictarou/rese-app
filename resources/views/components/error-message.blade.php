@props(['errors'])

<div {{ $attributes->merge(['class' => 'w-3/4 mx-auto bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded']) }}
    role="alert">
    <strong class="font-bold">エラー！</strong>
    <span class="block sm:inline">入力内容に誤りがあります。</span>
    <ul class="mt-3">
        @foreach ($errors->all() as $error)
            <li class="list-disc list-inside">{{ $error }}</li>
        @endforeach
    </ul>

</div>
