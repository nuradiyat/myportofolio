@props(['skill'])

@php
    $skillName = strtolower(trim($skill->name ?? ''));
    $customIcon = strtolower(trim($skill->icon ?? ''));

    /*
    |--------------------------------------------------------------------------
    | Mapping skill / technology -> Simple Icons slug
    |--------------------------------------------------------------------------
    | Prioritas:
    | 1. Kalau kolom icon diisi -> pakai itu
    | 2. Kalau kosong -> coba cocokkan dari nama skill
    |--------------------------------------------------------------------------
    */
    $iconMap = [
        /*
        |--------------------------------------------------------------------------
        | Programming Languages
        |--------------------------------------------------------------------------
        */
        'php' => 'php',
        'javascript' => 'javascript',
        'js' => 'javascript',
        'typescript' => 'typescript',
        'ts' => 'typescript',
        'python' => 'python',
        'java' => 'openjdk',
        'c' => 'c',
        'c++' => 'cplusplus',
        'cplusplus' => 'cplusplus',
        'c#' => 'csharp',
        'csharp' => 'csharp',
        'go' => 'go',
        'golang' => 'go',
        'kotlin' => 'kotlin',
        'swift' => 'swift',
        'dart' => 'dart',
        'ruby' => 'ruby',
        'rust' => 'rust',
        'scala' => 'scala',
        'perl' => 'perl',
        'r' => 'r',
        'matlab' => 'mathworks',
        'bash' => 'gnubash',
        'shell' => 'gnubash',

        /*
        |--------------------------------------------------------------------------
        | Frontend
        |--------------------------------------------------------------------------
        */
        'html' => 'html5',
        'html5' => 'html5',
        'css' => 'css',
        'css3' => 'css3',
        'sass' => 'sass',
        'scss' => 'sass',
        'less' => 'less',
        'tailwind' => 'tailwindcss',
        'tailwind css' => 'tailwindcss',
        'bootstrap' => 'bootstrap',
        'bulma' => 'bulma',
        'material ui' => 'mui',
        'mui' => 'mui',
        'chakra ui' => 'chakraui',
        'shadcn' => 'shadcnui',
        'shadcn/ui' => 'shadcnui',

        /*
        |--------------------------------------------------------------------------
        | Frontend Framework / Library
        |--------------------------------------------------------------------------
        */
        'react' => 'react',
        'react js' => 'react',
        'next' => 'nextdotjs',
        'next js' => 'nextdotjs',
        'nextjs' => 'nextdotjs',
        'vue' => 'vuedotjs',
        'vue js' => 'vuedotjs',
        'vuejs' => 'vuedotjs',
        'nuxt' => 'nuxt',
        'nuxt js' => 'nuxt',
        'nuxtjs' => 'nuxt',
        'angular' => 'angular',
        'svelte' => 'svelte',
        'sveltekit' => 'svelte',
        'alpine' => 'alpinedotjs',
        'alpine js' => 'alpinedotjs',
        'alpinejs' => 'alpinedotjs',
        'jquery' => 'jquery',
        'vite' => 'vite',

        /*
        |--------------------------------------------------------------------------
        | Backend / Framework
        |--------------------------------------------------------------------------
        */
        'laravel' => 'laravel',
        'filament' => 'laravel',
        'livewire' => 'livewire',
        'codeigniter' => 'codeigniter',
        'symfony' => 'symfony',
        'node js' => 'nodedotjs',
        'nodejs' => 'nodedotjs',
        'node' => 'nodedotjs',
        'express' => 'express',
        'express js' => 'express',
        'nestjs' => 'nestjs',
        'nest js' => 'nestjs',
        'adonisjs' => 'adonisjs',
        'spring' => 'spring',
        'spring boot' => 'springboot',
        'django' => 'django',
        'flask' => 'flask',
        'fastapi' => 'fastapi',
        'ruby on rails' => 'rubyonrails',
        'rails' => 'rubyonrails',
        'asp.net' => 'dotnet',
        '.net' => 'dotnet',

        /*
        |--------------------------------------------------------------------------
        | Database
        |--------------------------------------------------------------------------
        */
        'mysql' => 'mysql',
        'mariadb' => 'mariadb',
        'postgresql' => 'postgresql',
        'postgres' => 'postgresql',
        'sqlite' => 'sqlite',
        'mongodb' => 'mongodb',
        'redis' => 'redis',
        'firebase' => 'firebase',
        'supabase' => 'supabase',
        'oracle' => 'oracle',
        'sql server' => 'microsoftsqlserver',
        'mssql' => 'microsoftsqlserver',
        'prisma' => 'prisma',

        /*
        |--------------------------------------------------------------------------
        | DevOps / Infra / Deployment
        |--------------------------------------------------------------------------
        */
        'git' => 'git',
        'github' => 'github',
        'gitlab' => 'gitlab',
        'bitbucket' => 'bitbucket',
        'docker' => 'docker',
        'kubernetes' => 'kubernetes',
        'nginx' => 'nginx',
        'apache' => 'apache',
        'linux' => 'linux',
        'ubuntu' => 'ubuntu',
        'debian' => 'debian',
        'cloudflare' => 'cloudflare',
        'vercel' => 'vercel',
        'netlify' => 'netlify',
        'heroku' => 'heroku',
        'railway' => 'railway',
        'aws' => 'amazonwebservices',
        'amazon web services' => 'amazonwebservices',
        'gcp' => 'googlecloud',
        'google cloud' => 'googlecloud',
        'azure' => 'microsoftazure',

        /*
        |--------------------------------------------------------------------------
        | Tools / IDE / Design / Productivity
        |--------------------------------------------------------------------------
        */
        'figma' => 'figma',
        'canva' => 'canva',
        'adobe xd' => 'adobexd',
        'photoshop' => 'adobephotoshop',
        'illustrator' => 'adobeillustrator',
        'postman' => 'postman',
        'insomnia' => 'insomnia',
        'swagger' => 'swagger',
        'notion' => 'notion',
        'trello' => 'trello',
        'slack' => 'slack',
        'discord' => 'discord',
        'jira' => 'jira',
        'dbeaver' => 'dbeaver',
        'phpmyadmin' => 'phpmyadmin',
        'vscode' => 'visualstudiocode',
        'visual studio code' => 'visualstudiocode',
        'visual studio' => 'visualstudio',
        'intellij' => 'intellijidea',
        'android studio' => 'androidstudio',
        'xampp' => 'xampp',
        'laragon' => 'laragon',

        /*
        |--------------------------------------------------------------------------
        | Data / AI / ML
        |--------------------------------------------------------------------------
        */
        'tensorflow' => 'tensorflow',
        'pytorch' => 'pytorch',
        'opencv' => 'opencv',
        'numpy' => 'numpy',
        'pandas' => 'pandas',
        'jupyter' => 'jupyter',
        'scikit learn' => 'scikitlearn',
        'scikit-learn' => 'scikitlearn',

        /*
        |--------------------------------------------------------------------------
        | CMS / Other Platforms
        |--------------------------------------------------------------------------
        */
        'wordpress' => 'wordpress',
        'woocommerce' => 'woocommerce',
        'shopify' => 'shopify',

        /*
        |--------------------------------------------------------------------------
        | Testing
        |--------------------------------------------------------------------------
        */
        'phpunit' => 'phpunit',
        'pest' => 'pest',
        'jest' => 'jest',
        'cypress' => 'cypress',
        'playwright' => 'playwright',

        /*
        |--------------------------------------------------------------------------
        | Mobile / Hybrid
        |--------------------------------------------------------------------------
        */
        'flutter' => 'flutter',
        'react native' => 'react',
        'ionic' => 'ionic',
    ];

    $iconName = $customIcon ?: $iconMap[$skillName] ?? null;

    $iconSources = $iconName
        ? [
            "https://cdn.simpleicons.org/{$iconName}",
            "https://api.iconify.design/simple-icons:{$iconName}.svg",
            "https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/{$iconName}.svg",
        ]
        : [];
