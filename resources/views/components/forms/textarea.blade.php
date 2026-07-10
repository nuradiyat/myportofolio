@props([
    'name' => null,
    'id' => null,
    'rows' => 5,
])

<textarea @if ($name) name="{{ $name }}" @endif
    @if ($id) id="{{ $id }}" @endif rows="{{ $rows }}"
    {{ $attributes->merge([
        'class' =>
            'w-full rounded-2xl border border-slate-300 bg-white px-4 py-3.5 text-sm leading-7 text-slate-800 placeholder:text-slate-400 shadow-sm outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-100 resize-none',
    ]) }}>{{ $slot }}</textarea>
