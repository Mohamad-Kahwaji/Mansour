@if ($certificates->isNotEmpty())
    <section class="border-t border-cream-line bg-cream-2 py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-10">
            <span class="inline-flex items-center gap-3 font-display text-xs font-semibold tracking-[.24em] text-gold uppercase">
                <span class="h-px w-8 bg-current opacity-60"></span>
                {{ __('site.certificates.eyebrow') }}
            </span>
            <h2 class="font-display mt-4 text-2xl font-bold tracking-tight">{{ __('site.certificates.heading') }}</h2>

            <div class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($certificates as $certificate)
                    <div class="flex items-center gap-4 border border-cream-line bg-white p-5">
                        @if ($cover = $certificate->getFirstMediaUrl('cover'))
                            <a href="#cert-{{ $certificate->id }}" class="block shrink-0">
                                <img src="{{ $cover }}" alt="{{ $certificate->title }}" class="h-12 w-12 rounded object-cover transition hover:opacity-80">
                            </a>
                        @endif
                        <div>
                            <b class="font-display block text-sm">{{ $certificate->title }}</b>
                            <span class="text-xs text-onlight-muted">{{ $certificate->issuer }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        @foreach ($certificates as $certificate)
            @if ($cover = $certificate->getFirstMediaUrl('cover'))
                <div id="cert-{{ $certificate->id }}" class="target:flex fixed inset-0 z-50 hidden items-center justify-center bg-ink/95 p-6">
                    <a href="#" class="absolute end-6 top-6 text-3xl leading-none text-ondark" aria-label="Close">&times;</a>
                    <img src="{{ $cover }}" alt="{{ $certificate->title }}" class="max-h-[85vh] max-w-full object-contain">
                </div>
            @endif
        @endforeach
    </section>
@endif
