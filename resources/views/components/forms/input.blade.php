@props([
    'type' => 'text',
    'name' => null,
    'id' => null,
    'value' => '',
])

<input type="{{ $type }}" @if ($name) name="{{ $name }}" @endif
    @if ($id) id="{{ $id }}" @endif value="{{ $value }}"
    {{ $attributes->merge([
        'class' =>
            'w-full rounded-2xl border border-slate-300 bg-white px-4 py-3.5 text-sm text-slate-800 placeholder:text-slate-400 shadow-sm outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-100',
    ]) }}>
