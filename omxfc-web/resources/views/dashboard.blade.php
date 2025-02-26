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
                    <p><strong>{{ __('Aktueller Mitgliedsbeitrag:') }}</strong> {{ Auth::user()->mitgliedsbeitrag }} €
                    </p>

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
                        <p><strong>{{ __('Nächster Zahltag:') }}</strong>
                            {{ Auth::user()->naechster_zahltag->format('d.m.Y') }}</p>
                    @else
                        <p><strong>{{ __('Nächster Zahltag:') }}</strong> {{ __('Nicht festgelegt') }}</p>
                    @endif

                    {{-- Anwärterliste für Vorstandsmitglieder --}}
                    @if (isset($anwaerter))
                        <h4 class="font-semibold text-lg mt-8 mb-4">{{ __('Zu prüfende Anträge auf Mitgliedschaft') }}</h4>

                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">{{ __('Mitgliedsnummer') }}</th>
                                    <th class="px-4 py-2">{{ __('Eingangsdatum') }}</th>
                                    <th class="px-4 py-2">{{ __('Name') }}</th>
                                    <th class="px-4 py-2">{{ __('Vorname') }}</th>
                                    <th class="px-4 py-2">{{ __('E-Mail') }}</th>
                                    <th class="px-4 py-2">{{ __('Mitgliedsbeitrag') }}</th>
                                    <th class="px-4 py-2">{{ __('Aktionen') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($anwaerter as $anwaerter)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $anwaerter->id }}</td>
                                        <td class="border px-4 py-2">{{ $anwaerter->created_at->format('d.m.Y') }}</td>
                                        <td class="border px-4 py-2">{{ $anwaerter->name }}</td>
                                        <td class="border px-4 py-2">{{ $anwaerter->vorname }}</td>
                                        <td class="border px-4 py-2">{{ $anwaerter->email }}</td>
                                        <td class="border px-4 py-2">{{ $anwaerter->mitgliedsbeitrag }}</td>
                                        <td class="border px-4 py-2">
                                            <form action="{{ route('anwaerter.annehmen', $anwaerter->id) }}" method="POST">
                                                @csrf
                                                <button type="submit"
                                                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">{{ __('Annehmen') }}</button>
                                            </form>
                                            <form action="{{ route('anwaerter.ablehnen', $anwaerter->id) }}" method="POST">
                                                @csrf
                                                <button type="submit"
                                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">{{ __('Ablehnen') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>