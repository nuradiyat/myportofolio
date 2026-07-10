<section id="testimonials" class="overflow-x-hidden bg-white py-24">
    <div class="container mx-auto px-6">
        <div class="grid items-center gap-12 lg:grid-cols-[320px_minmax(0,1fr)] xl:grid-cols-[360px_minmax(0,1fr)]">

            {{-- Left Content --}}
            <div class="max-w-md min-w-0" data-aos="fade-right">
                <p class="text-sm font-semibold uppercase tracking-[0.18em] text-blue-600">
                    Testimonials
                </p>

                <h2 class="mt-4 text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">
                    Feedback & Testimonials
                </h2>

                <p class="mt-5 text-base leading-8 text-slate-600 sm:text-lg">
                    Beberapa testimoni dari rekan kerja, tim, maupun pihak yang pernah bekerja sama dengan saya.
                </p>

                @if ($testimonials->count() > 1)
                    <div class="mt-8 flex items-center gap-3">
                        <button type="button" id="testimonial-prev"
                            class="inline-flex h-11 w-11 shrink-0 items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-700 shadow-sm transition hover:border-blue-500 hover:text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 18l-6-6 6-6" />
                            </svg>
                        </button>

                        <button type="button" id="testimonial-next"
                            class="inline-flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-blue-600 text-white shadow-sm transition hover:bg-blue-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 6l6 6-6 6" />
                            </svg>
                        </button>
                    </div>
                @endif
            </div>

            {{-- Right Content --}}
            <div class="relative min-w-0 overflow-hidden" data-aos="fade-left">
                @if ($testimonials->isNotEmpty())
                    {{-- Fade kiri --}}
                    <div
                        class="pointer-events-none absolute inset-y-0 left-0 z-10 hidden w-12 bg-gradient-to-r from-white to-transparent lg:block">
                    </div>

                    {{-- Fade kanan --}}
                    <div
                        class="pointer-events-none absolute inset-y-0 right-0 z-10 hidden w-12 bg-gradient-to-l from-white to-transparent lg:block">
                    </div>

                    <div id="testimonial-slider"
                        class="flex w-full min-w-0 gap-6 overflow-x-auto scroll-smooth py-2 [-ms-overflow-style:none] [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
                        @foreach ($testimonials as $testimonial)
                            <x-card.testimonial-card :testimonial="$testimonial" />
                        @endforeach
                    </div>
                @else
                    <div class="w-full">
                        <x-ui.empty-state title="Belum Ada Testimoni"
                            description="Testimoni akan ditampilkan setelah ditambahkan melalui Dashboard Admin." />
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
