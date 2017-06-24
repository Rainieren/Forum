<?php

Route::get('/', 'ThemesController@index')->name('home');
Route::get('/theme/{theme_id}/topics', 'ThemesController@show')->name('showtheme');


Route::get('/theme/{theme_id}/topics/{topic_id}', 'TopicsController@show')->name('showtopic');

// TODO: Zo maken dat de onderste 5 route alleen beschikbaar zijn voor de admin

Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function() {

    //THEMES
    Route::get('/theme/create', 'ThemesController@create')->name('createtheme');
    Route::post('/theme/create', 'ThemesController@store');
    Route::get('/theme/{theme_id}/edit', 'ThemesController@edit')->name('edittheme');
    Route::patch('/theme/{theme_id}/edit', 'ThemesController@update')->name('updatetheme');


    Route::delete('/theme/{theme_id}/delete', 'ThemesController@destroy')->name('deletetheme');

    //TOPICS

    Route::delete('/theme/{theme_id}/topic/{topic_id}/delete', 'TopicsController@destroy')->name('deletetopic');



});

// TODO: checken of de user die inglogt is gelijk is aan het topic_id. Is dat niet zo. editen niet mogelijk
Route::get('/theme/{theme_id}/topic/{topic_id}/edit', 'TopicsController@edit')->name('edittopic');
Route::patch('/theme/{theme_id}/topic/{topic_id}/edit', 'TopicsController@update')->name('updatetopic');


Route::get('/theme/{theme_id}/topic/create', 'TopicsController@create')->name('createtopic');
Route::post('/theme/{theme_id}/topic/create', 'TopicsController@store')->name('savetopic');


//PROFILE
Route::get('{username}/profile', 'UserController@profile')->name('showprofile');

// TODO: checken of de user die inglogt is gelijk is aan het profiel. Is dat niet zo. Knop edit niet laten zien
Route::post('{username}/profile/update_avatar', 'UserController@update_avatar')->name('updateavatar');
Route::post('{username}/profile/update_banner', 'UserController@update_banner')->name('updatebanner');

Route::get('{username}/profile/edit', 'UserController@edit')->name('editprofile');
Route::patch('{username}/profile/update', 'UserController@update')->name('updateprofile');

//SETTINGS
Route::get('user/settings', 'UserController@settings')->name('showusersettings');

//REPLIES
route::post('/reply/create', 'ReplyController@store')->name('createreply');


// Ik wil forem.dev/theme/1 En dan alle topcis laten zien van die theme. dat is een GET en SHOW method

// Theme veranderen? Route aanmaken met forum.dev/theme/1/edit Nu krijg je een INGEVULD fomulier en die kan je dan bewerken. Dit is een GET en EDIT method,
// Het opslaan van dit gaat met dezelfde route maar met een PATCH & UPDATE method.

// Wil je een theme creeën? Dat kan met forum.dev/theme/create. weer een GET request. Je krijg een formulier en als je klaar bent en je wilt opslaan
// is het een POST request en het opslaan is SAVE.

// Wil je een bepaalde thema kunnen verwijderen? Dan wil ik een url zien voor de gebruiker. forum.dev/theme/1/delete. Dit is een DELETE request.
// oftwel in laravel, DESTROY.


// ALLES IN HET BOVENSTAANDE MOET IN DE THEMECONTROLLER.PHP. ALLEEN DE DINGEN WAT TE MAKEN HEEFT MET EEN THEME.

Route::get('logout', function() {
   Auth::logout();
   return redirect('/');
});

Auth::routes();


