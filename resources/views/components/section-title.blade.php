@props(['title', 'subtitle' => null])

<div class="mx-auto mb-12 max-w-3xl text-center sm:mb-14 lg:mb-16">

    <span class="text-xs font-semibold uppercase tracking-[0.2em] text-blue-600 sm:text-sm md:text-base">
        {{ $title }}
    </span>

    <h2 class="mt-3 text-2xl font-bold leading-tight text-slate-900 sm:mt-4 sm:text-3xl md:text-3xl lg:text-4xl">
        {{ $subtitle }}
    </h2>

</div>
