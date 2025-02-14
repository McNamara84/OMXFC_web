<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'vorname' => ['required', 'string', 'max:255'],
            'nachname' => ['required', 'string', 'max:255'],
            'strasse' => ['required', 'string', 'max:255'],
            'hausnummer' => ['required', 'string', 'max:255'],
            'postleitzahl' => ['required', 'string', 'max:255'],
            'stadt' => ['required', 'string', 'max:255'],
            'land' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'agb_akzeptiert' => ['required', 'accepted'], // Checkbox muss akzeptiert sein
            'mitgliedsbeitrag' => ['required', 'numeric', 'min:12', 'max:100'],
        ]);

        $user = User::create([
            'name' => $request->vorname . $request->nachname,
            'vorname' => $request->vorname,
            'nachname' => $request->nachname,
            'strasse' => $request->strasse,
            'hausnummer' => $request->hausnummer,
            'postleitzahl' => $request->postleitzahl,
            'stadt' => $request->stadt,
            'land' => $request->land,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rolle' => 'anwaerter',
            'agb_akzeptiert' => true,
            'mitgliedsbeitrag' => $request->mitgliedsbeitrag,
        ]);

        event(new Registered($user));

        //Auth::login($user); // Login deaktivieren

        return redirect('/')->with('success', 'Dein Antrag wurde erfolgreich versendet. Du erhältst eine E-Mail, sobald dein Account freigeschaltet wurde.');
    }
}