<?php

use App\Http\Controllers\Taic\ActivityController;
use App\Http\Controllers\Taic\ConferenceController;
use App\Http\Controllers\Taic\DayController;
use App\Http\Controllers\Taic\SiteController;
use App\Http\Controllers\Taic\SpeakerController;
use App\Http\Controllers\Taic\TimetableController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/auth/user', function (Request $request) {return $request->user();});
Route::get('/test', function(){ return 'Hi this is Test Route';});
Route::get('/site-data', [SiteController::class , 'fetchSiteData']);
Route::middleware(['auth:sanctum'])->group(function(){

    //Conferences ------------
    Route::get('/taic-conferences', [ConferenceController::class,'index']);
    Route::get('/conference-data/{uuid}', [ConferenceController::class,'getConferenceData']);
    Route::get('/conference/activate/{uuid}', [ConferenceController::class,'conferenceActiveate']);
    Route::post('/create-conference-data', [ConferenceController::class,'create']);
    Route::post('/update-conference-data', [ConferenceController::class,'update']);
    // Speakers --------------
    Route::get('/conference-speakers', [SpeakerController::class,'index']);
    Route::post('/create-conference-speaker', [SpeakerController::class,'create']);
    Route::post('/update-conference-speaker', [SpeakerController::class,'update']);
    Route::get('/honorable-speaker/activate/{uuid}', [SpeakerController::class,'activateHonourable']);
    //Conference Schedules ---------
    Route::get('/conference-schedules', [DayController::class,'schedules']);
    Route::post('/create-conference-day', [DayController::class,'create']);
    Route::post('/create-conference-timetable', [TimetableController::class,'create']);
    Route::post('/update-conference-day', [DayController::class,'update']);
    Route::post('/update-conference-timetable', [TimetableController::class,'update']);
    Route::post('/update-conference-activity', [ActivityController::class,'update']);
    // Route::get('/honorable-speaker/activate/{uuid}', [SpeakerController::class,'activateHonourable']);
});
Route::post('/create-conference-activity', [ActivityController::class,'create']);
