<?php

namespace App\Repositories;

use App\Models\Anime;

class AnimeManager {

    public function create(array $data)
    {
        $anime = new Anime;
        $anime->mal_id = $data['mal_id'];
        $anime->title = $data['title'];
        $anime->title_english = $data['title_english'];
        $anime->title_japanese = $data['title_japanese'];
        $anime->title_synonyms = $data['title_synonyms'];
        $anime->start = $data['dates']['start'];
        $anime->end = $data['dates']['end'];
        $anime->image_url = $data['image_url'];
        $anime->episodes = $data['episodes'];
        $anime->save();

        return $anime->id;
    }
}