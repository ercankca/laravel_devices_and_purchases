<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// routes/api.php

Route::middleware('store.device')->get('/test', function (Request $request) {

    return response()->json(
        $request->all()
    );
})->name("store.device");
