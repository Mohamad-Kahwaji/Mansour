<section class="relative overflow-hidden bg-ink text-ondark">
    <div class="mx-auto grid max-w-7xl gap-10 px-4 pt-32 pb-14 sm:gap-12 sm:px-6 sm:pt-36 sm:pb-16 lg:grid-cols-[1.08fr_.92fr] lg:items-center lg:px-10 lg:pt-40 lg:pb-24">
        <div>
            <span class="inline-flex items-center gap-3 font-display text-xs font-semibold tracking-[.24em] text-gold-bright uppercase">
                <span class="h-px w-8 bg-current opacity-60"></span>
                {{ __('site.hero.eyebrow') }}
            </span>

            <h1 class="font-display mt-5 text-3xl leading-[1.1] font-bold tracking-tight text-balance sm:mt-6 sm:text-5xl sm:leading-[1.05] lg:text-6xl">
                {{ $siteSettings?->tagline }}
            </h1>

            <p class="mt-5 max-w-xl text-base text-ondark-muted sm:mt-6 sm:text-lg">
                {{ $siteSettings?->about }}
            </p>

            <div class="mt-7 flex flex-wrap gap-3 sm:mt-9 sm:gap-4">
                <a href="{{ route('projects.index') }}" class="font-display bg-gold-bright text-ink px-6 py-3.5 text-sm font-semibold transition hover:-translate-y-0.5 sm:px-8 sm:py-4">
                    {{ __('site.hero.cta_work') }}
                </a>
                <a href="{{ route('services.index') }}" class="font-display border border-ink-line px-6 py-3.5 text-sm font-semibold text-ondark transition hover:border-gold-bright hover:text-gold-bright sm:px-8 sm:py-4">
                    {{ __('site.hero.cta_services') }}
                </a>
            </div>

            <div class="font-display mt-9 flex gap-6 sm:mt-12 sm:gap-8">
                @if ($siteSettings?->established_location || $siteSettings?->established_year)
                    <div>
                        <span class="block text-[.68rem] tracking-[.16em] text-ondark-muted uppercase">{{ __('site.hero.established_label') }}</span>
                        <b class="text-sm font-bold tracking-wide sm:text-base">
                            {{ collect([$siteSettings->established_location, $siteSettings->established_year])->filter()->implode(' · ') }}
                        </b>
                    </div>
                @endif
                <div>
                    <span class="block text-[.68rem] tracking-[.16em] text-ondark-muted uppercase">{{ __('site.hero.certified_label') }}</span>
                    <b class="text-sm font-bold tracking-wide sm:text-base">STI — USA</b>
                </div>
            </div>
        </div>

        <div class="relative h-[280px] sm:h-[380px] lg:h-[64vh] lg:min-h-[440px]">
            <div class="absolute inset-y-[8%] start-[9%] z-10 w-0.5 bg-gold-bright"></div>
            <div class="absolute inset-0 flex items-center justify-center border border-ink-line [clip-path:polygon(14%_0,100%_0,100%_100%,0_100%)]"
                 style="background: linear-gradient(150deg, #4b4436 0%, #2b2820 46%, #191612 100%);">
                @if ($siteSettings?->logo)
                    <img src="{{ asset('storage/'.$siteSettings->logo) }}" alt="{{ $siteSettings->site_name }}" class="max-h-[60%] max-w-[70%] object-contain logo-ghost-white">
                @endif
            </div>
        </div>
    </div>
</section>
