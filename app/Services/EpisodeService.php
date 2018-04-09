<?php

namespace App\Services;

class EpisodeService
{
    function getData($nbr, $episodes)
    {
        $episodesArray = [];
        if (empty($episodes)) {
            for ($i = 1; $i <= $nbr; $i++) {
                $episode = [
                    'title' => 'Episode '.$i,
                    'title_japanese' => 'Episode '.$i,
                    'title_romanji' => 'Episode '.$i,
                ];
                array_push($episodesArray, $episode);
            }
            return $episodesArray;
        } else {
            foreach ($episodes as $episode) {
                $episode = [
                    'title' => $episode['title'],
                    'title_japanese' => $episode['title_japanese'],
                    'title_romanji' => $episode['title_romanji'],
                ];
                array_push($episodesArray, $episode);
            }
            return $episodesArray;
        }
    }
}
