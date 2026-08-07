@php $cover = $service->getFirstMediaUrl('cover'); @endphp
@if ($cover)
    <div id="service-{{ $service->id }}" class="target:flex fixed inset-0 z-50 hidden items-center justify-center bg-ink/95 p-6">
        <a href="#" class="absolute end-6 top-6 text-3xl leading-none text-ondark" aria-label="Close">&times;</a>
        <img src="{{ $cover }}" alt="{{ $service->title }}" class="max-h-[85vh] max-w-full object-contain">
    </div>
@endif
