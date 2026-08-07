@if ($services->isNotEmpty())
    <section id="services" class="bg-cream-2 py-16 sm:py-24 lg:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-10">
            <div class="flex flex-wrap items-end justify-between gap-6">
                <div class="max-w-xl">
                    <span class="inline-flex items-center gap-3 font-display text-xs font-semibold tracking-[.24em] text-gold uppercase">
                        <span class="h-px w-8 bg-current opacity-60"></span>
                        {{ __('site.services.eyebrow') }}
                    </span>
                    <h2 class="font-display mt-5 text-2xl leading-tight font-bold tracking-tight sm:text-3xl lg:text-4xl">
                        {{ __('site.services.heading') }}
                    </h2>
                </div>
                <a href="{{ route('services.index') }}" class="font-display shrink-0 border border-onlight/20 px-6 py-3 text-sm font-semibold text-onlight transition hover:border-gold hover:text-gold">
                    {{ __('site.services.view_all') }}
                </a>
            </div>

            <div class="mt-10 grid gap-px border border-cream-line bg-cream-line sm:mt-14 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($services as $service)
                    @include('partials.site.service-card', ['service' => $service])
                @endforeach
            </div>
        </div>

        @foreach ($services as $service)
            @include('partials.site.service-image-modal', ['service' => $service])
        @endforeach
    </section>
@endif
