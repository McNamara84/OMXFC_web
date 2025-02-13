<x-app-layout>
    <x-slot name="header">
        Ehrenmitglieder
    </x-slot>

    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <div
            class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">

                <main class="mt-6">
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
                                        class="mt-auto inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                                        Zum Autoren-Artikel im Maddraxikon
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </main>

            </div>
        </div>
    </div>
</x-app-layout>