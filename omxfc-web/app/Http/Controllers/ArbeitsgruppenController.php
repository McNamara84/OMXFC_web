<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArbeitsgruppenController extends Controller
{
    public function index()
    {
        $arbeitsgruppen = [
            [
                'name' => 'AG Maddraxikon',
                'kurzbeschreibung' => 'Das Maddraxikon ist das dienstälteste Nachschlagewerk zum Maddraxiversum. Egal ob Personen, Schauplätze oder realweltliche Veröffentlichungen - im Maddraxikon wird man (fast) immer fündig! Doch diese Artikel müssen natürlich auch regelmäßig aktualisiert werden und auch die neuen Romane müssen durch neue Artikel beschrieben werden. In dieser Arbeitsgruppe arbeiten wir gemeinsam genau an diesen Punkten und sorgen somit für den langfristigen Erhalt dieses gigantischen Fan-Wikis.',
                'ag_leitung' => 'Holger',
                'treffen' => 'Jeden dritten Montag im Monat zwischen 19:00 und 19:30 Uhr im Rahmen eines Online-Meetings',
                'foto' => asset('images/maddraxikon-logo.png'), // Pfad zum Foto
            ],
            [
                'name' => 'AG Fanhörbücher',
                'kurzbeschreibung' => 'Dieser Text ist ein Platzhalter für die Beschreibung der AG Fanhörbücher. Der Text wird nachgereicht, sobald der AG-Leiter dieser AG einen Text an den Administrator übermittelt hat.',
                'ag_leitung' => 'Martin',
                'treffen' => 'Jeden zweiten Mittwoch im Monat zwischen 19:00 und 19:30 Uhr im Rahmen eines Online-Meetings',
                'foto' => asset('images/eardrax-logo.jpg'), // Pfad zum Foto
            ],
            [
                'name' => 'AG Mapdrax',
                'kurzbeschreibung' => 'Dieser Text ist ein Platzhalter für die Beschreibung der AG Mapdrax. Der Text wird nachgereicht, sobald der AG-Leiter dieser AG einen Text an den Administrator übermittelt hat.',
                'ag_leitung' => 'Marcel',
                'treffen' => 'Wird bekannt gegeben',
                'foto' => asset('images/arbeitsgruppen/mapdrax.png'), // Pfad zum Foto
            ],
        ];

        return view('arbeitsgruppen', compact('arbeitsgruppen')); // Geänderter View-Name
    }
}