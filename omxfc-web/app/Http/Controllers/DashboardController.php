<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [];
        if (auth()->user()->rolle === 'vorstand') {
            $data['anwaerter'] = User::where('rolle', 'anwaerter')->get();
        }

        return view('dashboard', $data);
    }

    public function vorstandDashboard()
    {
        $anwaerter = User::where('rolle', 'anwaerter')->get();

        return view('dashboard', [
            'anwaerter' => $anwaerter,
        ]);
    }

    public function annehmen(Request $request, $id)
    {
        $anwaerter = User::findOrFail($id);
        $anwaerter->rolle = 'mitglied';
        $anwaerter->save();

        return redirect()->route('dashboard.vorstand')->with('success', 'Anwärter angenommen.');
    }

    public function ablehnen(Request $request, $id)
    {
        $anwaerter = User::findOrFail($id);
        $anwaerter->delete();

        return redirect()->route('dashboard.vorstand')->with('success', 'Anwärter abgelehnt.');
    }
}