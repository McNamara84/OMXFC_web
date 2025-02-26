<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FanHistoryController extends Controller
{
    public function update(Request $request)
    {
        $validated = $request->validate([
            'einstiegsroman' => ['nullable', 'string', 'max:255'],
            'lieblingsroman' => ['nullable', 'string', 'max:255'],
            'lieblingszyklus' => ['nullable', 'string', 'max:255'],
            'lieblingscharakter' => ['nullable', 'string', 'max:255'],
            'lesestand' => ['nullable', 'string', 'max:255'],
            'leseform' => ['nullable', 'in:eBook,Papier'],
        ]);

        $user = $request->user();
        $user->fill($validated);
        $user->save();

        return Redirect::route('profile.edit')->with('status', 'fan-history-updated');
    }
}