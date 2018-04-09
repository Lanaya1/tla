<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jikan\Jikan;

class AnimeController extends Controller
{
    public function search(Request $request)
    {
        $id = $request->id;
        $jikan = new Jikan;
        $anime = $jikan->Anime($id, [EPISODES])->response;
        $anime = (object) $anime;

        $animeService = app()->make('anime.service');
        $data = $animeService->getData($anime);
        $animeId = app()->make('animes.manager')->create($data);

        return redirect()->route('admin.home');
    }
}
