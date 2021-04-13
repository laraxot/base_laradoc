<?php

if (! defined('DEFAULT_VERSION')) {
    define('DEFAULT_VERSION', '8.x');
}

if (! defined('SHOW_VAPOR')) {
    define('SHOW_VAPOR', 1 === random_int(1, 2));
}
Route::prefix('{lang}')->group(function () {
    Route::get('docs', 'DocsController@showRootPage')->name('docs.index');

    Route::get('docs/6.0/{page?}', function ($page = null) {
        $page = $page ?: 'installation';
        $page = '8.x' == $page ? 'installation' : $page;

        return redirect(trim('/docs/8.x/'.$page, '/'), 301);
    });

    Route::get('docs/{version}/{page?}', 'DocsController@show')
        ->name('docs.version');

    Route::get('partners', 'PartnersController@index');
    Route::get('partner/{partner}', 'PartnersController@show');
});

Route::get('/', function () {
    return view('marketing');
});