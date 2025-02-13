<x-app-layout>
    <div class="grid gap-6 lg:grid-cols-3 lg:gap-8">
        @foreach ($ehrenmitglieder as $mitglied)
            <div
                class="flex flex-col items-start rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
                <img class="w-full object-cover rounded-lg shadow-md" src="{{ $mitglied['foto'] }}"
                    alt="{{ $mitglied['name'] }}" style="width: 400px; height: auto;">
                <div class="pt-3 flex flex-col justify-between h-full">
                    <div>
                        <h2 class="text-xl font-semibold text-black dark:text-white">{{ $mitglied['name'] }}
                        </h2>
                        <p class="mt-4 text-sm/relaxed dark:text-white/70">{{ $mitglied['laudatio'] }}</p>
                    </div>
                    <a href="{{ $mitglied['maddraxikon_link'] }}" target="_blank" rel="noopener noreferrer"
    class="mt-auto inline-flex items-center justify-center rounded-full bg-[#FF2D20]/10 text-[#FF2D20] font-bold py-2 px-4 hover:bg-[#FF2D20]/20 transition duration-300">
    Zum Autoren-Artikel im Maddraxikon
    <svg class="size-4 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
    </svg>
</a>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>