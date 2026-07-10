@props([
    'title' => 'Belum ada data',
    'description' => 'Data akan ditampilkan setelah tersedia.',
])

<div class="rounded-2xl border border-dashed border-slate-300 bg-slate-50 p-10 text-center">

    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-slate-200">

        <x-heroicon-o-folder-open class="h-8 w-8 text-slate-500" />

    </div>

    <h3 class="mt-5 text-lg font-semibold text-slate-900">
        {{ $title }}
    </h3>

    <p class="mt-2 text-sm text-slate-500">
        {{ $description }}
    </p>

</div>
