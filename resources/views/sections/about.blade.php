<section id="about" class="bg-slate-50 py-16 sm:py-20 lg:py-24">

    <div class="container mx-auto px-4 sm:px-6">

        <x-section-title title="About Me" subtitle="Get to Know Me Better" />

        <div class="mt-12 grid items-center gap-10 sm:mt-14 lg:mt-16 lg:grid-cols-2 lg:gap-14">

            {{-- Profile Image --}}
            <div data-aos="fade-right" class="flex justify-center">

                <div class="relative">

                    {{-- Background Decoration --}}
                    <div
                        class="absolute -left-4 -top-4 h-full w-full rounded-3xl bg-blue-600/10 sm:-left-5 sm:-top-5 lg:-left-6 lg:-top-6">
                    </div>

                    <img src="{{ Storage::url($profile->profile_photo) }}" alt="{{ $profile->full_name }}"
                        loading="lazy"
                        class="relative h-[300px] w-full max-w-[260px] rounded-3xl object-cover shadow-2xl sm:h-[360px] sm:max-w-xs md:h-[400px] md:max-w-sm lg:h-[420px] lg:max-w-sm">

                </div>

            </div>

            {{-- About Content --}}
            <div data-aos="fade-left">

                <x-ui.badge text="About Me" />

                <h2
                    class="mt-5 text-2xl font-bold leading-tight text-slate-900 sm:mt-6 sm:text-3xl md:text-4xl lg:text-4xl">

                    {{ $profile->full_name }}

                </h2>

                <h3 class="mt-2 text-lg font-semibold text-blue-600 sm:text-xl lg:text-xl">

                    {{ $profile->profession }}

                </h3>

                <p
                    class="mt-6 text-sm leading-7 text-slate-600 sm:mt-7 sm:text-base sm:leading-8 md:mt-8 md:text-lg md:leading-8 lg:text-lg lg:leading-8">

                    {{ $profile->about }}

                </p>

                {{-- Quick Information --}}
                <div class="mt-8 grid gap-4 sm:mt-10 sm:grid-cols-2 sm:gap-5">

                    <div class="rounded-2xl border border-slate-200 bg-white p-4 sm:p-5">

                        <h4 class="text-base font-semibold text-slate-900 sm:text-lg">

                            Experience

                        </h4>

                        <p class="mt-2 text-sm leading-6 text-slate-500 sm:text-base">

                            Professional projects and organizational experience.

                        </p>

                    </div>

                    <div class="rounded-2xl border border-slate-200 bg-white p-4 sm:p-5">

                        <h4 class="text-base font-semibold text-slate-900 sm:text-lg">

                            Technologies

                        </h4>

                        <p class="mt-2 text-sm leading-6 text-slate-500 sm:text-base">

                            Laravel, PHP, Python, MySQL, Tailwind CSS and more.

                        </p>

                    </div>

                </div>

                {{-- CTA --}}
                <div class="mt-8 flex flex-wrap gap-3 sm:mt-10 sm:gap-4">

                    <x-button href="#projects" class="px-5 py-2.5 text-sm sm:px-6 sm:py-3 sm:text-base">
                        View My Projects
                    </x-button>

                    <x-button :href="Storage::url($profile->cv_file)" target="_blank" variant="outline"
                        class="px-5 py-2.5 text-sm sm:px-6 sm:py-3 sm:text-base">
                        Download CV
                    </x-button>

                </div>

            </div>

        </div>

    </div>

</section>
