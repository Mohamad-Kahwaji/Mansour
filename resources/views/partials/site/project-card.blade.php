@php
    $projectMedia = $project->getMedia('gallery')->sortBy('order_column')->values();
    $mainProjectImage = $projectMedia->first();
@endphp
<article>
    @if ($mainProjectImage)
        <a href="#project-{{ $project->id }}" class="group relative block h-56 overflow-hidden border border-ink-line sm:h-64"
            style="background-image:url('{{ $mainProjectImage->getUrl() }}');background-size:cover;background-position:center;">
            <span class="absolute inset-0 bg-ink/0 transition group-hover:bg-ink/20"></span>
            @if ($projectMedia->count() > 1)
                <span class="absolute bottom-3 end-3 flex items-center gap-1.5 bg-ink/80 px-2.5 py-1 font-display text-xs font-semibold text-ondark">
                    <svg viewBox="0 0 24 24" class="h-3.5 w-3.5" fill="currentColor" aria-hidden="true">
                        <path d="M4 7h3l1.5-2h7L17 7h3a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1Z" />
                        <circle cx="12" cy="13" r="3.2" fill="#17140f" />
                    </svg>
                    {{ $projectMedia->count() }}
                </span>
            @endif
        </a>
    @else
        <div class="h-56 overflow-hidden border border-ink-line sm:h-64" style="background: linear-gradient(160deg, #5a5040, #2b271e 70%);"></div>
    @endif

    <div class="pt-5">
        <div class="font-display text-[.66rem] font-semibold tracking-[.16em] text-gold-bright uppercase">
            {{ $project->location }}
        </div>
        <h4 class="font-display mt-2 text-xl font-bold">{{ $project->title }}</h4>
        <p class="mt-2 text-sm text-ondark-muted">{{ $project->scope }}</p>
    </div>
</article>
