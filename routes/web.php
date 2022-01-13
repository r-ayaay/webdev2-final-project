<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtController;
use App\Http\Controllers\PoetryController;
use App\Http\Controllers\ExhibitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MusicController;
use Illuminate\Http\Request;

use App\Models\exhibit;
use App\Models\art;
use App\Models\poetry;
use App\Models\music;
use App\Models\User;

Auth::routes();

Route::group(['middleware' => ['auth', 'isUser']], function () {
    Route::get('/home', function () {
        $exhibits = exhibit::all();
        $arts = art::all();
        $poetries = poetry::all();
        $musics = music::all();
        return view('testView', ['exhibits' => $exhibits, 'arts' => $arts, 'poetries' => $poetries, 'musics' => $musics]);
    })->name('home');
});

Route::resource('art', ArtController::class);
Route::post('/art/addToExhibit/{id}', [ArtController::class, 'addToExhibit']);
Route::resource('poetry', PoetryController::class);
Route::post('/poetry/addToExhibit/{id}', [PoetryController::class, 'addToExhibit']);
Route::resource('exhibit', ExhibitController::class);
Route::resource('user', UserController::class);
Route::get('/user/changeAdmin/{id}', [UserController::class, 'changeAdmin']);
Route::get('/user/changeBan/{id}', [UserController::class, 'changeBan']);
Route::get('/exhibit/changeStatus/{id}', [ExhibitController::class, 'changeStatus']);
Route::resource('music', MusicController::class);
Route::post('/music/addToExhibit/{id}', [MusicController::class, 'addToExhibit']);

Route::resource('user', UserController::class);

Route::get('/', function () {

    // if(Auth::check()){
    //     return redirect()->route('art.index');
    // }

    // else{$exhibit = exhibit::all();
    $exhibits = exhibit::all();
    $arts = art::all();
    return view('tables.gallery.exhibits', ['exhibits' => $exhibits, 'arts' => $arts]);

    // return redirect('/login');
    // }

});

Route::get('/archives', function () {

    // if(Auth::check()){
    //     return redirect()->route('art.index');
    // }

    // else{$exhibit = exhibit::all();
    $exhibits = exhibit::all();
    $arts = art::all();
    return view('tables.gallery.exhibits', ['exhibits' => $exhibits, 'arts' => $arts]);

    // return redirect('/login');
    // }

});

Route::get('/exhibit-{id}', function ($id) {

    $exhibit = exhibit::find($id);
    $exhibits = exhibit::all();
    $art = art::where('exhibit_id', $id)->get();
    $poetry = poetry::where('exhibit_id', $id)->get();
    $music = music::where('exhibit_id', $id)->get();
    $user = User::all();
    return view('tables.gallery.exhibit', ['exhibit' => $exhibit, 'exhibits' => $exhibits, 'art' => $art, 'poetry' => $poetry, 'music' => $music, 'user' => $user]);
});

// idk about this, ill work on it after the main backend component is working
// Route::get('/test/{any}', 'App\Http\Controllers\PagesController@index')->where('any', '.*');
Route::get('/vue/{any}', 'App\Http\Controllers\PagesController@index')->where('any', '^(?!login|register|logout).*');
// Route::get('/test', 'App\Http\Controllers\PagesController@index');

Route::get('/api/getart', function () {
    $art = Art::all();
    return $art;
});

Route::post('/addart', function (Request $request) {

    $destination_path = 'public/art';
    $photo = $_FILES['photo'];
    request(('photo'))->storeAs($destination_path, $photo['name']);

    $art = new Art;
    $art->user_id = Auth::user()->id;
    $art->title = $request->title;
    $art->description = $request->description;
    $art->photo = $photo['name'];
    $art->theme = $request->theme;
    $art->save();
    return response()->json(
        [
            'success' => true,
            'message' => "it worked",
        ]
    );
});

Route::post('/deleteart/{id}', function ($id) {
    $art = art::find($id);

    if ($art) {
        $art->delete();
    }
});

Route::get('/api/getpoetry', function () {
    $poetry = Poetry::all();
    return $poetry;
});

Route::post('/addpoetry', function (Request $request) {

    $poetry = new Poetry;
    $poetry->user_id = Auth::user()->id;
    $poetry->title = $request->title;
    $poetry->body = $request->body;
    $poetry->theme = $request->theme;
    $poetry->save();

    return response()->json(
        [
            'success' => true,
            'message' => 'Poetry added!'
        ]
    );
});

Route::post('/deletepoetry/{id}', function ($id) {
    $poetry = poetry::find($id);

    if ($poetry) {
        $poetry->delete();
    }
});

Route::get('/api/getmusic', function () {
    $music = Music::all();
    return $music;
});

Route::post('/deletemusic/{id}', function ($id) {
    $music = music::find($id);

    if ($music) {
        $music->delete();
    }
});
