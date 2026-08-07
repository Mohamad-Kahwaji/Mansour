@if ($companies->isNotEmpty())
    <section id="group" class="bg-cream py-16 sm:py-24 lg:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-10">
            <div class="max-w-xl">
                <span class="inline-flex items-center gap-3 font-display text-xs font-semibold tracking-[.24em] text-gold uppercase">
                    <span class="h-px w-8 bg-current opacity-60"></span>
                    {{ __('site.group.eyebrow') }}
                </span>
                <h2 class="font-display mt-5 text-2xl leading-tight font-bold tracking-tight sm:text-3xl lg:text-4xl">
                    {{ __('site.group.heading') }}
                </h2>
                <p class="mt-4 text-onlight-muted">{{ __('site.group.description') }}</p>
            </div>

            <div class="mt-10 grid gap-6 sm:mt-14 md:grid-cols-2">
                @foreach ($companies as $company)
                    <div class="relative border border-cream-line bg-white p-6 ps-7 sm:p-10 sm:ps-11">
                        <span class="absolute inset-y-6 start-0 w-0.5 bg-gold sm:inset-y-10"></span>

                        @if ($logo = $company->getFirstMediaUrl('logo'))
                            <img src="{{ $logo }}" alt="{{ $company->title }}" class="mb-4 h-10 w-auto">
                        @endif

                        <div class="font-display text-xs font-bold tracking-[.18em] text-gold uppercase">{{ $company->code }}</div>
                        <h3 class="font-display mt-3 text-2xl font-bold tracking-tight">{{ $company->title }}</h3>
                        <p class="mt-4 text-sm text-onlight-muted">{{ $company->description }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
