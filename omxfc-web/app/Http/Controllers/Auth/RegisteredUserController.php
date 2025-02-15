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
use Illuminate\Support\Facades\Mail; // Mail Facade importieren
use App\Mail\NewMembershipApplication; // Die Mailable-Klasse importieren
use App\Mail\MembershipApplicationReceived;

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
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'agb_akzeptiert' => ['required', 'accepted'], // Checkbox muss akzeptiert sein
            'mitgliedsbeitrag' => ['required', 'numeric', 'min:12', 'max:100'],
        ]);

        // Stelle sicher, dass ein Wert für mitgliedsbeitrag vorhanden ist.
        $mitgliedsbeitrag = $request->mitgliedsbeitrag ?? 12.00; // Fallback auf 12, falls kein Wert vorhanden

        $user = User::create([
            'name' => $request->vorname . $request->nachname, // Vorname und Nachname zusammensetzen
            'vorname' => $request->vorname,
            'nachname' => $request->nachname,
            'strasse' => $request->strasse,
            'hausnummer' => $request->hausnummer,
            'postleitzahl' => $request->postleitzahl,
            'stadt' => $request->stadt,
            'land' => $request->land,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rolle' => 'anwaerter', // Rolle auf "Anwärter" setzen
            'agb_akzeptiert' => true, // AGB als akzeptiert speichern
            'mitgliedsbeitrag' => $mitgliedsbeitrag,
        ]);

        event(new Registered($user));

        // E-Mail an den Vorstand senden
        Mail::to('info@maddraxikon.com')->send(new NewMembershipApplication($request->all()));

        // E-Mail an den Antragsteller senden
        Mail::to($request->email)->send(new MembershipApplicationReceived($request->vorname . ' ' . $request->nachname));

        //Auth::login($user); // Login deaktivieren

        return redirect('/')->with('success', 'Dein Antrag wurde erfolgreich versendet. Du erhältst eine E-Mail, sobald dein Account freigeschaltet wurde.');
    }
}