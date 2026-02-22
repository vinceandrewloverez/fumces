<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SystemAdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\RegistrarController;
use App\Http\Controllers\CashierController;


    
    // Public Routes
    Route::get('/', function () { return view('welcome');})->name('welcome');
    Route::get('/admissions', function () { return view('admissions'); });


    // Profile Management
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });
    
   // GET for showing the admissions page
Route::get('/admissions', [AdmissionController::class, 'index'])->name('admissions');

// POST for submitting data
Route::post('/admissions', [AdmissionController::class, 'store'])->name('admissions.store');

    Route::prefix('system-admin')->name('system-admin.')->group(function () {
        Route::get('/', [SystemAdminController::class, 'index'])->name('index');
    
        // Users Management
        Route::get('/users', [SystemAdminController::class, 'users'])->name('users.index'); // list page
        Route::get('/users/create', [SystemAdminController::class, 'create'])->name('users.create'); // new user form
        Route::patch('/users/{id}', [SystemAdminController::class, 'update'])->name('users.update'); // edit/update
        Route::delete('/users/{id}', [SystemAdminController::class, 'destroy'])->name('users.destroy'); // delete
        Route::post('/users', [SystemAdminController::class, 'store'])->name('users.store'); // ADD THIS
    });

    

    // Teacher route
    Route::get('/teacher', [TeacherController::class, 'index'])->name('teacher.index');
    
    // Student route
    Route::get('/student', [StudentController::class, 'index'])->name('student.index');
    
    // Parent route
    Route::get('/parent', [ParentController::class, 'index'])->name('parent.index');
    
    // Registrar route
    Route::get('/registrar', [RegistrarController::class, 'index'])->name('registrar.index');
    
    // Cashier route
    Route::get('/cashier', [CashierController::class, 'index'])->name('cashier.index');




require __DIR__.'/auth.php';