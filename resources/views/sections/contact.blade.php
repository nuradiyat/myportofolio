<section id="contact" class="bg-slate-50 py-24">
    <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">
        <x-section-title title="Contact" subtitle="Let’s Work Together"
            description="Punya pertanyaan, ide project, atau ingin berdiskusi lebih lanjut? Silakan hubungi saya melalui form di bawah ini atau lewat informasi kontak yang tersedia." />

        <div class="mt-14 grid items-start gap-8 xl:grid-cols-12">
            {{-- Left Panel --}}
            <div class="xl:col-span-5" data-aos="zoom-in-up">
                <div class="relative overflow-hidden rounded-3xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
                    {{-- Decorative background --}}
                    <div
                        class="pointer-events-none absolute -right-16 -top-16 h-40 w-40 rounded-full bg-blue-100/70 blur-3xl">
                    </div>
                    <div
                        class="pointer-events-none absolute -bottom-16 -left-16 h-40 w-40 rounded-full bg-sky-100/70 blur-3xl">
                    </div>

                    <div class="relative z-10">
                        <span
                            class="inline-flex items-center rounded-full border border-blue-200 bg-blue-50 px-3 py-1 text-xs font-semibold tracking-wide text-blue-700">
                            Let’s Connect
                        </span>

                        <h3 class="mt-5 text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">
                            Mari bangun sesuatu yang bermanfaat bersama
                        </h3>

                        <p class="mt-4 text-sm leading-7 text-slate-600 sm:text-base">
                            Saya terbuka untuk diskusi seputar pengembangan website, kolaborasi project,
                            sistem informasi, maupun peluang kerja sama lainnya. Jika kamu memiliki pertanyaan
                            atau ingin berdiskusi, kirimkan pesan melalui form ini.
                        </p>

                        {{-- Contact Info Cards --}}
                        <div class="mt-8 space-y-4">
                            @if (!empty($profile?->email))
                                <div
                                    class="group flex items-start gap-4 rounded-2xl border border-slate-200 bg-slate-50/80 p-4 transition hover:-translate-y-0.5 hover:border-blue-200 hover:bg-white hover:shadow-sm">
                                    <div
                                        class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-blue-100 text-blue-600 transition group-hover:bg-blue-600 group-hover:text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M21.75 7.5v9A2.25 2.25 0 0 1 19.5 18.75h-15A2.25 2.25 0 0 1 2.25 16.5v-9m19.5 0A2.25 2.25 0 0 0 19.5 5.25h-15A2.25 2.25 0 0 0 2.25 7.5m19.5 0-8.69 5.518a2.25 2.25 0 0 1-2.12 0L2.25 7.5" />
                                        </svg>
                                    </div>

                                    <div class="min-w-0">
                                        <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">
                                            Email
                                        </p>
                                        <a href="mailto:{{ $profile->email }}"
                                            class="mt-1 block break-all text-sm font-medium text-slate-800 transition hover:text-blue-600 sm:text-[15px]">
                                            {{ $profile->email }}
                                        </a>
                                    </div>
                                </div>
                            @endif

                            @if (!empty($profile?->phone))
                                <div
                                    class="group flex items-start gap-4 rounded-2xl border border-slate-200 bg-slate-50/80 p-4 transition hover:-translate-y-0.5 hover:border-blue-200 hover:bg-white hover:shadow-sm">
                                    <div
                                        class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-blue-100 text-blue-600 transition group-hover:bg-blue-600 group-hover:text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25A2.25 2.25 0 0 0 21.75 19.5v-1.372c0-.516-.351-.965-.852-1.089l-4.423-1.106a1.125 1.125 0 0 0-1.173.417l-.97 1.293a1.125 1.125 0 0 1-1.21.38 12.035 12.035 0 0 1-7.145-7.145 1.125 1.125 0 0 1 .38-1.21l1.293-.97c.35-.263.512-.714.417-1.173L6.96 3.102A1.125 1.125 0 0 0 5.872 2.25H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                                        </svg>
                                    </div>

                                    <div class="min-w-0">
                                        <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">
                                            Phone
                                        </p>
                                        <a href="tel:{{ $profile->phone }}"
                                            class="mt-1 block text-sm font-medium text-slate-800 transition hover:text-blue-600 sm:text-[15px]">
                                            {{ $profile->phone }}
                                        </a>
                                    </div>
                                </div>
                            @endif

                            @if (!empty($profile?->address))
                                <div
                                    class="group flex items-start gap-4 rounded-2xl border border-slate-200 bg-slate-50/80 p-4 transition hover:-translate-y-0.5 hover:border-blue-200 hover:bg-white hover:shadow-sm">
                                    <div
                                        class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-blue-100 text-blue-600 transition group-hover:bg-blue-600 group-hover:text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 21s6-4.35 6-10.125A6 6 0 1 0 6 10.875C6 16.65 12 21 12 21Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 12.75a1.875 1.875 0 1 0 0-3.75 1.875 1.875 0 0 0 0 3.75Z" />
                                        </svg>
                                    </div>

                                    <div class="min-w-0">
                                        <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">
                                            Address
                                        </p>
                                        <p class="mt-1 text-sm leading-6 text-slate-700 sm:text-[15px]">
                                            {{ $profile->address }}
                                        </p>
                                    </div>
                                </div>
                            @endif
                        </div>

                        {{-- Social Media --}}
                        @if (isset($socialMedia) && $socialMedia->isNotEmpty())
                            <div class="mt-8 border-t border-slate-200 pt-6">
                                <p class="text-sm font-semibold text-slate-900">
                                    Connect with me
                                </p>

                                <div class="mt-4 flex flex-wrap gap-3">
                                    @foreach ($socialMedia as $social)
                                        <x-ui.social-link :social="$social" />
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Right Form Panel --}}
            <div class="xl:col-span-7" data-aos="zoom-in-down">
                <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
                    <div class="mb-8">
                        <span
                            class="inline-flex items-center rounded-full border border-slate-200 bg-slate-50 px-3 py-1 text-xs font-semibold tracking-wide text-slate-600">
                            Contact Form
                        </span>

                        <h3 class="mt-4 text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">
                            Send a Message
                        </h3>

                        <p class="mt-3 text-sm leading-7 text-slate-600 sm:text-base">
                            Isi form berikut untuk menghubungi saya. Pesan yang kamu kirim akan masuk ke dashboard admin
                            dan bisa saya tindak lanjuti secepatnya.
                        </p>
                    </div>

                    {{-- SUCCESS --}}
                    @if (session()->has('success'))
                        <div
                            class="mb-6 flex items-start gap-3 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700 shadow-sm">
                            <svg class="mt-0.5 h-5 w-5 shrink-0 text-emerald-600" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>

                            <div>
                                <p class="font-semibold">Berhasil</p>
                                <p class="text-emerald-700/90">{{ session('success') }}</p>
                            </div>
                        </div>
                    @endif

                    {{-- ERROR --}}
                    @if (session()->has('error'))
                        <div
                            class="mb-6 flex items-start gap-3 rounded-2xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700 shadow-sm">
                            <svg class="mt-0.5 h-5 w-5 shrink-0 text-red-600" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM12 16.5h.01" />
                            </svg>

                            <div>
                                <p class="font-semibold">Gagal</p>
                                <p class="text-red-700/90">{{ session('error') }}</p>
                            </div>
                        </div>
                    @endif

                    {{-- VALIDATION ERRORS --}}
                    @if ($errors->any())
                        <div
                            class="mb-6 rounded-2xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700 shadow-sm">
                            <div class="flex items-start gap-3">
                                <svg class="mt-0.5 h-5 w-5 shrink-0 text-red-600" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM12 16.5h.01" />
                                </svg>

                                <div>
                                    <p class="font-semibold">Terjadi kesalahan</p>

                                    <ul class="mt-2 list-disc space-y-1 pl-5 text-red-700/90">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                        @csrf

                        <div class="grid gap-5 md:grid-cols-2">
                            <div>
                                <x-forms.label for="name" required>
                                    Nama Lengkap
                                </x-forms.label>
                                <x-forms.input id="name" name="name" type="text" :value="old('name')"
                                    placeholder="Masukkan nama lengkap" required />
                            </div>

                            <div>
                                <x-forms.label for="email" required>
                                    Email
                                </x-forms.label>
                                <x-forms.input id="email" name="email" type="email" :value="old('email')"
                                    placeholder="contoh@email.com" required />
                            </div>
                        </div>

                        <div>
                            <x-forms.label for="subject" required>
                                Subject
                            </x-forms.label>
                            <x-forms.input id="subject" name="subject" type="text" :value="old('subject')"
                                placeholder="Tulis subject pesan" required />
                        </div>

                        <div>
                            <x-forms.label for="message" required>
                                Message
                            </x-forms.label>
                            <x-forms.textarea id="message" name="message" rows="7"
                                placeholder="Tulis pesan yang ingin disampaikan..."
                                required>{{ old('message') }}</x-forms.textarea>
                        </div>

                        <div class="pt-2">
                            <button type="submit"
                                class="inline-flex w-full items-center justify-center rounded-2xl bg-blue-600 px-6 py-3.5 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-100 sm:w-auto">
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>