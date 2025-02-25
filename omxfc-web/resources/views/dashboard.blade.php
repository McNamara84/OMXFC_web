<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="font-semibold text-lg mb-4">{{ __('Willkommen im Mitgliederbereich!') }}</h3>

                    <p><strong>{{ __('Mitgliedsnummer:') }}</strong> {{ Auth::user()->id }}</p>
                    <p><strong>{{ __('Aktueller Mitgliedsbeitrag:') }}</strong> {{ Auth::user()->mitgliedsbeitrag }} €</p>

                    <p>
                        <strong>{{ __('Mitglied seit:') }}</strong>
                        {{ Auth::user()->created_at->format('d.m.Y') }}
                        @php
                            $start = Auth::user()->created_at;
                            $end = now(); // Aktuelle Zeit
                            $years = $start->diff($end)->y;
                            $months = $start->diff($end)->m;
                        @endphp
                        {{ __('(seit ') }} {{ $years }} {{ __(' Jahren und ') }} {{ $months }} {{ __(' Monaten)') }}
                    </p>

                    <p><strong>{{ __('Belohnungspunkte:') }}</strong> {{ Auth::user()->belohnungspunkte }}</p>
                    @if(Auth::user()->naechster_zahltag)
                        <p><strong>{{ __('Nächster Zahltag:') }}</strong> {{ Auth::user()->naechster_zahltag->format('d.m.Y') }}</p>
                    @else
                        <p><strong>{{ __('Nächster Zahltag:') }}</strong> {{ __('Nicht festgelegt') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>