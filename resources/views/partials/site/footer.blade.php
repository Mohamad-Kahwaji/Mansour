<footer id="contact" class="bg-ink text-ondark">
    <div class="mx-auto max-w-7xl border-b border-ink-line px-4 py-12 sm:px-6 sm:py-16 lg:px-10">
        <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-[1.5fr_1fr_1fr_1.2fr]">
            <div>
                <div class="flex items-center gap-3">
                    @if ($siteSettings?->logo)
                        <img src="{{ asset('storage/'.$siteSettings->logo) }}" alt="{{ $siteSettings->site_name }}" class="h-8 w-auto max-w-[120px] shrink-0 object-contain">
                    @endif
                    <div class="font-display text-lg font-bold tracking-wide">{{ $siteSettings?->site_name }}</div>
                </div>
                <p class="mt-3 text-sm text-ondark-muted">{{ $siteSettings?->tagline }}</p>

                <div class="mt-5 flex gap-3">
                    @if ($siteSettings?->facebook_url)
                        <a href="{{ $siteSettings->facebook_url }}" target="_blank" rel="noopener" class="flex h-9 w-9 items-center justify-center border border-ink-line transition hover:border-gold-bright" aria-label="Facebook">
                            <svg viewBox="0 0 24 24" class="h-4 w-4" fill="currentColor"><path d="M14 9h3V6h-3c-2 0-3 1.3-3 3v2H8v3h3v7h3v-7h3l1-3h-4V9c0-.6.4-1 1-1z"/></svg>
                        </a>
                    @endif
                    @if ($siteSettings?->instagram_url)
                        <a href="{{ $siteSettings->instagram_url }}" target="_blank" rel="noopener" class="flex h-9 w-9 items-center justify-center border border-ink-line transition hover:border-gold-bright" aria-label="Instagram">
                            <svg viewBox="0 0 24 24" class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/></svg>
                        </a>
                    @endif
                    @if ($siteSettings?->x_url)
                        <a href="{{ $siteSettings->x_url }}" target="_blank" rel="noopener" class="flex h-9 w-9 items-center justify-center border border-ink-line transition hover:border-gold-bright" aria-label="X">
                            <svg viewBox="0 0 24 24" class="h-4 w-4" fill="currentColor"><path d="M22 5.8c-.7.3-1.5.5-2.3.6.8-.5 1.4-1.3 1.7-2.2-.8.5-1.7.8-2.6 1a4 4 0 0 0-6.8 3.6A11.3 11.3 0 0 1 3.8 4.6a4 4 0 0 0 1.2 5.3c-.6 0-1.2-.2-1.7-.5a4 4 0 0 0 3.2 4c-.5.1-1 .2-1.6.1a4 4 0 0 0 3.7 2.8A8 8 0 0 1 2 18a11.3 11.3 0 0 0 6.1 1.8c7.4 0 11.5-6.2 11.5-11.5v-.5c.8-.6 1.5-1.3 2-2z"/></svg>
                        </a>
                    @endif
                    @if ($siteSettings?->linkedin_url)
                        <a href="{{ $siteSettings->linkedin_url }}" target="_blank" rel="noopener" class="flex h-9 w-9 items-center justify-center border border-ink-line transition hover:border-gold-bright" aria-label="LinkedIn">
                            <svg viewBox="0 0 24 24" class="h-4 w-4" fill="currentColor"><path d="M4.98 3.5a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5zM3 9h4v12H3V9zm7 0h3.8v1.7h.05c.53-1 1.83-2 3.77-2 4.03 0 4.78 2.65 4.78 6.1V21h-4v-5.6c0-1.34-.02-3.06-1.87-3.06-1.87 0-2.16 1.46-2.16 2.96V21h-4V9z"/></svg>
                        </a>
                    @endif
                </div>
            </div>

            <div>
                <h5 class="font-display mb-4 text-[.76rem] font-semibold tracking-[.16em] text-ondark uppercase">{{ __('site.footer.explore') }}</h5>
                <ul class="grid gap-2.5 text-sm text-ondark-muted">
                    <li><a href="{{ route('home') }}#group" class="transition hover:text-gold-bright">{{ __('site.nav.group') }}</a></li>
                    <li><a href="{{ route('services.index') }}" class="transition hover:text-gold-bright">{{ __('site.nav.services') }}</a></li>
                    <li><a href="{{ route('projects.index') }}" class="transition hover:text-gold-bright">{{ __('site.nav.projects') }}</a></li>
                    <li><a href="{{ route('home') }}#fire" class="transition hover:text-gold-bright">{{ __('site.nav.firestopping') }}</a></li>
                </ul>
            </div>

            <div>
                <h5 class="font-display mb-4 text-[.76rem] font-semibold tracking-[.16em] text-ondark uppercase">{{ __('site.footer.contact') }}</h5>
                <ul class="grid gap-2.5 text-sm text-ondark-muted">
                    @if ($siteSettings?->phone)
                        <li><a href="tel:{{ $siteSettings->phone }}" class="transition hover:text-gold-bright">{{ $siteSettings->phone }}</a></li>
                    @endif
                    @if ($siteSettings?->whatsapp)
                        <li><a href="https://wa.me/{{ preg_replace('/\D/', '', $siteSettings->whatsapp) }}" target="_blank" rel="noopener" class="transition hover:text-gold-bright">{{ $siteSettings->whatsapp }}</a></li>
                    @endif
                    @if ($siteSettings?->email)
                        <li><a href="mailto:{{ $siteSettings->email }}" class="transition hover:text-gold-bright">{{ $siteSettings->email }}</a></li>
                    @endif
                </ul>
            </div>

            <div>
                <h5 class="font-display mb-4 text-[.76rem] font-semibold tracking-[.16em] text-ondark uppercase">{{ __('site.footer.visit_us') }}</h5>
                <p class="text-sm text-ondark-muted">{{ $siteSettings?->address }}</p>
            </div>
        </div>
    </div>

    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-10">
        <div class="flex flex-wrap items-center justify-between gap-3 text-sm text-ondark-muted">
            <span>&copy; {{ now()->year }} {{ $siteSettings?->site_name }}. {{ __('site.footer.rights') }}</span>
        </div>
    </div>
</footer>
