<section id="statistics" class="bg-white py-20">

    <div class="container mx-auto px-6">

        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">

            {{-- Total Projects --}}
            <x-ui.statistic-card label="Projects" :value="$projectCount">
                <x-slot:icon>
                    <x-heroicon-o-folder class="h-8 w-8 text-blue-600" />
                </x-slot:icon>
            </x-ui.statistic-card>

            {{-- Certificates --}}
            <x-ui.statistic-card label="Certificates" :value="$certificateCount">
                <x-slot:icon>
                    <x-heroicon-o-academic-cap class="h-8 w-8 text-emerald-600" />
                </x-slot:icon>
            </x-ui.statistic-card>

            {{-- Experience --}}
            <x-ui.statistic-card label="Experiences" :value="$experienceCount">
                <x-slot:icon>
                    <x-heroicon-o-briefcase class="h-8 w-8 text-orange-500" />
                </x-slot:icon>
            </x-ui.statistic-card>

            {{-- Skills --}}
            <x-ui.statistic-card label="Technologies" :value="$skillCount">
                <x-slot:icon>
                    <x-heroicon-o-code-bracket class="h-8 w-8 text-purple-600" />
                </x-slot:icon>
            </x-ui.statistic-card>

        </div>

    </div>

</section>
