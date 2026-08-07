<x-layouts.site :site-settings="$siteSettings">
    <section class="bg-ink pt-32 pb-16 text-ondark sm:pt-40 sm:pb-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-10">
            <span class="inline-flex items-center gap-3 font-display text-xs font-semibold tracking-[.24em] text-gold-bright uppercase">
                <span class="h-px w-8 bg-current opacity-60"></span>
                {{ __('site.projects_page.eyebrow') }}
            </span>
            <h1 class="font-display mt-5 text-3xl leading-tight font-bold tracking-tight sm:text-4xl lg:text-5xl">
                {{ __('site.projects_page.heading') }}
            </h1>
        </div>
    </section>

    <section class="bg-ink pb-16 text-ondark sm:pb-24 lg:pb-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-10">
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($projects as $project)
                    @include('partials.site.project-card', ['project' => $project])
                @endforeach
            </div>
        </div>

        @foreach ($projects as $project)
            @include('partials.site.project-gallery-modal', ['project' => $project])
        @endforeach
    </section>
</x-layouts.site>
