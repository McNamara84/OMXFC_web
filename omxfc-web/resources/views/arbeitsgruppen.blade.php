<x-app-layout>
    <div class="grid gap-6 lg:grid-cols-3 lg:gap-8">
        @foreach ($arbeitsgruppen as $arbeitsgruppe)
            <div
                class="flex flex-col items-start rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
                <img class="w-full object-cover rounded-lg shadow-md" src="{{ $arbeitsgruppe['foto'] }}"
                    alt="{{ $arbeitsgruppe['name'] }}" style="width: 400px; height: auto;">
                <div class="pt-3 flex flex-col justify-between h-full">
                    <div>
                        <h2 class="text-xl font-semibold text-black dark:text-white">{{ $arbeitsgruppe['name'] }}
                        </h2>
                        <p class="mt-4 text-sm/relaxed dark:text-white/70">{{ $arbeitsgruppe['kurzbeschreibung'] }}</p>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-black dark:text-white">AG-Leitung: <p class="text-sm text-black dark:text-white/70">{{ $arbeitsgruppe['ag_leitung'] }}</p></p>
                        <p class="text-sm font-semibold text-black dark:text-white">Treffen: <p class="text-sm text-black dark:text-white/70">{{ $arbeitsgruppe['treffen'] }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>