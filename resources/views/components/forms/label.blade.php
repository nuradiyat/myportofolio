@props([
    'for' => null,
    'required' => false,
])

<label @if ($for) for="{{ $for }}" @endif
    {{ $attributes->class('mb-2 block text-sm font-semibold text-slate-800') }}>
    {{ $slot }}

    @if ($required)
        <span class="text-red-500">*</span>
    @endif
</label>
