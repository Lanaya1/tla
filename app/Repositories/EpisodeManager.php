<?php

namespace App\Repositories;

use App\Models\Episode;

class EpisodeManager {

    public function create($animeId, $data)
    {
        foreach ($data as $i => $d) {
            $episode = new Episode;
            $episode->anime_id = $animeId;
            $episode->episode_id = $i+1;
            $episode->title = $d['title'];
            $episode->title_japanese = $d['title_japanese'];
            $episode->title_romanji = $d['title_romanji'];
            $episode->save();
        }
    }
}