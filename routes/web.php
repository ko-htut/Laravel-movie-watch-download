<?php
Route::get('/', 'Show\DefaultPagesController@welcome');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contact', 'Show\DefaultPagesController@contact');
Route::get('/dmca', 'Show\DefaultPagesController@dmca');
Route::get('/privacy', 'Show\DefaultPagesController@privacy');

Route::resource('/genres', 'Show\GenresController')->only('show');
Route::resource('/movies', 'Show\MoviesController')->only('index', 'show');
Route::resource('/series', 'Show\SeriesController')->only('index', 'show');
Route::get('/series/{slug}/seasons/{season_nr}', 'Show\SeasonsController@show')->name('seasons.show');
Route::resource('/episodes', 'Show\EpisodesController')->only('show');
Route::get('/search', 'Show\SearchController@index');
Route::post('/search', 'Show\SearchController@index');

Route::group([
    'middleware' => 'admin',
    'prefix' => 'admin'
], function () {
    Route::get('/', 'Admin\MovieController@admin');
    Route::resource('genre', 'Admin\GenreController');
    Route::resource('movie', 'Admin\MovieController');
    Route::resource('serie', 'Admin\SerieController');
    Route::resource('serie/{serie}/season', 'Admin\SeasonController');
    Route::resource('serie/{serie}/season/{season}/episode', 'Admin\EpisodeController');
    Route::post('movie/{id}/embeds', 'Admin\MovieController@addEmbed');
    Route::post('movie/{id}/watchlink', 'Admin\MovieController@addWatchlink');
    Route::post('movie/{id}/downloadlink', 'Admin\MovieController@addDownloadlink');
    Route::post('movie/{id}/trailerlink', 'Admin\MovieController@addTrailerlink');
    Route::post('serie/{serie}/season/{season}/episode/{id}/embed', 'Admin\EpisodeController@addEmbed');
    Route::post('serie/{serie}/season/{season}/episode/{id}/watchlink', 'Admin\EpisodeController@addWatchlink');
    Route::post('serie/{serie}/season/{season}/episode/{id}/downloadlink', 'Admin\EpisodeController@addDownloadlink');
    Route::post('serie/{serie}/season/{season}/episode/{id}/trailerlink', 'Admin\EpisodeController@addTrailerlink');
});
Route::delete('/embed/{id}', 'Admin\EmbedController@destroy');
Route::delete('/watchlink/{id}', 'Admin\WatchlinkController@destroy');
Route::delete('/downloadlink/{id}', 'Admin\DownloadlinkController@destroy');
Route::delete('/trailerlink/{id}', 'Admin\TrailerlinkController@destroy');
