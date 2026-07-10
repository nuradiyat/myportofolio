@props(['experience'])

@php
    $periodStart = $experience->start_date ? $experience->start_date->format('M Y') : '-';
    $periodEnd = $experience->end_date ? $experience->end_date->format('M Y') : 'Sekarang';
@endphp

<article
    class="group flex h-full flex-col overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">

    {{-- IMAGE --}}
    <div class="relative overflow-hidden">
        <img src="{{ $experience->image ? Storage::url($experience->image) : 'https://placehold.co/800x500/e2e8f0/64748b?text=Experience' }}"
            alt="{{ $experience->organization }}" loading="lazy"
            class="h-52 w-full object-cover transition duration-500 group-hover:scale-105 sm:h-56">

        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/40 via-slate-900/10 to-transparent"></div>

        {{-- BADGE --}}
        @if ($experience->type)
            <div class="absolute left-4 top-4">
                <span
                    class="inline-flex items-center rounded-full bg-white/95 px-3 py-1 text-[11px] font-semibold text-slate-800 shadow backdrop-blur">
                    {{ $experience->type }}
                </span>
            </div>
        @endif
    </div>

    {{-- CONTENT --}}
    <div class="flex flex-1 flex-col p-6 sm:p-7">

        {{-- HEADER --}}
        <div>
            <h3
                class="line-clamp-2 text-lg font-bold leading-snug text-slate-900 transition group-hover:text-blue-600 sm:text-xl">
                {{ $experience->organization }}
            </h3>

            <p class="mt-1 text-sm font-medium text-blue-600 sm:text-[15px]">
                {{ $experience->position ?: 'Posisi tidak tersedia' }}
            </p>
        </div>

        {{-- DESCRIPTION --}}
        @if ($experience->description)
            <p class="mt-4 line-clamp-3 text-sm leading-7 text-slate-600">
                {{ $experience->description }}
            </p>
        @endif

        {{-- DIVIDER --}}
        <div class="my-5 h-px bg-slate-100"></div>

        {{-- INFO GRID --}}
        <div class="grid gap-4 sm:grid-cols-2">

            {{-- PERIODE --}}
            <div class="rounded-2xl bg-slate-50 p-4">
                <p class="text-[11px] font-semibold uppercase tracking-wide text-slate-500">
                    Periode
                </p>
                <p class="mt-2 text-sm font-semibold text-slate-800 leading-6">
                    {{ $periodStart }} - {{ $periodEnd }}
                </p>
            </div>

            {{-- TYPE --}}
            <div class="rounded-2xl bg-slate-50 p-4">
                <p class="text-[11px] font-semibold uppercase tracking-wide text-slate-500">
                    Kategori
                </p>
                <p class="mt-2 text-sm font-semibold text-slate-800 leading-6">
                    {{ $experience->type ?: 'Tidak dicantumkan' }}
                </p>
            </div>

        </div>

        {{-- FOOTER (INI DIPERBAIKI) ini simpen kita lanjut file lain, karena kita belum slug jadi belum tau mau pake fiytr show atau tidak --}}
        {{-- <div class="mt-6 flex items-center justify-between border-t border-slate-100 pt-5">

            <span class="text-sm font-semibold text-slate-700 transition group-hover:text-blue-600">
                Lihat Detail
            </span>

             cuma ini belum ada slug gimana lihat detail bisa aja si pake id
            <a href="{{ route('projects.show', $project->slug) }}"
                class="text-sm font-semibold text-slate-700 transition hover:text-blue-700">
                View Details
                <x-heroicon-o-arrow-right class="h-4 w-4" />
            </a>

            <span
                class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-slate-100 text-slate-600 transition group-hover:bg-blue-600 group-hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
            </span>

        </div> --}}

    </div>
</article>
