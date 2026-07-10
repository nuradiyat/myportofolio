<section id="skills" class="overflow-hidden bg-white py-24">

    <div class="container mx-auto px-6">

        {{-- Section Title --}}
        <x-section-title title="Skills & Technologies" subtitle="Technologies I Use"
            description="Berbagai bahasa pemrograman, framework, database, dan tools yang saya gunakan dalam membangun aplikasi web." />

        @if ($skills->isNotEmpty())
            @php
                $skillsCollection = $skills instanceof \Illuminate\Support\Collection ? $skills : collect($skills);

                $chunkSize = (int) ceil($skillsCollection->count() / 2);

                $firstRow = $skillsCollection->take($chunkSize);
                $secondRow = $skillsCollection->slice($chunkSize);

                // fallback kalau data sedikit / ganjil
                if ($secondRow->isEmpty()) {
                    $secondRow = $firstRow;
                }
            @endphp

            <div class="mt-16 space-y-6">

                {{-- ROW 1 - bergerak ke kiri --}}
                <div class="relative overflow-hidden" data-aos="fade-up">
                    {{-- efek fade kiri --}}
                    <div
                        class="pointer-events-none absolute left-0 top-0 z-10 h-full w-16 bg-gradient-to-r from-white to-transparent sm:w-24">
                    </div>

                    {{-- efek fade kanan --}}
                    <div
                        class="pointer-events-none absolute right-0 top-0 z-10 h-full w-16 bg-gradient-to-l from-white to-transparent sm:w-24">
                    </div>

                    <div class="skills-marquee skills-marquee-left">
                        <div class="skills-track">
                            @foreach ($firstRow as $skill)
                                <div class="skills-item">
                                    <x-card.skill-card :skill="$skill" />
                                </div>
                            @endforeach

                            {{-- duplicate untuk loop mulus --}}
                            @foreach ($firstRow as $skill)
                                <div class="skills-item">
                                    <x-card.skill-card :skill="$skill" />
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- ROW 2 - bergerak ke kanan --}}
                <div class="relative overflow-hidden" data-aos="fade-up" data-aos-delay="100">
                    {{-- efek fade kiri --}}
                    <div
                        class="pointer-events-none absolute left-0 top-0 z-10 h-full w-16 bg-gradient-to-r from-white to-transparent sm:w-24">
                    </div>

                    {{-- efek fade kanan --}}
                    <div
                        class="pointer-events-none absolute right-0 top-0 z-10 h-full w-16 bg-gradient-to-l from-white to-transparent sm:w-24">
                    </div>

                    <div class="skills-marquee skills-marquee-right">
                        <div class="skills-track">
                            @foreach ($secondRow as $skill)
                                <div class="skills-item">
                                    <x-card.skill-card :skill="$skill" />
                                </div>
                            @endforeach

                            {{-- duplicate untuk loop mulus --}}
                            @foreach ($secondRow as $skill)
                                <div class="skills-item">
                                    <x-card.skill-card :skill="$skill" />
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        @else
            <div class="mt-16">
                <x-ui.empty-state title="Belum Ada Skill"
                    description="Data skill akan ditampilkan setelah ditambahkan melalui Dashboard Admin." />
            </div>
        @endif

    </div>

</section>
