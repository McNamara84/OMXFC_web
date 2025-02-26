<!-- resources/views/profile/partials/update-fan-history-form.blade.php -->
<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Meine Fan-Geschichte') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Erzähle uns mehr über deine Maddrax-Erfahrungen und Vorlieben.') }}
        </p>
    </header>

    <form method="post" action="{{ route('fan-history.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="einstiegsroman" :value="__('Einstiegsroman')" />
            <x-text-input id="einstiegsroman" name="einstiegsroman" type="text" class="mt-1 block w-full"
                :value="old('einstiegsroman', $user->einstiegsroman)" />
            <x-input-error class="mt-2" :messages="$errors->get('einstiegsroman')" />
        </div>

        <div>
            <x-input-label for="lieblingsroman" :value="__('Lieblingsroman')" />
            <x-text-input id="lieblingsroman" name="lieblingsroman" type="text" class="mt-1 block w-full"
                :value="old('lieblingsroman', $user->lieblingsroman)" />
            <x-input-error class="mt-2" :messages="$errors->get('lieblingsroman')" />
        </div>

        <div>
            <x-input-label for="lieblingszyklus" :value="__('Lieblingszyklus')" />
            <x-text-input id="lieblingszyklus" name="lieblingszyklus" type="text" class="mt-1 block w-full"
                :value="old('lieblingszyklus', $user->lieblingszyklus)" />
            <x-input-error class="mt-2" :messages="$errors->get('lieblingszyklus')" />
        </div>

        <div>
            <x-input-label for="lieblingscharakter" :value="__('Lieblingscharakter')" />
            <x-text-input id="lieblingscharakter" name="lieblingscharakter" type="text" class="mt-1 block w-full"
                :value="old('lieblingscharakter', $user->lieblingscharakter)" />
            <x-input-error class="mt-2" :messages="$errors->get('lieblingscharakter')" />
        </div>

        <div>
            <x-input-label for="lesestand" :value="__('Lesestand')" />
            <x-text-input id="lesestand" name="lesestand" type="text" class="mt-1 block w-full" :value="old('lesestand', $user->lesestand)" />
            <x-input-error class="mt-2" :messages="$errors->get('lesestand')" />
        </div>

        <div>
            <x-input-label for="leseform" :value="__('Leseform')" />
            <select id="leseform" name="leseform"
                class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                <option value="">-- Bitte wählen --</option>
                <option value="eBook" {{ old('leseform', $user->leseform) === 'eBook' ? 'selected' : '' }}>eBook</option>
                <option value="Papier" {{ old('leseform', $user->leseform) === 'Papier' ? 'selected' : '' }}>Papier
                </option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('leseform')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Speichern') }}</x-primary-button>

            @if (session('status') === 'fan-history-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Gespeichert.') }}</p>
            @endif
        </div>
    </form>
</section>