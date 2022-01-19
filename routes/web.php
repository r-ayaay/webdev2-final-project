<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtController;
use App\Http\Controllers\PoetryController;
use App\Http\Controllers\ExhibitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\LogoutController;
use Illuminate\Http\Request;

use App\Models\exhibit;
use App\Models\art;
use App\Models\poetry;
use App\Models\music;
use App\Models\User;

Auth::routes();

Route::group(['middleware' => ['auth', 'isUser']], function () {
    Route::get('/home', function () {

        return redirect('/vue/art');
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
    return redirect('/gallery');
});

Route::get('/gallery', function () {

    // if(Auth::check()){
    //     return redirect()->route('art.index');
    // }

    // else{$exhibit = exhibit::all();
    return view('vueGallery');
});
Route::get('/gallery/{any}', function () {
    return view('vueGallery');
})->where('any', '^(?!login|register|logout).*');

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
// Route::get('/{any}', 'App\Http\Controllers\PagesController@index');

// Route::get('/test', 'App\Http\Controllers\PagesController@index');

// ============================FOR Art.vue============================
Route::get('/api/edit/getart/{id}', function ($id) {
    $art_data = Art::where('id', $id)->get();
    return $art_data;
});

Route::get('/api/getart', function () {
    if (Auth::user()->admin == 1) {
        $art = Art::all();
    } else {
        $art = Art::where('user_id', Auth::user()->id)->get();
    }
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

Route::post('/update/art', function (Request $request) {

    $destination_path = 'public/art';
    $photo = $_FILES['photo'];
    request(('photo'))->storeAs($destination_path, $photo['name']);

    $art = Art::findOrFail($request->id);
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
// ============================FOR Art.vue============================

// ============================FOR Poetry.vue============================
Route::get('/api/getpoetry', function () {
    if (Auth::user()->admin == 1) {
        $poetry = Poetry::all();
    } else {
        $poetry = Poetry::where('user_id', Auth::user()->id)->get();
    }
    return $poetry;
});

Route::get('/edit/getpoetry/{id}', function ($id) {
    $poetry_data = Poetry::where('id', $id)->get();
    return $poetry_data;
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

Route::post('/update/poetry', function (Request $request) {

    $poetry = Poetry::findOrFail($request->id);
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
// ============================FOR Poetry.vue============================

// ============================FOR Music.vue============================

Route::get('/api/edit/Music/{id}', function ($id) {
    $music_data = Music::where('id', $id)->get();
    return $music_data;
});

Route::get('/api/getmusic', function () {
    if (Auth::user()->admin == 1) {
        $music = Music::all();
    } else {
        $music = Music::where('user_id', Auth::user()->id)->get();
    }
    return $music;
});

Route::post('/addmusic', function (Request $request) {

    $destination_path = 'public/music';
    $photo = $_FILES['photo'];
    $audio = $_FILES['music'];
    request(('photo'))->storeAs($destination_path, $photo['name']);
    request(('music'))->storeAs($destination_path, $audio['name']);

    $music = new Music;
    $music->user_id = Auth::user()->id;
    $music->title = $request->title;
    $music->genre = $request->genre;
    $music->photo = $photo['name'];
    $music->music = $audio['name'];
    $music->save();
    return response()->json(
        [
            'success' => true,
            'message' => "it worked",
        ]
    );
});

Route::post('/update/music', 'App\Http\Controllers\MusicController@update');

Route::post('/deletemusic/{id}', function ($id) {
    $music = music::find($id);

    if ($music) {
        $music->delete();
    }
});

Route::get('/api/getexhibit', function () {
    $exhibit = Exhibit::all();
    return $exhibit;
});

Route::get('/api/getexhibit/{id}', function ($id) {
    $exhibit = exhibit::find($id);
    $exhibits = exhibit::all();
    $art = art::where('exhibit_id', $id)->get();
    $poetry = poetry::where('exhibit_id', $id)->get();
    $music = music::where('exhibit_id', $id)->get();
    $user = User::all();
    return ['exhibit' => $exhibit, 'exhibits' => $exhibits, 'art' => $art, 'poetry' => $poetry, 'music' => $music, 'user' => $user];
});

Route::post('/addexhibit', function (Request $request) {

    $exhibit = new exhibit;
    $exhibit->user_id = Auth::user()->id;
    $exhibit->title = $request->title;
    $exhibit->description = $request->description;
    $exhibit->theme = $request->theme;
    $exhibit->startDate = $request->startDate;
    $exhibit->endDate = $request->endDate;
    $exhibit->save();

    return response()->json(
        [
            'success' => true,
            'message' => 'exhibit added!'
        ]
    );
});

Route::post('/deleteexhibit/{id}', function ($id) {
    $exhibit = exhibit::find($id);

    if ($exhibit) {
        $exhibit->delete();
    }
});

Route::get('/api/getusername/{id}', function ($id) {
    $name = user::find($id)->name;
    return $name;
});

Route::get('/api/getusers', function () {
    $users = user::all();
    return $users;
});

Route::get('/api/getexhibit/{id}/art', function ($id) {
    $art = Art::where('exhibit_id', $id)->get();
    return $art;
});
Route::get('/api/getexhibit/{id}/music', function ($id) {
    $music = music::where('exhibit_id', $id)->get();
    return $music;
});
Route::get('/api/getexhibit/{id}/poetry', function ($id) {
    $poetry = poetry::where('exhibit_id', $id)->get();
    return $poetry;
});

Route::group(['middleware' => ['auth']], function() {
    /**
    * Logout Route
    */
    Route::get('/logout', [LogoutController::class, 'logout']);
 });