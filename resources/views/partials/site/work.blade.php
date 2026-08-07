@if ($projects->isNotEmpty())
    <section id="work" class="bg-ink py-16 text-ondark sm:py-24 lg:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-10">
            <div class="flex flex-wrap items-end justify-between gap-6">
                <div class="max-w-xl">
                    <span class="inline-flex items-center gap-3 font-display text-xs font-semibold tracking-[.24em] text-gold-bright uppercase">
                        <span class="h-px w-8 bg-current opacity-60"></span>
                        {{ __('site.work.eyebrow') }}
                    </span>
                    <h2 class="font-display mt-5 text-2xl leading-tight font-bold tracking-tight sm:text-3xl lg:text-4xl">
                        {{ __('site.work.heading') }}
                    </h2>
                </div>
                <a href="{{ route('projects.index') }}" class="font-display shrink-0 border border-ink-line px-6 py-3 text-sm font-semibold text-ondark transition hover:border-gold-bright hover:text-gold-bright">
                    {{ __('site.work.view_all') }}
                </a>
            </div>

            <div class="mt-10 grid gap-6 sm:mt-14 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($projects as $project)
                    @include('partials.site.project-card', ['project' => $project])
                @endforeach
            </div>
        </div>

        @foreach ($projects as $project)
            @include('partials.site.project-gallery-modal', ['project' => $project])
        @endforeach
    </section>
@endif
