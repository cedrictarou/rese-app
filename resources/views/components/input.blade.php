@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => 'border-t-0 border-x-0 border-b-2 border-gray-300',
]) !!}>
{{-- <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' =>
        'border-t-0 border-x-0 border-b-2 border-gray-300 focus:border-b-indigo-300 focus:border-t-0 focus:border-x-0 focus:shadow-none focus:ring-0',
]) !!}> --}}
