<?php

namespace App\Http\Controllers;

use App\Repositories\AnimeManager;
use App\Repositories\EpisodeManager;
use App\Services\AnimeService;
use App\Services\EpisodeService;
use Illuminate\Http\Request;
use Jikan\Jikan;

class AnimeController extends Controller
{
    public function search(Request $request)
    {
        /** @var AnimeService $animeService */
        $animeService = app()->make('anime.service');
        /** @var EpisodeService $episodeService */
        $episodeService = app()->make('episode.service');
        /** @var AnimeManager $animeManager */
        $animeManager = app()->make('anime.manager');
        /** @var EpisodeManager $episodeManager */
        $episodeManager = app()->make('episode.manager');

        $id = $request->id;
        $jikan = new Jikan;
        $anime = $jikan->Anime($id, [EPISODES])->response;
        $anime = (object) $anime;
        //dd($anime);

        $dataAnime = $animeService->getData($anime);
        $animeId = $animeManager->create($dataAnime);

        $dataEpisode = $episodeService->getData($anime->episodes, $anime->episode);

        $episodeManager->create($animeId, $dataEpisode);

        return redirect()->route('admin.home');
    }
}
