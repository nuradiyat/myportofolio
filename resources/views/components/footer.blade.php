<footer
    class="relative overflow-hidden border-t border-slate-800 bg-gradient-to-b from-slate-950 via-slate-900 to-slate-950">

    {{-- Glow Background --}}
    <div
        class="pointer-events-none absolute -top-24 left-1/2 h-72 w-72 -translate-x-1/2 rounded-full bg-blue-500/20 blur-3xl">
    </div>
    <div class="pointer-events-none absolute bottom-0 right-0 h-72 w-72 rounded-full bg-indigo-500/10 blur-3xl"></div>

    @php
        $footerLinks = [
            ['label' => 'Home', 'id' => 'home'],
            ['label' => 'About', 'id' => 'about'],
            ['label' => 'Skills', 'id' => 'skills'],
            ['label' => 'Projects', 'id' => 'projects'],
            ['label' => 'Certificates', 'id' => 'certificates'],
            ['label' => 'Experience', 'id' => 'experiences'],
            ['label' => 'Contact', 'id' => 'contact'],
        ];
    @endphp

    <div class="container relative z-10 mx-auto px-6 py-16">

        <div class="grid gap-12 md:grid-cols-3">

            {{-- BRAND --}}
            <div>
                <h2 class="text-2xl font-bold tracking-tight text-white">
                    {{ $profile->full_name }}
                </h2>

                <p class="mt-2 text-sm font-medium text-blue-400">
                    {{ $profile->profession }}
                </p>

                <p class="mt-5 text-sm leading-7 text-slate-400">
                    {{ $profile->short_bio }}
                </p>

                <div
                    class="mt-6 inline-flex items-center gap-2 rounded-full border border-slate-700 bg-slate-900/40 px-4 py-1 text-xs text-slate-300">
                    <span class="h-2 w-2 animate-pulse rounded-full bg-green-400"></span>
                    Available for work
                </div>
            </div>

            {{-- NAVIGATION --}}
            <div>
                <h3 class="text-sm font-semibold uppercase tracking-wider text-white">
                    Navigation
                </h3>

                <ul class="mt-6 space-y-3">
                    @foreach ($footerLinks as $link)
                        <li>
                            <a href="{{ route('home') . '#' . $link['id'] }}"
                                class="text-slate-400 transition hover:text-white">
                                {{ $link['label'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- SOCIAL --}}
            <div>
                <h3 class="text-sm font-semibold uppercase tracking-wider text-white">
                    Connect
                </h3>

                <div class="mt-6 flex flex-wrap gap-3">
                    @foreach ($socialMedia as $social)
                        <div class="duration-200 transition hover:-translate-y-1 hover:scale-105">
                            <x-ui.social-link :social="$social" />
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

        {{-- BOTTOM --}}
        <div class="mt-14 border-t border-slate-800 pt-6 text-center sm:pt-8">
            <p class="text-xs leading-relaxed text-slate-500 sm:text-sm">
                © {{ now()->year }}
                <span class="block font-medium text-slate-300 sm:inline">
                    {{ $profile->full_name }}
                </span>
                <span class="block sm:inline">
                    All rights reserved.
                </span>
            </p>
        </div>

    </div>
</footer>
