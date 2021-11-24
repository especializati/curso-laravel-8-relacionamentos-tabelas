<?php

use App\Models\{
    Course,
    Permission,
    User,
    Preference
};
use Illuminate\Support\Facades\Route;

Route::get('/many-to-many', function () {
    $user = User::with('permissions')->find(1);

    // $permission = Permission::find(1);
    // $user->permissions()->save($permission);
    // $user->permissions()->saveMany([
    //     Permission::find(1),
    //     Permission::find(3),
    //     Permission::find(2),
    // ]);
    // $user->permissions()->sync([2]);
    // $user->permissions()->attach([1, 3]);
    $user->permissions()->detach([1, 3]);

    $user->refresh();

    dd($user->permissions);
});

Route::get('/one-to-many', function () {
    // $course = Course::create(['name' => 'Curso de Laravel']);
    $course = Course::with('modules.lessons')->first();

    echo $course->name;
    echo '<br>';
    foreach ($course->modules as $module) {
        echo "Módulo {$module->name} <br>";

        foreach ($module->lessons as $lesson) {
            echo "Aula {$lesson->name} <br>";
        }
    }

    $data = [
        'name' => 'Módulo x2'
    ];
    // $course->modules()->create($data);

    // $course->modules()->get();
    $modules = $course->modules;

    dd($modules);
});

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
