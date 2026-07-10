<section id="certificates" class="bg-white py-24">
    <div class="container mx-auto px-6">

        <x-section-title title="Certificates" subtitle="Professional Certifications & Achievements"
            description="Berikut adalah sertifikat yang saya miliki dari pelatihan, kursus, dan sertifikasi kompetensi." />

        @if ($certificates->isNotEmpty())
            <div x-data="{
                expanded: false,
                initialLimit: {{ $certificateInitialLimit }}
            }" class="mt-14">
                {{-- Certificate Grid --}}
                <div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-3">
                    @foreach ($certificates as $certificate)
                        <div x-show="expanded || {{ $loop->index }} < initialLimit"
                            x-transition:enter="transition ease-out duration-500"
                            x-transition:enter-start="opacity-0 translate-y-6"
                            x-transition:enter-end="opacity-100 translate-y-0" class="h-full" data-aos="fade-up"
                            data-aos-delay="{{ ($loop->iteration <= $certificateInitialLimit ? $loop->iteration : $loop->iteration - $certificateInitialLimit) * 80 }}">
                            <x-card.certificate-card :certificate="$certificate" />
                        </div>
                    @endforeach
                </div>

                {{-- Toggle Button --}}
                @if ($hasMoreCertificates)
                    <div class="mt-12 text-center">
                        <button type="button" @click="expanded = !expanded"
                            class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-300 bg-white px-6 py-3 text-sm font-semibold text-slate-700 shadow-sm transition hover:border-blue-500 hover:text-blue-600 hover:shadow">
                            <span x-show="!expanded">View All Certificates</span>
                            <span x-show="expanded">Show Less</span>

                            <svg x-bind:class="expanded ? 'rotate-180' : ''"
                                class="h-5 w-5 transition-transform duration-300" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                    </div>
                @endif
            </div>
        @else
            <div class="mt-14">
                <x-ui.empty-state title="Belum Ada Sertifikat"
                    description="Data sertifikat akan ditampilkan setelah ditambahkan melalui Dashboard Admin." />
            </div>
        @endif

    </div>
</section>