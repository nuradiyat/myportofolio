@props(['testimonial'])

@php
    use Illuminate\Support\Str;

    $initials = Str::of($testimonial->name)
        ->trim()
        ->explode(' ')
        ->filter()
        ->map(fn($word) => Str::upper(Str::substr($word, 0, 1)))
        ->take(2)
        ->implode('');
@endphp

<article data-testimonial-card
    class="flex h-full w-[280px] shrink-0 flex-col rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg sm:w-[320px] lg:w-[340px] xl:w-[360px]">
    <div class="flex h-full flex-col">
        {{-- Header --}}
        <div class="flex items-start gap-4">
            <div
                class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-blue-100 text-sm font-bold text-blue-700">
                {{ $initials }}
            </div>

            <div class="min-w-0">
                <h3 class="truncate text-lg font-semibold text-slate-900">
                    {{ $testimonial->name }}
                </h3>

                @if ($testimonial->position || $testimonial->organization)
                    <p class="mt-1 text-sm leading-6 text-slate-500">
                        @if ($testimonial->position)
                            {{ $testimonial->position }}
                        @endif

                        @if ($testimonial->position && $testimonial->organization)
                            <span class="text-slate-400">at</span>
                        @endif

                        @if ($testimonial->organization)
                            <span class="font-medium text-slate-700">{{ $testimonial->organization }}</span>
                        @endif
                    </p>
                @endif
            </div>
        </div>

        {{-- Message --}}
        <div class="mt-5 flex-1">
            <p class="text-[15px] leading-8 text-slate-600">
                “{{ $testimonial->message }}”
            </p>
        </div>
    </div>
</article>