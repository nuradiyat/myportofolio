@props(['social'])

@php
    $platform = strtolower(trim($social->platform ?? ''));

    /*
    |--------------------------------------------------------------------------
    | Mapping nama platform
    |--------------------------------------------------------------------------
    */
    $iconMap = [
        'github' => 'github',
        'linkedin' => 'linkedin',
        'instagram' => 'instagram',
        'facebook' => 'facebook',
        'twitter' => 'x',
        'x' => 'x',
        'youtube' => 'youtube',
        'whatsapp' => 'whatsapp',
        'telegram' => 'telegram',
        'tiktok' => 'tiktok',
        'discord' => 'discord',
        'gitlab' => 'gitlab',
        'dribbble' => 'dribbble',
        'behance' => 'behance',
        'medium' => 'medium',
        'email' => 'gmail',
        'gmail' => 'gmail',
    ];

    $iconName = $iconMap[$platform] ?? $platform;

    /*
    |--------------------------------------------------------------------------
    | URL tujuan
    |--------------------------------------------------------------------------
    */
    $url = $social->url;

    if (in_array($platform, ['email', 'gmail']) && $url && !str_starts_with($url, 'mailto:')) {
        $url = 'mailto:' . $url;
    }

    /*
    |--------------------------------------------------------------------------
    | Fallback CDN list
    |--------------------------------------------------------------------------
    | Urutan:
    | 1. Simple Icons
    | 2. Iconify
    | 3. jsDelivr simple-icons
    */
    $iconSources = [
        "https://cdn.simpleicons.org/{$iconName}",
        "https://api.iconify.design/simple-icons:{$iconName}.svg",
        "https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/{$iconName}.svg",
    ];

    $isExternal = !in_array($platform, ['email', 'gmail']);
@endphp

<a href="{{ $url }}" target="{{ $isExternal ? '_blank' : '_self' }}" rel="noopener noreferrer"
    aria-label="{{ $social->platform }}" title="{{ $social->platform }}"
    class="group inline-flex h-11 w-11 items-center justify-center rounded-xl border border-slate-200 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:border-blue-200 hover:bg-blue-50 hover:shadow-md">

    <span class="relative flex h-5 w-5 items-center justify-center">
        {{-- Fallback text kalau semua CDN gagal --}}
        <span class="social-fallback hidden text-[10px] font-bold uppercase text-slate-600">
            {{ strtoupper(substr($social->platform, 0, 2)) }}
        </span>

        {{-- Image icon --}}
        <img src="{{ $iconSources[0] }}" alt="{{ $social->platform }}" loading="lazy"
            class="social-icon h-5 w-5 object-contain opacity-80 transition duration-300 group-hover:opacity-100"
            data-fallbacks='@json($iconSources)'
            onerror="
                const fallbacks = JSON.parse(this.dataset.fallbacks || '[]');
                const current = this.getAttribute('src');
                const currentIndex = fallbacks.indexOf(current);

                if (currentIndex !== -1 && currentIndex + 1 < fallbacks.length) {
                    this.src = fallbacks[currentIndex + 1];
                    return;
                }

                this.style.display='none';
                const fallback = this.parentElement.querySelector('.social-fallback');
                if (fallback) fallback.classList.remove('hidden');
            ">
    </span>
</a>
