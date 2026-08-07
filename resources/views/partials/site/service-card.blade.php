@php $cover = $service->getFirstMediaUrl('cover'); @endphp
<div class="bg-cream-2 transition hover:bg-white">
    @if ($cover)
        <a href="#service-{{ $service->id }}" class="group relative block h-40 overflow-hidden border-b border-cream-line sm:h-48">
            <img src="{{ $cover }}" alt="{{ $service->title }}" class="h-full w-full object-cover transition group-hover:scale-105">
        </a>
    @endif

    <div class="p-6 sm:p-8">
        <div class="mb-5 flex h-11 w-11 items-center justify-center text-gold">
            @svg($service->icon ?: 'heroicon-o-squares-2x2', 'h-6 w-6')
        </div>
        <h4 class="font-display text-base font-semibold tracking-tight">{{ $service->title }}</h4>
        <p class="mt-2 text-sm leading-relaxed text-onlight-muted">{{ $service->description }}</p>
    </div>
</div>
