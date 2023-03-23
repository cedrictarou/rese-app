<div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show.transition.duration.500ms="show"
    class="fixed z-30 top-5 left-1/2 transform -translate-x-1/2 bg-primary-light text-white px-5 py-2 font-semibold rounded text-center shadow-lg animate-fadeout">
    {{ $slot }}
</div>
