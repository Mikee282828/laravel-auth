<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController; //<---- Import del controller precedentemente creato!
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TypeController;
use App\Models\Project;
use App\Models\Lead;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $data = [
        'projects' => Project::all()
    ];
    return view('welcome', $data);
});

Route::middleware(['auth'])
    ->prefix('admin') //definisce il prefisso "admin/" per le rotte di questo gruppo
    ->name('admin.') //definisce il pattern con cui generare i nomi delle rotte cioè "admin.qualcosa"
    ->group(function () {

        //Siamo nel gruppo quindi:
        // - il percorso "/" diventa "admin/"
        // - il nome della rotta ->name("dashboard") diventa ->name("admin.dashboard")
        Route::resource('/projects', ProjectController::class);
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('/types', TypeController::class);
    });

Route::get('/mailable', function () {
    // $lead = ['name' => 'Michele', 'email'=>'michele@example.com', 'message' => 'lorem ipsum dolor'];
    $lead = Lead::first();
    return new App\Mail\NewLeadMarkdownMessage($lead);
});
require __DIR__ . '/auth.php';
