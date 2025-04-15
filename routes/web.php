<?php

use App\Http\Controllers\AppointmentController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\User;
use App\Http\Controllers\RepairController;
use App\Models\Repair;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Auth;
use function Laravel\Prompts\error;
use function Pest\Laravel\delete;

// Accueil 

Route::get('/', function () {
    return Inertia::render('Accueil', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'users' => User::all(['id', 'name', 'email', 'adresse', 'phone_number'])
    ]);
})->name('accueil');

// Liste réparations

Route::get('/repair', function () {
    return Inertia::render('Repair', [
        'repair' => Repair::all(['id', 'repair_type', 'price'])
    ]);
})->name('repair');


Route::get('/showrepair/{repair_type}', [RepairController::class, 'show'])
    ->middleware('auth');

Route::post('/appointment_check', [AppointmentController::class, 'store'])->middleware('auth');
Route::delete('/appointment_delete/{id}', [AppointmentController::class, 'deleteRdv'])->middleware('auth');

// Afficher réparation
// Créer une réparation, 
// Edit une réparation, 
// Supprimeer une répration 
// (admin)

Route::get('/create', function () {
    return Inertia::render('Admin/CreateRepair', [
        'repair' => Repair::all(['id', 'repair_type', 'price'])
    ]);
})->middleware([IsAdmin::class]);
Route::post('/create', [RepairController::class, 'store'])->middleware([IsAdmin::class]);;
Route::get('/create/edit/{id}', function ($id) {
    $repair = Repair::findOrFail($id);
    return Inertia::render('Admin/EditRepair', [
        'repair' => $repair
    ]);
})->middleware([IsAdmin::class]);;
Route::put('/create/update/{id}', [RepairController::class, 'update'])->middleware([IsAdmin::class]);;
Route::delete('create/delete/{id}', [RepairController::class, 'destroy'])->middleware([IsAdmin::class]);;


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
