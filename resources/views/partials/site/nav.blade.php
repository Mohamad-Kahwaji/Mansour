<header class="absolute inset-x-0 top-0 z-40">
    <input type="checkbox" id="nav-toggle" class="peer hidden">

    <div class="mx-auto flex max-w-7xl items-center gap-4 px-4 py-5 sm:gap-8 sm:px-6 sm:py-6 lg:px-10">
        <a href="{{ route('home') }}" class="flex min-w-0 items-center gap-2 text-ondark sm:gap-3">
            @if ($siteSettings?->logo)
                <img src="{{ asset('storage/'.$siteSettings->logo) }}" alt="{{ $siteSettings->site_name }}" class="h-8 w-auto max-w-[120px] shrink-0 object-contain sm:h-10">
            @else
                <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-sm bg-gold-bright/10 text-gold-bright sm:h-9 sm:w-9">
                    <svg viewBox="0 0 24 24" class="h-4 w-4 sm:h-5 sm:w-5" fill="currentColor" aria-hidden="true">
                        <path d="M3 20 L3 7 L8 12 L12 5 L16 12 L21 7 L21 20 Z" />
                    </svg>
                </span>
            @endif
            <span class="font-display truncate text-xs font-bold tracking-wide sm:text-sm">
                {{ $siteSettings?->site_name }}
            </span>
        </a>

        <nav class="hidden items-center gap-8 font-display text-sm font-medium text-ondark-muted lg:flex">
            <a href="{{ route('home') }}#group" class="transition hover:text-ondark">{{ __('site.nav.group') }}</a>
            <a href="{{ route('services.index') }}" class="transition hover:text-ondark">{{ __('site.nav.services') }}</a>
            <a href="{{ route('projects.index') }}" class="transition hover:text-ondark">{{ __('site.nav.projects') }}</a>
            <a href="{{ route('home') }}#fire" class="transition hover:text-ondark">{{ __('site.nav.firestopping') }}</a>
        </nav>

        <div class="ms-auto flex shrink-0 items-center gap-2 sm:gap-4">
            <div class="flex items-center gap-1 font-display text-xs font-semibold text-ondark-muted">
                @foreach (['ar' => 'ع', 'en' => 'EN'] as $code => $label)
                    <a href="{{ route('locale.switch', $code) }}" class="px-1.5 py-1 transition sm:px-2 {{ app()->getLocale() === $code ? 'text-gold-bright' : 'hover:text-ondark' }}">
                        {{ $label }}
                    </a>
                    @if (! $loop->last)
                        <span class="text-ink-line">/</span>
                    @endif
                @endforeach
            </div>

            @if ($siteSettings?->whatsapp)
                <a href="https://wa.me/{{ preg_replace('/\D/', '', $siteSettings->whatsapp) }}?text={{ urlencode(__('site.nav.request_quote_message')) }}"
                    target="_blank" rel="noopener"
                    class="hidden font-display text-sm font-semibold text-ink transition bg-gold-bright px-5 py-2.5 hover:bg-gold-dark lg:inline-block">
                    {{ __('site.nav.request_quote') }}
                </a>
            @endif

            <label for="nav-toggle" class="cursor-pointer text-ondark lg:hidden" aria-label="Menu">
                <svg viewBox="0 0 24 24" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.8">
                    <path d="M4 7h16M4 12h16M4 17h16" />
                </svg>
            </label>
        </div>
    </div>

    <div class="hidden border-t border-ink-line bg-ink px-4 py-4 peer-checked:block sm:px-6 lg:hidden">
        <nav class="flex flex-col gap-4 font-display text-sm font-medium text-ondark-muted">
            <a href="{{ route('home') }}#group" class="hover:text-ondark">{{ __('site.nav.group') }}</a>
            <a href="{{ route('services.index') }}" class="hover:text-ondark">{{ __('site.nav.services') }}</a>
            <a href="{{ route('projects.index') }}" class="hover:text-ondark">{{ __('site.nav.projects') }}</a>
            <a href="{{ route('home') }}#fire" class="hover:text-ondark">{{ __('site.nav.firestopping') }}</a>

            @if ($siteSettings?->whatsapp)
                <a href="https://wa.me/{{ preg_replace('/\D/', '', $siteSettings->whatsapp) }}?text={{ urlencode(__('site.nav.request_quote_message')) }}"
                    target="_blank" rel="noopener"
                    class="font-display mt-2 inline-block bg-gold-bright px-5 py-2.5 text-center text-sm font-semibold text-ink">
                    {{ __('site.nav.request_quote') }}
                </a>
            @endif
        </nav>
    </div>
</header>