@endphp

<div
    class="group flex h-full min-h-[170px] flex-col items-center justify-center rounded-2xl border border-slate-200 bg-white p-4 text-center shadow-sm transition-all duration-300 hover:-translate-y-1.5 hover:border-blue-500 hover:shadow-lg sm:min-h-[180px] sm:p-5">

    {{-- Icon --}}
    <div
        class="flex h-14 w-14 items-center justify-center rounded-2xl bg-transparent transition duration-300 sm:h-16 sm:w-16">
        <span class="relative flex h-8 w-8 items-center justify-center sm:h-10 sm:w-10">
            {{-- fallback text --}}
            <span class="skill-fallback hidden text-xs font-bold uppercase text-slate-600">
                {{ strtoupper(substr($skill->name ?? 'SK', 0, 2)) }}
            </span>

            @if ($iconName)
                <img src="{{ $iconSources[0] }}" alt="{{ $skill->name }}" loading="lazy"
                    class="skill-icon h-8 w-8 object-contain opacity-80 transition duration-300 group-hover:scale-110 group-hover:opacity-100 sm:h-10 sm:w-10"
                    data-fallbacks='@json($iconSources)'
                    onerror="
                        const fallbacks = JSON.parse(this.dataset.fallbacks || '[]');
                        const current = this.getAttribute('src');
                        const currentIndex = fallbacks.indexOf(current);

                        if (currentIndex !== -1 && currentIndex + 1 < fallbacks.length) {
                            this.src = fallbacks[currentIndex + 1];
                            return;
                        }

                        this.style.display = 'none';
                        const fallback = this.parentElement.querySelector('.skill-fallback');
                        if (fallback) fallback.classList.remove('hidden');
                    ">
            @else
                <span class="text-xs font-bold uppercase text-slate-600">
                    {{ strtoupper(substr($skill->name ?? 'SK', 0, 2)) }}
                </span>
            @endif
        </span>
    </div>

    {{-- Name --}}
    <h3 class="mt-4 text-sm font-semibold leading-snug text-slate-900 sm:text-base">
        {{ $skill->name }}
    </h3>

    {{-- Category --}}
    <p class="mt-1 text-xs text-slate-500 sm:text-sm">
        {{ $skill->category ?: 'Technology' }}
    </p>
</div>
