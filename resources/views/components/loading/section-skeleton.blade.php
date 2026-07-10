<section class="py-24 animate-pulse">

    <div class="container mx-auto px-6">

        {{-- Section Title --}}
        <div class="mx-auto mb-16 max-w-xl text-center">

            <div class="mx-auto h-4 w-32 rounded bg-slate-200"></div>

            <div class="mx-auto mt-6 h-10 w-72 rounded bg-slate-200"></div>

        </div>

        {{-- Cards --}}
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">

            @for ($i = 0; $i < 3; $i++)
                <x-loading.card-skeleton />
            @endfor

        </div>

    </div>

</section>