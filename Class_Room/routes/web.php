<?php

use App\Http\Controllers\AssignmentsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\MessageController;
use App\Http\Middleware\CheckLoginMiddleware;
use App\Http\Middleware\CheckTeacherMiddleware;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// login
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'Logingin'])->name('Logingin');

Route::group([
    'middleware' => CheckLoginMiddleware::class
], function(){
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    // data    
    Route::get('/', [DataController::class, 'index'])->name('data.index');    
    Route::get('data/edit/{data}', [DataController::class, 'edit'])->name('data.edit');
    Route::put('data/Supdate/{data}', [DataController::class, 'Studentupdate'])->name('data.Studentupdate');
    Route::get('data/detail/{data}', [DataController::class, 'detail'])->name('data.detail');

    Route::group([
        'middleware' => CheckTeacherMiddleware::class
    ], function(){ 
        Route::put('data/Tupdate/{data}', [DataController::class, 'Teacherupdate'])->name('data.Teacherupdate');        
        Route::get('data/create', [DataController::class, 'create'])->name('data.create');
        Route::post('data/create', [DataController::class, 'store'])->name('data.store');
        Route::delete('data/destroy/{data}', [DataController::class, 'destroy'])->name('data.destroy');
    });
    
    //  message
    Route::get('message/', [MessageController::class, 'message'])->name('message.index');
    Route::post('message/send', [MessageController::class, 'store'])->name('message.send');
    Route::delete('message/destroy/{message}', [MessageController::class, 'destroy'])->name('message.destroy');
    Route::get('message/detail/{message}', [MessageController::class, 'detail'])->name('message.detail');



    // assignment    
    Route::get('assignments/', [AssignmentsController::class, 'assignment'])->name('assignments.index');

    Route::group([
        'middleware' => CheckTeacherMiddleware::class
    ], function(){
        Route::get('assignments/create', [AssignmentsController::class, 'create'])->name('assignments.create');
        Route::post('assignments/create', [AssignmentsController::class, 'store'])->name('assignments.store');
        Route::delete('assignments/destroy/{assignment}', [AssignmentsController::class, 'destroy'])->name('assignments.destroy');
        Route::put('assignments/update/{assignment}', [AssignmentsController::class, 'update'])->name('assignments.update');
        Route::get('assignments/edit/{assignment}', [AssignmentsController::class, 'edit'])->name('assignments.edit');
        Route::post('assignments/teacher_detail/', [AssignmentsController::class, 'Teacherdetail'])->name('assignments.Teacherdetail');
    });
    Route::post('assignments/store/{assignment}', [AssignmentsController::class, 'submitStore'])->name('assignmentSubmit.store');
    Route::delete('assignments/destroySub/{assignmentSub}', [AssignmentsController::class, 'destroySub'])->name('assignments.destroySub');
    Route::post('assignment/student_detail/{assignment}', [AssignmentsController::class, 'Studentdetail'])->name('assignments.Studentdetail');
    Route::get('assignments/download/{filename}', [AssignmentsController::class, 'downloadFile'])->name("assignments.downloadFile");


    // chal([lenge
    Route::group([
        'middleware' => CheckTeacherMiddleware::class
    ], function(){
        Route::get('challenge/create', [ChallengeController::class, 'create'])->name('challenge.create');
        Route::post('challenge/create', [ChallengeController::class, 'store'])->name('challenge.store');
        Route::delete('challenge/destroy/{challenge}', [ChallengeController::class, 'destroy'])->name('challenge.destroy');  
        
    });

    Route::get('challenge/', [ChallengeController::class, 'challenge'])->name('challenge.index');
    Route::post('challenge/detail/{challenge}', [ChallengeController::class, 'detail'])->name('challenge.detail');
    Route::post('challenge/hint/{challenge}', [ChallengeController::class, 'hint'])->name('challenge.hint');
    Route::post('challenge/submit/{challenge}', [ChallengeController::class, 'submit'])->name('challenge.submit');


});


`