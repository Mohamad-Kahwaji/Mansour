@if ($firestopping)
    <section id="fire" class="bg-cream py-16 sm:py-24 lg:py-28">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:gap-12 sm:px-6 md:grid-cols-[1.15fr_.85fr] md:items-center lg:px-10">
            <div>
                <span class="inline-flex items-center gap-3 font-display text-xs font-semibold tracking-[.24em] text-gold uppercase">
                    <span class="h-px w-8 bg-current opacity-60"></span>
                    {{ __('site.fire.eyebrow') }}
                </span>
                <h2 class="font-display mt-5 text-2xl leading-tight font-bold tracking-tight sm:text-3xl lg:text-4xl">
                    {{ $firestopping->heading }}
                </h2>
                <p class="mt-4 max-w-xl text-onlight-muted">{{ $firestopping->description }}</p>

                @if (! empty($firestopping->badges))
                    <div class="mt-7 flex flex-wrap gap-4">
                        @foreach ($firestopping->badges as $badge)
                            <div class="inline-flex items-center gap-4 border border-cream-line bg-white px-5 py-3.5 sm:px-6 sm:py-4">
                                <div class="flex h-11 w-11 shrink-0 items-center justify-center border-2 border-[#10528a] font-display text-sm font-bold text-[#10528a]">
                                    {{ strtoupper(\Illuminate\Support\Str::before($badge['title'] ?? '', ' ')) }}
                                </div>
                                <div>
                                    <b class="font-display block text-sm">{{ $badge['title'] ?? '' }}</b>
                                    <span class="text-[.76rem] text-onlight-muted">{{ $badge['subtitle_'.app()->getLocale()] ?? '' }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            @php $visuals = $firestopping->getMedia('visual'); @endphp

            @if ($visuals->isEmpty())
                <div class="relative flex aspect-4/3 items-center justify-center border border-cream-line"
                    style="background: linear-gradient(155deg, #2b2820, #17140f);">
                    <span class="absolute inset-y-0 start-0 w-1 bg-gold-bright"></span>
                    <svg viewBox="0 0 24 24" class="h-22 w-22 text-gold-bright" fill="none" stroke="currentColor" stroke-width="1.3">
                        <path d="M12 2c2.5 4 6 6.5 6 11a6 6 0 0 1-12 0c0-1.4.6-2.8 1.4-4 .6 2 2.6 2.6 2.6 2.6s-1.4-4 2-9.6z" />
                    </svg>
                </div>
            @else
                <div class="relative ps-3">
                    <span class="absolute inset-y-0 start-0 w-1 bg-gold-bright"></span>
                    <div class="grid {{ $visuals->count() === 1 ? 'grid-cols-1' : 'grid-cols-2' }} gap-2">
                        @foreach ($visuals as $index => $media)
                            <a href="#fire-visual-{{ $index }}" class="block aspect-square overflow-hidden border border-cream-line {{ $visuals->count() === 1 ? 'aspect-4/3' : '' }}">
                                <img src="{{ $media->getUrl() }}" alt="{{ $firestopping->heading }}" class="h-full w-full object-cover transition hover:scale-105">
                            </a>
                        @endforeach
                    </div>
                </div>

                @foreach ($visuals as $index => $media)
                    <div id="fire-visual-{{ $index }}" class="target:flex fixed inset-0 z-50 hidden items-center justify-center bg-ink/95 p-6">
                        <a href="#" class="absolute end-6 top-6 text-3xl leading-none text-ondark" aria-label="Close">&times;</a>
                        <img src="{{ $media->getUrl() }}" alt="{{ $firestopping->heading }}" class="max-h-[85vh] max-w-full object-contain">
                    </div>
                @endforeach
            @endif
        </div>
    </section>
@endif
