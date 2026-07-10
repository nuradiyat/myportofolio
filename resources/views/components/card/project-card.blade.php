@props(['project'])

<article
    class="group flex h-full flex-col overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition-all duration-300 hover:-translate-y-1.5 hover:shadow-xl">

    {{-- Thumbnail --}}
    <div class="relative overflow-hidden">
        @if ($project->thumbnail)
            <img src="{{ Storage::url($project->thumbnail) }}" alt="{{ $project->title }}" loading="lazy"
                class="h-44 w-full object-cover transition duration-500 group-hover:scale-105 sm:h-48">
        @else
            <div class="flex h-44 w-full items-center justify-center bg-slate-100 sm:h-48">
                <x-heroicon-o-photo class="h-10 w-10 text-slate-400" />
            </div>
        @endif

        {{-- Status --}}
        @if ($project->status)
            <div class="absolute left-3 top-3">
                <x-ui.badge :text="$project->status" />
            </div>
        @endif
    </div>

    {{-- Content --}}
    <div class="flex flex-1 flex-col p-5">

        {{-- Title --}}
        <h3 class="text-lg font-bold leading-snug text-slate-900 line-clamp-1">
            {{ $project->title }}
        </h3>

        {{-- Description --}}
        <p class="mt-2 text-sm leading-6 text-slate-600 line-clamp-3">
            {{ $project->short_description ?: 'Deskripsi project belum tersedia.' }}
        </p>

        {{-- Technologies Used --}}
        @if ($project->skills->isNotEmpty())
            <div class="mt-4">
                <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-slate-500">
                    Teknologi yang digunakan
                </p>

                <div class="flex flex-wrap gap-2">
                    @foreach ($project->skills as $skill)
                        <span class="rounded-full bg-slate-100 px-2.5 py-1 text-[11px] font-medium text-slate-700">
                            {{ $skill->name }}
                        </span>
                    @endforeach
                </div>
            </div>
        @endif

        {{-- Footer --}}
        <div class="mt-5 flex items-center justify-between border-t border-slate-100 pt-4">
            <div class="text-xs text-slate-500 sm:text-sm">
                @if ($project->start_date)
                    {{ \Carbon\Carbon::parse($project->start_date)->format('M Y') }}
                @else
                    Tanggal belum tersedia
                @endif
            </div>

            <a href="{{ route('projects.show', $project->slug) }}"
                class="inline-flex items-center gap-1.5 text-sm font-semibold text-blue-600 transition hover:text-blue-700">
                View Details
                <x-heroicon-o-arrow-right class="h-4 w-4" />
            </a>
        </div>
    </div>
</article>
