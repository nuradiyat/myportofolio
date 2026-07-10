@props(['certificate'])

<article
    class="group flex h-full flex-col overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">

    {{-- Thumbnail --}}
    <div class="relative overflow-hidden">
        <img src="{{ $certificate->thumbnail ? Storage::url($certificate->thumbnail) : 'https://placehold.co/800x500/e2e8f0/64748b?text=Certificate' }}"
            alt="{{ $certificate->title }}" loading="lazy"
            class="h-44 w-full object-cover transition duration-500 group-hover:scale-105 sm:h-48">

        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/20 via-transparent to-transparent"></div>

        @if ($certificate->issue_year)
            <div class="absolute left-3 top-3">
                <span
                    class="inline-flex items-center rounded-full bg-white/95 px-2.5 py-1 text-[11px] font-semibold text-slate-800 shadow-sm backdrop-blur">
                    {{ $certificate->issue_year }}
                </span>
            </div>
        @endif
    </div>

    {{-- Content --}}
    <div class="flex flex-1 flex-col p-5">

        {{-- Header --}}
        <div>
            <h3 class="line-clamp-2 text-lg font-bold leading-snug text-slate-900">
                {{ $certificate->title }}
            </h3>

            <p class="mt-1.5 text-sm font-medium text-blue-600">
                {{ $certificate->issuer ?: 'Lembaga penerbit tidak tersedia' }}
            </p>
        </div>

        {{-- Description --}}
        <p class="mt-3 line-clamp-3 text-sm leading-6 text-slate-600">
            {{ $certificate->description ?: 'Sertifikat ini merupakan bagian dari pengembangan kompetensi dan validasi kemampuan profesional.' }}
        </p>

        {{-- Info --}}
        <div class="mt-5 grid gap-3 sm:grid-cols-2">
            <div class="rounded-xl bg-slate-50 p-3">
                <p class="text-[11px] font-semibold uppercase tracking-wide text-slate-500">
                    Nomor Sertifikat
                </p>
                <p class="mt-1.5 break-words text-sm font-medium text-slate-800">
                    {{ $certificate->certificate_number ?: '-' }}
                </p>
            </div>

            <div class="rounded-xl bg-slate-50 p-3">
                <p class="text-[11px] font-semibold uppercase tracking-wide text-slate-500">
                    Masa Berlaku
                </p>
                <p class="mt-1.5 text-sm font-medium text-slate-800">
                    {{ $certificate->expired_at ? $certificate->expired_at->format('d M Y') : '-' }}
                </p>
            </div>
        </div>

        {{-- Actions --}}
        @if ($certificate->credential_url || $certificate->pdf_file)
            <div class="mt-5 flex flex-wrap gap-3 border-t border-slate-100 pt-4">

                @if ($certificate->credential_url)
                    <a href="{{ $certificate->credential_url }}" target="_blank" rel="noopener noreferrer"
                        class="inline-flex items-center gap-2 rounded-xl bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-blue-700">
                        <x-heroicon-o-globe-alt class="h-4 w-4" />
                        Credential
                    </a>
                @endif

                @if ($certificate->pdf_file)
                    <a href="{{ Storage::url($certificate->pdf_file) }}" target="_blank" rel="noopener noreferrer"
                        class="inline-flex items-center gap-2 rounded-xl border border-slate-300 px-4 py-2.5 text-sm font-semibold text-slate-700 transition hover:bg-slate-100">
                        <x-heroicon-o-arrow-down-tray class="h-4 w-4" />
                        PDF
                    </a>
                @endif

            </div>
        @endif
    </div>
</article>