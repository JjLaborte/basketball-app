<?php
use App\Http\Controllers\PageController;
//use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// The Home Page with the Form
Route::get('/', [PageController::class, 'home'])->name('home');

// The Form Page
Route::get('/form', [PageController::class, 'form'])->name('form');

// Action to handle form submission
Route::post('/generate-plan', [PageController::class, 'generate'])->name('plan.generate');

// The Landing Page for the result
Route::get('/training-plan/{id}', [PageController::class, 'showPlan'])->name('plan.show');