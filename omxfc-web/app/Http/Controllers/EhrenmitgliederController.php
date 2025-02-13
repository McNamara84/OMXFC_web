<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EhrenmitgliederController extends Controller
{
    public function index()
    {
        $ehrenmitglieder = [
            [
                'name' => 'Michael Edelbrock',
                'laudatio' => 'Michael Edelbrock wurde 1980 geboren und beschäftigt sich am liebsten mit dicken Schmökern oder langen Sagen, sowohl in der klassischen Phantastik als auch in der Science-Fiction.
Heute lebt er am Rande des Ruhrgebiets und schreibt dort seine Kurzgeschichten, Heftromane sowie eine phantastische Saga in Romanform.
Er schreibt seit 2022 für die Maddrax-Serie und erhielt bisher zweimal den Leserpreis für den besten Roman eines Jahres, die „Goldene Taratze“ im Jahr 2022 für Erschütterungen (MX 594) und 2025 für Die Gestade der Zeit (MX 628).
Seine Romane werden im Maddraxikon im Durchschnitt mit 4,09 Kometen bewertet.',
                'maddraxikon_link' => 'https://de.maddraxikon.com/index.php?title=Michael_Edelbrock',
                'foto' => asset('images/edelbrock.jpg'),
            ],
            [
                'name' => 'Jo Zybell',
                'laudatio' => 'Jo Zybell (Thomas Ziebula) wurde 1954 geboren und hat die Serie als Autor seit 2000 aktiv mitgestaltet. Von ihm wurde eine Vielzahl an Heftromanen und ergänzenden Hardcover-Bücher geschrieben, die das Maddrax-Universum ausloten. 2018 hat er leider das Autorenteam verlassen. Er schrieb außerdem unter Pseudonym an verschiedenen Serien mit und hat mehrere Bücher verfasst.
2001 gewann er den Deutschen Phantastik-Preis als Bester Autor.
Seine Romane werden im Maddraxikon im Durchschnitt mit 3,86 Kometen bewertet.',
                'maddraxikon_link' => 'https://de.maddraxikon.com/index.php?title=Thomas_Ziebula',
                'foto' => asset('images/zybell.jpg'),
            ],
            [
                'name' => 'Lucy Guth',
                'laudatio' => 'Lucy Guth (Tanja Monique Bruske-Guth) wurde 1978 geboren und ist seit 2014 als Maddrax-Autorin dabei und hat dementsprechend schon viel Gutes beigetragen. In ihrem Hauptberuf arbeitet sie als Redakteurin bei der Gelnhäuser Neuen Zeitung. Sie veröffentlicht als Tanja Bruske Theaterstücke und Romane und als Lucy Guth auch für Perry Rhodan.
2023 erhielt sie den Leserpreis „Goldene Taratze“ für ihren Roman Das Haus auf dem Hügel (MX 607).
Ihre Romane werden im Maddraxikon im Durchschnitt mit 3,69 Kometen bewertet.',
                'maddraxikon_link' => 'https://de.maddraxikon.com/index.php?title=Lucy_Guth',
                'foto' => asset('images/guth.jpg'), 
            ],
            [
                'name' => 'Oliver Müller',
                'laudatio' => 'Oliver Müller wurde 1983 geboren und gab seinen Einstand bei Maddrax im Jahr 2014 mit Ein Käfig aus Zeit (MX 365). Neben seinem Hauptberuf veröffentlicht er viele Kurzgeschichten und schreibt Romane, auch für Professor Zamorra und John Sinclair.
Sein Roman Der Giftplanet (MX 540) wurde 2021 zum besten Maddrax-Roman mit der „Goldenen Taratze“ ausgezeichnet.
Seine Romane werden im Maddraxikon im Durchschnitt mit 3,60 Kometen bewertet.',
                'maddraxikon_link' => 'https://de.maddraxikon.com/index.php?title=Oliver_Müller',
                'foto' => asset('images/mueller.jpg'),
            ],
            [
                'name' => 'Michael „Mad Mike“ Schönenbröcher',
                'laudatio' => 'Michael Schönenbröcher (Mad Mike) wurde 1961 geboren, ist seit 1979 Lektor beim Bastei Verlag und seit 2000 alleiniger Betreuer von Maddrax. Die Serie, die in Zusammenarbeit mit den Autoren immer weiter ausgestaltet wird, geht auf seine Idee zurück. Neben der redaktionellen Arbeit schrieb er in der Vergangenheit auch selbst Romane für Maddrax. Außerdem entwirft er etliche der außergewöhnlichen Cover - oder lässt sie von Künstlern speziell anfertigen.
Seine Romane werden im Maddraxikon im Durchschnitt mit 3,78 Kometen bewertet',
                'maddraxikon_link' => 'https://de.maddraxikon.com/index.php?title=Michael_Schönenbröcher',
                'foto' => asset('images/schoenenbroecher.jpg'),
            ],
            [
                'name' => 'Ian Rolf Hill',
                'laudatio' => 'Ian Rolf Hill (Florian Hilleberg) wurde 1980 geboren und ist seit 2016 für Maddrax aktiv. Für die Serie hat er eine Vielzahl an Romanen geschrieben und interessante Charaktere entwickelt, und hat so die Weiterentwicklung des Maddrax-Universums aktiv mitgestaltet. Er schreibt außerdem für John Sinclair. Seit 2024 hat er beschlossen, als Maddrax-Autor kürzer zu treten.
Seine Romane werden im Maddraxikon im Durchschnitt mit 3,47 Kometen bewertet.',
                'maddraxikon_link' => 'https://de.maddraxikon.com/index.php?title=Ian_Rolf_Hill',
                'foto' => asset('images/hill.jpg'),
            ],
        ];

        return view('ehrenmitglieder', ['ehrenmitglieder' => $ehrenmitglieder]);
    }
}