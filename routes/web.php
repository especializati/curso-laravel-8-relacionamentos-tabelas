<?php

use App\Models\{
    User,
    Preference
};
use Illuminate\Support\Facades\Route;

Route::get('/one-to-one', function () {
    $user = User::with('preference')->find(2);

    $data = [
        'background_color' => '#fff',
    ];

    if ($user->preference) {
        $user->preference->update($data);
    } else {
        // $user->preference()->create($data);
        $preference = new Preference($data);
        $user->preference()->save($preference);
    }

    $user->refresh();
    var_dump($user->preference);

    $user->preference->delete();
    $user->refresh();
    
    dd($user->preference);
});

Route::get('/', function () {
    return view('welcome');
});
