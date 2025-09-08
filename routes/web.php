<?php

use App\Http\Middleware\AdminOnly;
use App\Http\Middleware\CheckModelOwnership;
use App\Livewire\Actions\Logout;
use App\Livewire\Dashboard\AddBank;
use App\Livewire\Dashboard\AddTransaction;
use App\Livewire\Dashboard\Ai\Elibot;
use App\Livewire\Dashboard\BankManager;
use App\Livewire\Dashboard\BardashtTransaction;
use App\Livewire\Dashboard\DangoDong\SplitBill;
use App\Livewire\Dashboard\Debt\AddDebt;
use App\Livewire\Dashboard\Debt\AddInstallment;
use App\Livewire\Dashboard\Debt\DebtManager;
use App\Livewire\Dashboard\Debt\ShowInstallments;
use App\Livewire\Dashboard\EditBank;
use App\Livewire\Dashboard\EditTransaction;
use App\Livewire\Dashboard\Saving\AddGoal;
use App\Livewire\Dashboard\Saving\AddSavingTransaction;
use App\Livewire\Dashboard\Saving\EditSavingTransaction;
use App\Livewire\Dashboard\Saving\SavingManager;
use App\Livewire\Dashboard\Setting\UpdateInfo;
use App\Livewire\Dashboard\ShowTransactionBank;
use App\Livewire\Dashboard\TransactionManager;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Livewire\Dashboard\Home;

Route::view('/', 'welcome')->name('welcome');
Route::post('/logout', Logout::class)->name('logout');

Route::view('/offline', 'offline');


//Route::view('dashboard', 'dashboard')
//    ->middleware(['auth', 'verified'])
//    ->name('dashboard');
//
//Route::view('profile', 'profile')
//    ->middleware(['auth'])
//    ->name('profile');

require __DIR__.'/auth.php';



Route::middleware(['auth',CheckModelOwnership::class])->group(function () {
    Route::get('/dashboard', Home::class)->name('dashboard');
    Route::post('/logout', Logout::class)->name('logout');

    //bank manager
    Route::get('/dashboard/bank-manager', BankManager::class)->name('dashboard.bank-manager');
    Route::get('/dashboard/add-bank', AddBank::class)->name('dashboard.add-bank');
    Route::get('/dashboard/edit-bank/{id}', EditBank::class)->name('dashboard.edit-bank');
    Route::get('/dashboard/show-transaction-bank/{id}', ShowTransactionBank::class)->name('dashboard.show-transaction-bank');

    //transaction
    Route::get('/dashboard/transactions', TransactionManager::class)
        ->name('dashboard.transactions');
    Route::get('/dashboard/add-transaction', AddTransaction::class)
        ->name('dashboard.add-transaction');
    Route::get('/dashboard/bardasht-transaction', BardashtTransaction::class)
        ->name('dashboard.bardasht-transaction');
    Route::get('/dashboard/edit-transaction/{id}', EditTransaction::class)->name('dashboard.edit-transaction');


    //saving manager
    Route::get('/dashboard/saving-manager', SavingManager::class)->name('dashboard.saving-manager');
    Route::get('/dashboard/add-goal', AddGoal::class)->name('dashboard.add-goal');
    Route::get('/dashboard/add-saving-transaction', AddSavingTransaction::class)->name('dashboard.add-saving-transaction');
    Route::get('/dashboard/edit-saving-transaction/{id}', EditSavingTransaction::class)->name('dashboard.edit-saving-transaction');

    //debt and InstallmentManager manager
    Route::get('/dashboard/debt-manager', DebtManager::class)->name('dashboard.debt-manager');
    Route::get('/dashboard/add-debt', AddDebt::class)->name('dashboard.add-debt');
    Route::get('/dashboard/add-installment', AddInstallment::class)->name('dashboard.add-installment');
    Route::get('/dashboard/show-installment/{id}', ShowInstallments::class)->name('dashboard.show-installment');

    //Elibot-ai
    Route::get('/dashboard/elibot', Elibot::class)->name('dashboard.elibot');

    //dango dong
    Route::get('/dashboard/dangodong', SplitBill::class)->name('dashboard.dangodong');


    //update info
    Route::get('/dashboard/update', UpdateInfo::class)->name('dashboard.update');

    //update info
    Route::get('/dashboard/show-users', \App\Livewire\Dashboard\Admin\ShowAllUser::class)->name('dashboard.show-users')->middleware(AdminOnly::class);

});
