<?php

namespace App\Services;

class AnimeService
{
    function getData($anime)
    {
        return [
            'mal_id' => (int) $anime->mal_id,
            'title' => $anime->title,
            'title_english' => $anime->title_english,
            'title_japanese' => $anime->title_japanese,
            'title_synonyms' => $anime->title_synonyms,
            'dates' => $this->getDates(['start' => $anime->aired['from'], 'end' => $anime->aired['to']]),
            'image_url' => $anime->image_url,
            'episodes' => (int) $anime->episodes,
        ];
    }

    function getDates($dates)
    {
        return [
            'start' => \DateTime::createFromFormat('Y-m-d', $dates['start']),
            'end' => \DateTime::createFromFormat('Y-m-d', $dates['end'])
        ];
    }

}
