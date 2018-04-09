<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Anime;
use Jikan\Jikan;
use Jikan\Helper\SearchConfig as SearchConfig;

class AdminController extends Controller
{
    public function home()
    {
        $jikan = new Jikan;
        $config = new SearchConfig(ANIME);
        $config->setType(TYPE_TV);
        $jikan->Search('Jojo', ANIME, 1, $config);
        dd($jikan);
        if (Auth::user()->id !== 1) {
            return redirect()->route('/');
        }
        $animes = Anime::all();
        return view('admin.home', compact('animes'));
    }

    public function anime($id)
    {
        $anime = Anime::where('id', $id)->first();
        return view('admin.anime', compact('anime'));
    }
}
