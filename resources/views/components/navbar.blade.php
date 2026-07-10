<header x-data="{ open: false }"
    class="fixed inset-x-0 top-0 z-50 border-b border-slate-200/60 bg-white/70 backdrop-blur-xl overflow-x-clip">

    @php
        $navLinks = [
            ['label' => 'Home', 'id' => 'home'],
            ['label' => 'About', 'id' => 'about'],
            ['label' => 'Skills', 'id' => 'skills'],
            ['label' => 'Projects', 'id' => 'projects'],
            ['label' => 'Certificates', 'id' => 'certificates'],
            ['label' => 'Experience', 'id' => 'experiences'],
            ['label' => 'Contact', 'id' => 'contact'],
        ];
    @endphp

    {{-- TOP BAR --}}
    <div class="mx-auto flex h-20 w-full max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8">

        {{-- LOGO --}}
        <a href="{{ route('home') }}" class="flex min-w-0 items-center gap-3 group">
            @if ($profile?->logo_website)
                <div
                    class="flex h-11 w-11 shrink-0 items-center justify-center overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm transition group-hover:scale-105">
                    <img src="{{ asset('storage/' . $profile->logo_website) }}"
                        alt="{{ $profile->full_name ?? 'Logo Website' }}" class="h-full w-full object-contain">
                </div>
            @else
                <div
                    class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-gradient-to-br from-blue-600 to-indigo-600 text-white font-bold shadow-sm transition group-hover:scale-105">
                    MN
                </div>
            @endif

            <div class="hidden min-w-0 sm:block">
                <h1 class="truncate text-base font-bold text-slate-900">
                    {{ $profile->full_name }}
                </h1>
                <p class="truncate text-sm text-slate-500">
                    {{ $profile->profession }}
                </p>
            </div>
        </a>

        {{-- DESKTOP NAV --}}
        <nav class="hidden lg:flex items-center gap-8">
            @foreach ($navLinks as $link)
                <a href="{{ route('home') . '#' . $link['id'] }}"
                    class="group relative text-sm font-medium text-slate-600 transition hover:text-blue-600">
                    {{ $link['label'] }}

                    <span
                        class="absolute -bottom-1 left-0 h-[2px] w-0 bg-blue-600 transition-all duration-300 group-hover:w-full"></span>
                </a>
            @endforeach
        </nav>

        {{-- RIGHT ACTION --}}
        <div class="flex items-center gap-3 shrink-0">
            @if ($profile->cv_file)
                <a href="{{ Storage::url($profile->cv_file) }}" target="_blank"
                    class="hidden lg:inline-flex items-center rounded-xl bg-blue-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700 hover:shadow-md">
                    Download CV
                </a>
            @endif

            {{-- MOBILE BUTTON --}}
            <button @click="open = !open"
                class="inline-flex items-center justify-center rounded-xl p-2 text-slate-700 transition hover:bg-slate-100 lg:hidden"
                aria-label="Toggle menu">
                <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>

                <svg x-show="open" x-cloak xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    {{-- MOBILE MENU --}}
    <div x-show="open" x-transition.origin.top.duration.250ms x-cloak
        class="lg:hidden border-t border-slate-200 bg-white/95 backdrop-blur-xl">
        <nav class="w-full px-4 py-4 sm:px-6">
            <div class="flex flex-col gap-2">
                @foreach ($navLinks as $link)
                    <a href="{{ route('home') . '#' . $link['id'] }}" @click="open = false"
                        class="block rounded-xl px-4 py-3 text-sm font-medium text-slate-700 transition hover:bg-slate-50 hover:text-blue-600">
                        {{ $link['label'] }}
                    </a>
                @endforeach

                @if ($profile->cv_file)
                    <a href="{{ Storage::url($profile->cv_file) }}" target="_blank"
                        class="mt-3 inline-flex w-full items-center justify-center rounded-xl bg-blue-600 px-4 py-3 text-sm font-semibold text-white transition hover:bg-blue-700">
                        Download CV
                    </a>
                @endif
            </div>
        </nav>
    </div>
</header>