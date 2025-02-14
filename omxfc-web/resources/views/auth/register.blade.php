<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="grid grid-cols-2 gap-4">
            <!-- Vorname -->
            <div>
                <x-input-label for="vorname" :value="__('Vorname')" />
                <x-text-input id="vorname" class="block mt-1 w-full dark:bg-gray-700 dark:text-white" type="text" name="vorname" :value="old('vorname')" required autofocus autocomplete="given-name" />
                <x-input-error :messages="$errors->get('vorname')" class="mt-2" />
            </div>

            <!-- Nachname -->
            <div>
                <x-input-label for="nachname" :value="__('Nachname')" />
                <x-text-input id="nachname" class="block mt-1 w-full dark:bg-gray-700 dark:text-white" type="text" name="nachname" :value="old('nachname')" required autocomplete="family-name" />
                <x-input-error :messages="$errors->get('nachname')" class="mt-2" />
            </div>
        </div>

        <div class="mt-4 grid grid-cols-2 gap-4">
            <!-- Straße -->
            <div>
                <x-input-label for="strasse" :value="__('Straße')" />
                <x-text-input id="strasse" class="block mt-1 w-full dark:bg-gray-700 dark:text-white" type="text" name="strasse" :value="old('strasse')" required autocomplete="street-address" />
                <x-input-error :messages="$errors->get('strasse')" class="mt-2" />
            </div>

            <!-- Hausnummer -->
            <div>
                <x-input-label for="hausnummer" :value="__('Hausnummer')" />
                <x-text-input id="hausnummer" class="block mt-1 w-full dark:bg-gray-700 dark:text-white" type="text" name="hausnummer" :value="old('hausnummer')" required autocomplete="address-line1" />
                <x-input-error :messages="$errors->get('hausnummer')" class="mt-2" />
            </div>
        </div>

        <div class="mt-4 grid grid-cols-2 gap-4">
            <!-- Postleitzahl -->
            <div>
                <x-input-label for="postleitzahl" :value="__('Postleitzahl')" />
                <x-text-input id="postleitzahl" class="block mt-1 w-full dark:bg-gray-700 dark:text-white" type="text" name="postleitzahl" :value="old('postleitzahl')" required autocomplete="postal-code" />
                <x-input-error :messages="$errors->get('postleitzahl')" class="mt-2" />
            </div>

            <!-- Stadt -->
            <div>
                <x-input-label for="stadt" :value="__('Stadt')" />
                <x-text-input id="stadt" class="block mt-1 w-full dark:bg-gray-700 dark:text-white" type="text" name="stadt" :value="old('stadt')" required autocomplete="address-level2" />
                <x-input-error :messages="$errors->get('stadt')" class="mt-2" />
            </div>
        </div>

        <!-- Land -->
        <div class="mt-4">
            <x-input-label for="land" :value="__('Land')" />
            <select id="land" name="land" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                <option value="Deutschland">Deutschland</option>
                <option value="Österreich">Österreich</option>
                <option value="Schweiz">Schweiz</option>
            </select>
            <x-input-error :messages="$errors->get('land')" class="mt-2" />
        </div>

        <!-- E-Mail -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('E-Mail')" />
            <x-text-input id="email" class="block mt-1 w-full dark:bg-gray-700 dark:text-white" type="email" name="email" :value="old('email')" required autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Passwort -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Passwort')" />
            <x-text-input id="password" class="block mt-1 w-full dark:bg-gray-700 dark:text-white" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Passwort bestätigen -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Passwort bestätigen')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full dark:bg-gray-700 dark:text-white" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Mitgliedsbeitrag -->
        <div class="mt-4">
            <x-input-label for="mitgliedsbeitrag" :value="__('Jährlicher Mitgliedsbeitrag (ab 12,00 €)')" />
            <input type="range" id="mitgliedsbeitrag" name="mitgliedsbeitrag" min="12" max="100" step="1" value="12"
                   class="block mt-1 w-full"
                   oninput="updateBeitragValue(this.value)">
            <p id="beitragValue">12,00 €</p>
            <x-input-error :messages="$errors->get('mitgliedsbeitrag')" class="mt-2" />
        </div>

        <!-- AGB Checkbox -->
        <div class="mt-4">
            <label for="agb_akzeptiert" class="inline-flex items-center">
                <input id="agb_akzeptiert" type="checkbox" class="border-gray-300 dark:border-gray-700 rounded shadow-sm focus:ring-indigo-500 dark:bg-gray-900 dark:focus:ring-indigo-600 dark:ring-offset-gray-800" name="agb_akzeptiert" required>
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Ich habe die Satzung gelesen und bin mir über meine Rechte und Pflichten als Mitglied bewusst.') }}</span>
            </label>
            <x-input-error :messages="$errors->get('agb_akzeptiert')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Account bereits erstellt?') }}
            </a>

            <x-primary-button class="ms-4" id="register-button" disabled>
                {{ __('Mitgliedschaft beantragen') }}
            </x-primary-button>
        </div>
    </form>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <script>
        const agbCheckbox = document.getElementById('agb_akzeptiert');
        const registerButton = document.getElementById('register-button');

        agbCheckbox.addEventListener('change', function() {
            registerButton.disabled = !this.checked;
        });

        function updateBeitragValue(val) {
            document.getElementById('beitragValue').innerText = val + ',00 €';
        }
    </script>
</x-guest-layout>