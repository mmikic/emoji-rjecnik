<?php

namespace App\Http\Controllers;

use App\Definition;
use App\Emoji;
use Illuminate\Http\Request;

class AppController extends Controller
{

    public function index()
    {

        session(['finished' => array()]);

        $data = [
            'emojis'        => $this->surveyEmojis(),
            'stats'         => $this->getStats()
        ];

        return view('front', $data);

    }

    public function restart()
    {

        return $this->surveyEmojis();

    }

    public function dumpDB()
    {

        $data = [
            'emojis'        => Emoji::with('definitions')->has('definitions')->get(),
            'stats'         => $this->getStats()
        ];

        return view('dump', $data);

    }

    private function surveyEmojis()
    {

        $emojis = Emoji::orderByRaw('RAND()')->take(10)->get();

        $showing = collect();
        $finished = session('finished');

        foreach($emojis as $emoji)
        {
            if(!in_array($emoji->id, $finished))
            {

                $showing->push($emoji);

            }
        }

        return json_encode($showing);

    }

    public function save(Request $request)
    {

        $emojis = json_decode($request->input('data'));

        foreach($emojis as $emoji)
        {

            $this->addEmoji($emoji);

        }

    }

    private function addEmoji($emoji)
    {

        if($emoji->semantic != '')
        {

            Definition::create([
                'emoji_id'      => $emoji->id,
                'semantic'      => $emoji->semantic,
                'pragmatic'     => $emoji->pragmatic
            ]);

            $sessions = session('finished');
            array_push($sessions, $emoji->id);
            session('finished', $sessions);

        }

    }

    private function getStats()
    {
        return [
            'emojis'        => Emoji::count(),
            'semantics'     => Definition::where('semantic', '!=', '')->count(),
            'pragmatics'    => Definition::where('pragmatic', '!=', '')->count()
        ];
    }

}
