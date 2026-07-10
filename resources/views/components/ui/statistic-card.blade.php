@props(['label', 'value'])

<div
    class="group rounded-2xl border border-slate-200 bg-white p-8 text-center shadow-sm transition-all duration-300 hover:-translate-y-2 hover:border-blue-500 hover:shadow-xl">

    @isset($icon)
        <div class="mb-5 flex justify-center">

            {{ $icon }}

        </div>
    @endisset

    <h3 class="text-4xl font-extrabold text-slate-900">

        {{ $value }}+

    </h3>

    <p class="mt-3 text-sm font-medium tracking-wide text-slate-500 uppercase">

        {{ $label }}

    </p>

</div>