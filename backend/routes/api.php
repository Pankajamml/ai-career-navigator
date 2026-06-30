<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResumeController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/resume/upload', [ResumeController::class, 'upload']);
Route::get('/resume/{id}', [ResumeController::class, 'show']);
Route::post('/resume/{id}/analyze', [ResumeController::class, 'analyze']);