<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\art;

class PagesController extends Controller
{
    //
    public function index()
    {
        $art = Art::all();
        return view('testView', ['art' => $art]);
    }
}
