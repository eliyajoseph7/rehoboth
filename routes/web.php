<?php

use App\Http\Controllers\Reports\MonthlyReportController;
use App\Livewire\Pages\Allowance\Allowances;
use App\Livewire\Pages\CostTaken\Taken;
use App\Livewire\Pages\Dashboard\Dashboard;
use App\Livewire\Pages\Expenditure\Expenditures;
use App\Livewire\Pages\Report\MonthlyReport;
use App\Livewire\Pages\Return\Returns;
use App\Livewire\Pages\Setting\Client\Clients;
use App\Livewire\Pages\Setting\PaymentMethod\PaymentMethods;
use App\Livewire\Pages\Setting\Support\ManageSupport;
use App\Livewire\Pages\Support\Supports;
use App\Livewire\Pages\Setting\User\Users;
use Illuminate\Support\Facades\Route;

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
    return redirect('dashboard');
});

Route::get('generate-report', [MonthlyReportController::class, 'generate'])->name('generate_report');

Route::get('dashboard', Dashboard::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
Route::middleware('auth')->group(function () {
    // cost taken
    Route::prefix('cost-taken')->group(function () {
        Route::get('', Taken::class)->name('taken');
    });

    // cost returns
    Route::prefix('returns')->group(function () {
        Route::get('', Returns::class)->name('returns');
    });
    // expenditures
    Route::prefix('expenditures')->group(function () {
        Route::get('', Expenditures::class)->name('expenditures');
    });

    // supports
    Route::prefix('supports')->group(function () {
        Route::get('', Supports::class)->name('supports');
    });

    // allowances
    Route::prefix('staff-allowances')->group(function () {
        Route::get('', Allowances::class)->name('allowances');
    });

    // reports
    Route::prefix('reports')->group(function () {
        Route::get('monthly-report', MonthlyReport::class)->name('monthly_report');
    })->name('reports');

    // settings

    Route::prefix('settings')->group(function () {
        // supports
        Route::prefix('manage-supports')->group(function () {
            Route::get('', ManageSupport::class)->name('manage_supports');
        });

        // clients
        Route::prefix('clients')->group(function () {
            Route::get('', Clients::class)->name('clients');
        });

        // payment_methods
        Route::prefix('payment-methods')->group(function () {
            Route::get('', PaymentMethods::class)->name('payment_methods');
        });

        // staffs
        Route::prefix('staffs')->group(function () {
            Route::get('', Users::class)->name('staffs');
        });
    });
});

require __DIR__ . '/auth.php';
