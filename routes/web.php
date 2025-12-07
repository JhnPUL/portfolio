<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\CertificateController;

/*
|--------------------------------------------------------------------------
| Public portfolio (acts as owner "Home")
|--------------------------------------------------------------------------
*/
Route::get('/', [PortfolioController::class, 'index'])->name('portfolio');

/*
|--------------------------------------------------------------------------
| Generic authenticated dashboard (not owner-specific)
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Profile routes (edit name/email/phone, delete account)
| These are used for the "Profile" item under the owner navigation.
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');      // Profile page
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update'); // Save profile changes
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); // Delete account
});

/*
|--------------------------------------------------------------------------
| Projects CRUD (if you use it elsewhere)
|--------------------------------------------------------------------------
*/
Route::resource('projects', PortfolioController::class)->names('projects');

/*
|--------------------------------------------------------------------------
| Contact form (public) with rate limiting
|--------------------------------------------------------------------------
*/
Route::post('/contact', [PortfolioController::class, 'contact'])
    ->middleware('throttle:5,1')
    ->name('contact');

/*
|--------------------------------------------------------------------------
| Owner area (only accessible to owner users)
| - Owner Home: public portfolio route ('portfolio')
| - Owner Dashboard: /owner/dashboard
| - Owner Profile: /profile (profile.edit) from block above
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'is.owner'])
    ->prefix('owner')
    ->name('owner.')
    ->group(function () {
        // Owner dashboard page
        Route::get('/dashboard', [PortfolioController::class, 'owner'])
            ->name('dashboard');

        // Certificate CRUD routes for owner
        Route::resource('certificates', CertificateController::class);
    });

require __DIR__ . '/auth.php';
