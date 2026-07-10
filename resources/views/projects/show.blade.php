@extends('layouts.app')

@section('title', $project->title . ' | Project Detail')

@section('content')
    <section class="bg-slate-50 py-24">
        <div class="container mx-auto px-6">

            <div class="grid gap-10 lg:grid-cols-12">

                {{-- Left Content --}}
                <div class="lg:col-span-8">

                    {{-- Thumbnail --}}
                    <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">
                        <img src="{{ $project->thumbnail ? Storage::url($project->thumbnail) : 'https://placehold.co/1200x700/e2e8f0/64748b?text=Project+Thumbnail' }}"
                            alt="{{ $project->title }}" class="h-[260px] w-full object-cover sm:h-[360px] lg:h-[460px]"
                            loading="lazy">
                    </div>

                    {{-- Main Content --}}
                    <div class="mt-8 rounded-3xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">

                        {{-- Header --}}
                        <div
                            class="flex flex-col gap-4 border-b border-slate-200 pb-6 sm:flex-row sm:items-start sm:justify-between">
                            <div class="min-w-0">
                                <p class="text-sm font-semibold uppercase tracking-wide text-blue-600">
                                    Project Detail
                                </p>

                                <h1 class="mt-2 text-2xl font-bold leading-tight text-slate-900 sm:text-3xl lg:text-4xl">
                                    {{ $project->title }}
                                </h1>

                                @if ($project->short_description)
                                    <p class="mt-4 max-w-3xl text-sm leading-7 text-slate-600 sm:text-base">
                                        {{ $project->short_description }}
                                    </p>
                                @endif
                            </div>

                            <div class="shrink-0">
                                <x-ui.badge :text="$project->status" />
                            </div>
                        </div>

                        {{-- Description --}}
                        <div class="mt-8">
                            <h2 class="text-xl font-bold text-slate-900">
                                Deskripsi Project
                            </h2>

                            <div class="mt-4 text-sm leading-8 text-slate-600 sm:text-base">
                                @if ($project->description)
                                    {!! nl2br(e($project->description)) !!}
                                @else
                                    <p>Deskripsi project belum tersedia.</p>
                                @endif
                            </div>
                        </div>

                        {{-- Objective --}}
                        <div class="mt-10">
                            <h2 class="text-xl font-bold text-slate-900">
                                Tujuan Project
                            </h2>

                            <div
                                class="mt-4 rounded-2xl border border-slate-200 bg-slate-50 p-5 text-sm leading-8 text-slate-600 sm:text-base">
                                @if ($project->objective)
                                    {!! nl2br(e($project->objective)) !!}
                                @else
                                    <p>Tujuan project belum tersedia.</p>
                                @endif
                            </div>
                        </div>

                        {{-- Features --}}
                        <div class="mt-10">
                            <h2 class="text-xl font-bold text-slate-900">
                                Fitur Utama
                            </h2>

                            @if (!empty($project->features) && is_array($project->features))
                                <div class="mt-5 grid gap-4 sm:grid-cols-2">
                                    @foreach ($project->features as $feature)
                                        @php
                                            $featureText = is_array($feature) ? $feature['value'] ?? null : $feature;
                                        @endphp

                                        @if (filled($featureText))
                                            <div
                                                class="flex items-start gap-3 rounded-2xl border border-slate-200 bg-white p-4">
                                                <div
                                                    class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-blue-100 text-blue-600">
                                                    <x-heroicon-o-check class="h-4 w-4" />
                                                </div>

                                                <p class="text-sm leading-7 text-slate-600">
                                                    {{ $featureText }}
                                                </p>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @else
                                <div
                                    class="mt-5 rounded-2xl border border-dashed border-slate-300 bg-slate-50 p-5 text-sm text-slate-500">
                                    Fitur utama project belum tersedia.
                                </div>
                            @endif
                        </div>

                        {{-- Gallery --}}
                        @if ($project->galleries->isNotEmpty())
                            <div class="mt-10">
                                <h2 class="text-xl font-bold text-slate-900">
                                    Gallery Project
                                </h2>

                                <div class="mt-5 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                                    @foreach ($project->galleries as $gallery)
                                        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
                                            <img src="{{ Storage::url($gallery->image) }}" alt="{{ $project->title }}"
                                                class="h-52 w-full object-cover" loading="lazy">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Right Sidebar --}}
                <aside class="lg:col-span-4">
                    <div class="space-y-6">

                        {{-- Project Information --}}
                        <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                            <h2 class="text-lg font-bold text-slate-900">
                                Informasi Project
                            </h2>

                            <div class="mt-5 space-y-4">

                                <div class="rounded-2xl bg-slate-50 p-4">
                                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">
                                        Status
                                    </p>
                                    <p class="mt-2 text-sm font-medium text-slate-800">
                                        {{ $project->status ?: '-' }}
                                    </p>
                                </div>

                                <div class="rounded-2xl bg-slate-50 p-4">
                                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">
                                        Tanggal Mulai
                                    </p>
                                    <p class="mt-2 text-sm font-medium text-slate-800">
                                        {{ $project->start_date ? $project->start_date->format('d M Y') : '-' }}
                                    </p>
                                </div>

                                <div class="rounded-2xl bg-slate-50 p-4">
                                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">
                                        Tanggal Selesai
                                    </p>
                                    <p class="mt-2 text-sm font-medium text-slate-800">
                                        {{ $project->end_date ? $project->end_date->format('d M Y') : 'Masih dalam pengembangan' }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        {{-- Technologies --}}
                        <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                            <h2 class="text-lg font-bold text-slate-900">
                                Teknologi yang Digunakan
                            </h2>

                            @if ($project->skills->isNotEmpty())
                                <div class="mt-5 flex flex-wrap gap-3">
                                    @foreach ($project->skills as $skill)
                                        <span
                                            class="inline-flex items-center rounded-full border border-blue-100 bg-blue-50 px-3 py-1.5 text-sm font-medium text-blue-700">
                                            {{ $skill->name }}
                                        </span>
                                    @endforeach
                                </div>
                            @else
                                <div
                                    class="mt-5 rounded-2xl border border-dashed border-slate-300 bg-slate-50 p-4 text-sm text-slate-500">
                                    Belum ada data teknologi untuk project ini.
                                </div>
                            @endif
                        </div>

                        {{-- Links --}}
                        <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                            <h2 class="text-lg font-bold text-slate-900">
                                Tautan Project
                            </h2>

                            <div class="mt-5 flex flex-col gap-3">
                                @if ($project->github_url)
                                    <a href="{{ $project->github_url }}" target="_blank" rel="noopener noreferrer"
                                        class="inline-flex items-center justify-center gap-2 rounded-2xl bg-slate-900 px-4 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">
                                        <x-heroicon-o-code-bracket class="h-5 w-5" />
                                        Lihat GitHub
                                    </a>
                                @endif

                                @if ($project->demo_url)
                                    <a href="{{ $project->demo_url }}" target="_blank" rel="noopener noreferrer"
                                        class="inline-flex items-center justify-center gap-2 rounded-2xl bg-blue-600 px-4 py-3 text-sm font-semibold text-white transition hover:bg-blue-700">
                                        <x-heroicon-o-globe-alt class="h-5 w-5" />
                                        Live Demo
                                    </a>
                                @endif

                                @if (!$project->github_url && !$project->demo_url)
                                    <div
                                        class="rounded-2xl border border-dashed border-slate-300 bg-slate-50 p-4 text-sm text-slate-500">
                                        Link GitHub atau demo belum tersedia.
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>
                </aside>
            </div>
        </div>
    </section>
@endsection
