@php $projectMedia = $project->getMedia('gallery')->sortBy('order_column')->values(); @endphp
@if ($projectMedia->isNotEmpty())
    <div id="project-{{ $project->id }}" class="target:flex fixed inset-0 z-50 hidden flex-col overflow-y-auto bg-ink/97 p-6 sm:p-10">
        <div class="mx-auto flex w-full max-w-5xl items-center justify-between pb-6">
            <h3 class="font-display text-lg font-bold text-ondark sm:text-xl">{{ $project->title }}</h3>
            <a href="#" class="text-3xl leading-none text-ondark" aria-label="Close">&times;</a>
        </div>
        <div class="mx-auto grid w-full max-w-5xl gap-4 pb-10 sm:grid-cols-2">
            @foreach ($projectMedia as $media)
                <img src="{{ $media->getUrl() }}" alt="{{ $project->title }}" class="w-full border border-ink-line object-cover">
            @endforeach
        </div>
    </div>
@endif
