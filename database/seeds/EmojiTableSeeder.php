<?php

use App\Emoji;
use Illuminate\Database\Seeder;

class EmojiTableSeeder extends Seeder
{

    protected $limit = 300;
    protected $top;

    public function __construct()
    {

        $this->top = $this->getTopEmojis();

    }

    public function run()
    {

        $data = json_decode(file_get_contents(database_path().'/seeds/emoji_pretty.json'));

        foreach($data as $emoji)
        {

            if($this->isInTopEmojis($emoji))
            {

                $this->insertEmoji($emoji);

            }

        }

    }

    private function insertEmoji($emoji)
    {

        Emoji::create([
            'name'      => $emoji->name,
            'unified'   => $emoji->unified,
            'short'     => $emoji->short_name
        ]);

    }

    private function isInTopEmojis($emoji)
    {

        if(in_array($emoji->unified, $this->top))
        {
            return true;
        }

        return false;

    }

    private function getTopEmojis()
    {

        $rankings = json_decode(file_get_contents('http://emojitracker.com/api/rankings'));
        $top = [];

        for($i=0; $i < $this->limit; $i++)
        {

            array_push($top, $rankings[$i]->id);

        }

        return $top;

    }

}