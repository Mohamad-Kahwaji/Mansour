<section class="border-t border-ink-line bg-ink-2 text-ondark">
    <div class="mx-auto grid max-w-7xl grid-cols-2 lg:grid-cols-4">
        <div class="border-e border-ink-line px-4 py-7 text-center sm:px-6 sm:py-9">
            <b class="font-display text-2xl font-bold text-gold-bright sm:text-3xl">{{ now()->year - 2005 }}+</b>
            <span class="font-display mt-2 block text-[.65rem] tracking-[.14em] text-ondark-muted uppercase sm:text-[.7rem]">{{ __('site.metrics.years') }}</span>
        </div>
        <div class="border-ink-line px-4 py-7 text-center sm:px-6 sm:py-9 lg:border-e">
            <b class="font-display text-2xl font-bold text-gold-bright sm:text-3xl">{{ $companies->count() }}</b>
            <span class="font-display mt-2 block text-[.65rem] tracking-[.14em] text-ondark-muted uppercase sm:text-[.7rem]">{{ __('site.metrics.companies') }}</span>
        </div>
        <div class="border-t border-ink-line px-4 py-7 text-center sm:px-6 sm:py-9 lg:border-t-0 lg:border-e">
            <b class="font-display text-2xl font-bold text-gold-bright sm:text-3xl">{{ $projects->count() }}+</b>
            <span class="font-display mt-2 block text-[.65rem] tracking-[.14em] text-ondark-muted uppercase sm:text-[.7rem]">{{ __('site.metrics.projects') }}</span>
        </div>
        <div class="border-t border-ink-line px-4 py-7 text-center sm:px-6 sm:py-9 lg:border-t-0">
            <b class="font-display text-2xl font-bold text-gold-bright sm:text-3xl">STI</b>
            <span class="font-display mt-2 block text-[.65rem] tracking-[.14em] text-ondark-muted uppercase sm:text-[.7rem]">{{ __('site.metrics.applicator') }}</span>
        </div>
    </div>
</section>
