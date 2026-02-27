<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SystemAdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\RegistrarController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\Student\TuitionController as StudentTuitionController;
use App\Http\Controllers\Student\DocumentController as StudentDocumentController;
use App\Http\Controllers\Registrar\EnrollmentController as RegistrarEnrollmentController;
use App\Http\Controllers\Registrar\DocumentController as RegistrarDocumentController;





// Public Routes
Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::get('/admissions', function () {
    return view('admissions');
});
Route::get('/education', function () {
    return view('education');
});
Route::get('/contact', function () {
    return view('contact');
});


// Profile Management
Route::controller(ProfileController::class)->group(function () {
    Route::get('/profile', 'edit')->name('profile.edit');
    Route::patch('/profile', 'update')->name('profile.update');
    Route::delete('/profile', 'destroy')->name('profile.destroy');
});



// GET for showing the admissions page
Route::get('/admissions', [AdmissionController::class, 'index'])->name('admissions');
Route::get('/admissions', [AdmissionController::class, 'index']);
Route::post('/admissions', [AdmissionController::class, 'store']);
Route::put('/admissions/update-files', [AdmissionController::class, 'updateFiles'])->name('admissions.update_files');Route::get('/admissions/form', [AdmissionController::class, 'form'])->name('admissions.form');
Route::post('/admissions/{id}/approve', [AdmissionController::class, 'approve'])->name('admissions.approve');
Route::post('/admissions/{id}/reject', [AdmissionController::class, 'reject'])->name('admissions.reject');
Route::get('/admissions/{id}', [AdmissionController::class, 'show'])->name('admissions.show');


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
Route::get('/student/tuitions', [StudentTuitionController::class, 'index'])->name('student.tuitions.index');
Route::get('/student/documents', [StudentDocumentController::class, 'index'])->name('student.documents.index');
Route::put('/student/documents/{id}', [StudentDocumentController::class, 'update'])->name('student.documents.update');



// Parent route
Route::get('/parent', [ParentController::class, 'index'])->name('parent.index');

// Registrar route
Route::get('/registrar', [RegistrarController::class, 'index'])->name('registrar.index');
Route::get('/registrar/enrollment', [RegistrarEnrollmentController::class, 'index'])->name('registrar.enrollment.index');
Route::get('/registrar/sections/', [RegistrarController::class, 'index'])->name('registrar.sections.index');
Route::get('/registrar/grades/', [RegistrarController::class, 'index'])->name('registrar.grades.index');
Route::get('/registrar/documents/', [RegistrarDocumentController::class, 'index'])->name('registrar.documents.index');
Route::get('/registrar/reports/', [RegistrarController::class, 'index'])->name('registrar.reports.index');
Route::post('/registar/documents/approve', [RegistrarDocumentController::class, 'approve'])->name('registrar.documents.approve');



// Cashier route
Route::get('/cashier', [CashierController::class, 'index'])->name('cashier.index');




require __DIR__ . '/auth.php';
