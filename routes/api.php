<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\WelcomeController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get("/", [WelcomeController::class, "index"]);

Route::get('/send/email/{email}', [WelcomeController::class, "sampleEmail"]);


Route::get("about", function(){
    return response("hey");
});
