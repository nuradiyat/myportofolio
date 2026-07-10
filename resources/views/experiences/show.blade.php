@extends('layouts.app')

@section('title', $experience->organization . ' - Experience')

@section('content')
    <section class="bg-slate-50 pt-32 pb-16 sm:pt-36 sm:pb-20">
        <div class="container mx-auto px-6">
            {{-- Back link --}}
            <div class="mb-8">
                <a href="{{ route('home') . '#experiences' }}"
                    class="inline-flex items-center gap-2 text-sm font-medium text-slate-600 transition hover:text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                    Kembali ke Experience
                </a>
            </div>

            <div class="grid gap-8 xl:grid-cols-[minmax(0,1.6fr)_380px]">
                {{-- Main Content --}}
                <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">
                    {{-- Cover Image --}}
                    <div class="relative overflow-hidden border-b border-slate-100 bg-slate-100">
                        <img src="{{ $experience->image ? Storage::url($experience->image) : 'https://placehold.co/1400x800/e2e8f0/64748b?text=Experience' }}"
                            alt="{{ $experience->organization }}" class="h-64 w-full object-cover sm:h-80 lg:h-[440px]">

                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/60 via-slate-900/10 to-transparent">
                        </div>

                        @if ($experience->type)
                            <div class="absolute left-6 top-6">
                                <span
                                    class="inline-flex items-center rounded-full border border-white/20 bg-white/90 px-4 py-2 text-sm font-semibold text-slate-800 shadow backdrop-blur">
                                    {{ $experience->type }}
                                </span>
                            </div>
                        @endif
                    </div>

                    {{-- Content Body --}}
                    <div class="p-6 sm:p-8 lg:p-10">
                        {{-- Header --}}
                        <div class="border-b border-slate-100 pb-6">
                            <p class="text-sm font-semibold uppercase tracking-[0.18em] text-blue-600">
                                Experience Detail
                            </p>

                            <h1 class="mt-3 text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">
                                {{ $experience->organization }}
                            </h1>

                            <p class="mt-3 text-lg font-medium text-slate-600">
                                {{ $experience->position ?: 'Posisi tidak tersedia' }}
                            </p>
                        </div>

                        {{-- Description --}}
                        <div class="pt-8">
                            <h2 class="text-xl font-bold text-slate-900 sm:text-2xl">
                                Deskripsi Pengalaman
                            </h2>

                            @if ($experience->description)
                                <div class="mt-4 rounded-2xl bg-slate-50 p-5 sm:p-6">
                                    <p class="whitespace-pre-line text-[15px] leading-8 text-slate-700">
                                        {{ $experience->description }}
                                    </p>
                                </div>
                            @else
                                <div class="mt-4 rounded-2xl border border-dashed border-slate-200 bg-slate-50 p-6">
                                    <p class="text-sm text-slate-500">
                                        Deskripsi pengalaman belum tersedia.
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Sidebar --}}
                <aside class="space-y-6">
                    {{-- Info Card --}}
                    <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
                        <h2 class="text-2xl font-bold text-slate-900">
                            Informasi Pengalaman
                        </h2>

                        <div class="mt-6 space-y-4">
                            <div class="rounded-2xl bg-slate-50 p-5">
                                <p class="text-xs font-semibold uppercase tracking-[0.16em] text-slate-500">
                                    Instansi / Organisasi
                                </p>
                                <p class="mt-2 text-base font-semibold text-slate-900">
                                    {{ $experience->organization }}
                                </p>
                            </div>

                            <div class="rounded-2xl bg-slate-50 p-5">
                                <p class="text-xs font-semibold uppercase tracking-[0.16em] text-slate-500">
                                    Jabatan
                                </p>
                                <p class="mt-2 text-base font-semibold text-slate-900">
                                    {{ $experience->position ?: '-' }}
                                </p>
                            </div>

                            <div class="rounded-2xl bg-slate-50 p-5">
                                <p class="text-xs font-semibold uppercase tracking-[0.16em] text-slate-500">
                                    Jenis Pengalaman
                                </p>
                                <p class="mt-2 text-base font-semibold text-slate-900">
                                    {{ $experience->type ?: '-' }}
                                </p>
                            </div>

                            <div class="rounded-2xl bg-slate-50 p-5">
                                <p class="text-xs font-semibold uppercase tracking-[0.16em] text-slate-500">
                                    Tanggal Mulai
                                </p>
                                <p class="mt-2 text-base font-semibold text-slate-900">
                                    {{ $experience->start_date ? $experience->start_date->translatedFormat('d F Y') : '-' }}
                                </p>
                            </div>

                            <div class="rounded-2xl bg-slate-50 p-5">
                                <p class="text-xs font-semibold uppercase tracking-[0.16em] text-slate-500">
                                    Tanggal Selesai
                                </p>
                                <p class="mt-2 text-base font-semibold text-slate-900">
                                    {{ $experience->end_date ? $experience->end_date->translatedFormat('d F Y') : 'Sekarang' }}
                                </p>
                            </div>

                            <div class="rounded-2xl bg-slate-50 p-5">
                                <p class="text-xs font-semibold uppercase tracking-[0.16em] text-slate-500">
                                    Periode
                                </p>
                                <p class="mt-2 text-base font-semibold text-slate-900">
                                    {{ $experience->start_date ? $experience->start_date->translatedFormat('M Y') : '-' }}
                                    —
                                    {{ $experience->end_date ? $experience->end_date->translatedFormat('M Y') : 'Sekarang' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Action Card --}}
                    <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
                        <h2 class="text-xl font-bold text-slate-900">
                            Navigasi
                        </h2>

                        <div class="mt-5 flex flex-col gap-3">
                            <a href="{{ route('home') . '#experiences' }}"
                                class="inline-flex items-center justify-center rounded-2xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-blue-700">
                                Kembali ke Experience
                            </a>

                            <a href="{{ route('home') }}"
                                class="inline-flex items-center justify-center rounded-2xl border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-700 transition hover:border-blue-500 hover:text-blue-600">
                                Kembali ke Home
                            </a>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
@endsection