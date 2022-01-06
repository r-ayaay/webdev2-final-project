<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\art;
use App\Models\exhibit;
use App\Models\poetry;
use App\Models\music;

class PagesController extends Controller
{
    //
    public function index()
    {
        $arts = Art::all();
        $exhibits = Exhibit::all();
        $poetries = Poetry::all();
        $musics = Music::all();
        return view('testView')->with('arts', $arts)->with('exhibits', $exhibits)->with('poetries', $poetries)->with('musics', $musics);
    }
}
