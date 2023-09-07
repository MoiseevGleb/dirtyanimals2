<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class RouletteController extends Controller
{
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $musicArray = glob('storage/music/*');
        $music = basename($musicArray[array_rand($musicArray)]);

        return view('roulette.index', compact('music'));
    }
}
