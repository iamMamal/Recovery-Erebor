<?php

namespace App\Livewire\Dashboard\Debt;

use App\Models\Debt;
use App\Models\Installment;
use App\Models\User;
use Livewire\Component;

class DebtManager extends Component
{

    public $user ,$installmentsCount,$totalUnpaidDebt ,$titleClaim,$amountClaim,$upcomingDebtInstallments ,$upcomingClaimInstallments;
    public $allDebts;
    public $search = '';
    public $searchDebts;

    public $debt;

    public $status = [];
    public $nextInstallments;
    public $delete_id;
    protected $listeners = ['deleteConfirmed'=>'deleteAccount'];



    public function mount()
    {

        $this->user = auth()->user();
        $this->installmentsCount = $this->user->installments()->count();
        $this->totalUnpaidDebt = Installment::where('is_paid', false) // فقط اقساط پرداخت‌نشده
        ->whereHas('debt', function($q) {
            $q->where('user_id', auth()->id()) // فقط اقساط مربوط به کاربر
            ->where('type', 0);             // فقط بدهی‌ها
        })->sum('amount');

        $largestActiveClaim = Debt::where('user_id', auth()->id())
            ->where('type', 1)          // 1 = طلب
            ->where('is_settled', false) // هنوز تسویه نشده
            ->orderByDesc('total_amount') // مرتب‌سازی نزولی بر اساس مبلغ کل
            ->first();


        if ($largestActiveClaim) {
            $this->titleClaim = $largestActiveClaim->title;       // عنوان طلب
            $this->amountClaim = $largestActiveClaim->total_amount; // مبلغ کل طلب
        }


        $this->loadDebts();

       $debts= Debt::where('user_id', auth()->id())->get();

        foreach ($debts as $debt) {
            $this->status[$debt->id] = $debt->is_settled ? 1 : 0;
        }

    }

//    10 ghest karbar
    public function latestInstallments()
    {
        $today = now(); // تاریخ امروز

        // گرفتن 10 قسط آینده برای کاربر لاگین شده
        $this->nextInstallments = Installment::whereHas('debt', function($query) {
            $query->where('user_id', auth()->id());
        })
            ->where('due_date', '>=', $today)
            ->orderBy('due_date', 'asc')
            ->with(['debt']) // relation با debt رو preload می‌کنیم
            ->take(10)
            ->get();
    }
    public function deleteConfirmation($id)
    {

        $this->delete_id = $id;
        $this->dispatch('show-delete-confirmation');
    }

    public function deleteAccount()
    {
        $account= Debt::where('id',$this->delete_id)->first();
        $account->delete();
        $this->loadDebts();
        $this->dispatch('studentDeleted');
    }

    public function loadDebts() {

        $this->ghest();
        $this->talab();
        $this->allDebts();
        $this->debtsWithEdit();
        $this->latestInstallments();
    }
    public function updateStatus($debtId)
    {
        $debt = Debt::find($debtId);
        if ($debt) {
            $debt->is_settled = (bool)$this->status[$debtId];
            $debt->save();

        }
        $this->loadDebts();

    }



    public function allDebts()
    {
        $this->allDebts = Debt::where('user_id', auth()->id())
            ->where('is_settled', false) // هنوز تسویه نشده
            ->orderBy('start_date', 'asc')
            ->get();

    }

    public function ghest()
    {
        $this->upcomingDebtInstallments = Installment::whereHas('debt', function($q) {
            $q->where('user_id', auth()->id())
                ->where('type', 0); // فقط بدهی‌ها
        })
            ->where('due_date', '>=', now())
            ->orderBy('due_date', 'asc')
            ->take(10)
            ->get();
    }

    public function updatedSearch()
    {
        $this->loadDebts();
    }

    public function debtsWithEdit()
    {
        if ($this->search) {
            $this->searchDebts = Debt::withCount([
                'installments as paid_installments_count' => function ($query) {
                    $query->where('is_paid', true);
                }
            ])
                ->withCount('installments')
                ->when($this->search, function ($query) {
                    $query->where('title', 'like', '%'.$this->search.'%');
                })
                ->get();
        }
        else{
            $this->searchDebts = Debt::withCount([
                'installments as paid_installments_count' => function ($query) {
                    $query->where('is_paid', true);
                }
            ])
                ->withCount('installments')

                ->get();
        }
//        dd($this->searchDebts);
}
    public function talab()
    {
        $this->upcomingClaimInstallments = Installment::whereHas('debt', function($q) {
            $q->where('user_id', auth()->id())
                ->where('type', 1); // فقط طلب‌ها
        })
            ->where('due_date', '>=', now())
            ->orderBy('due_date', 'asc')
            ->take(10)
            ->get();
    }

    public function render()
    {

        return view('livewire.dashboard.debt.debt-manager')->layout('components.layouts.admin');
    }
}
