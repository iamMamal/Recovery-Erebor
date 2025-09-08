<?php

namespace App\Livewire\Dashboard;

use App\Models\Account;
use App\Models\Category;
use App\Models\Transaction;
use Livewire\Component;
use Morilog\Jalali\Jalalian;

class TransactionManager extends Component
{

    public $accounts;
    public $totalDeposits;
    public $totalBardasht;
    public $accountsCount;
    public $countBardasht;
    public $lastDeposit;
    public $lastBardasht;
    public $lastTransactions;


    public $chartLabels = [];
    public $chartData = [];
    public $labels2 = [];
    public $data2 = [];

    public function mount()
    {
        $startOfMonth = Jalalian::now()->getFirstDayOfMonth()->toCarbon();
        $endOfMonth = Jalalian::now()->getEndDayOfMonth()->toCarbon();

        //all varizi
        $this->totalDeposits = \App\Models\Transaction::whereBetween('transaction_date', [$startOfMonth, $endOfMonth])
            ->whereHas('category', function ($query) {
                $query->where('type', 1);
            })
            ->whereHas('account', function ($query) {
                $query->where('user_id', auth()->id());
            })
            ->sum('amount');

        $this->accountsCount = Account::where('user_id', auth()->id())->count();


        //all bardasht
        $bardashtStats = \App\Models\Transaction::whereBetween('transaction_date', [$startOfMonth, $endOfMonth])
            ->whereHas('category', function ($query) {
                $query->where('type', 0);
            })
            ->whereHas('account', function ($query) {
                $query->where('user_id', auth()->id());
            })
            ->selectRaw('SUM(amount) as total, COUNT(*) as count')
            ->first();

        $this->totalBardasht = $bardashtStats->total;
        $this->countBardasht = $bardashtStats->count;


        //last 20 tarakonesh
        $this->lastTransactions = Transaction::with(['account', 'category'])
            ->whereHas('account', function ($query) {
                $query->where('user_id', auth()->id());
            })
            ->orderBy('transaction_date', 'desc')
            ->take(20)
            ->get();


        //last varizi
        $this->lastDeposit = \App\Models\Transaction::whereHas('category', function ($query) {
            $query->where('type', 1);
        })
            ->whereHas('account', function ($query) {
                $query->where('user_id', auth()->id());
            })
            ->latest('transaction_date')
            ->with('account') // برای گرفتن اطلاعات حساب
            ->first();

        //last bardasht
        $this->lastBardasht = \App\Models\Transaction::whereHas('category', function ($query) {
            $query->where('type', 0);
        })
            ->whereHas('account', function ($query) {
                $query->where('user_id', auth()->id());
            })
            ->latest('transaction_date')
            ->with('account') // برای گرفتن اطلاعات حساب
            ->first();


        $this->accounts = Account::where('user_id', auth()->id())->get();
        if ($this->accounts->isEmpty()) {
            session()->flash('error', 'شما هنوز هیچ حساب بانکی ثبت نکرده‌اید. برای دسترسی به این صفحه ابتدا یک حساب بسازید');
            return redirect('/dashboard/bank-manager');
        }


// chart 1 گرفتن دسته‌های برداشت
        $userId = auth()->id();

        $categories = Category::where('type', 0)
            ->whereHas('transactions', function ($q) use ($userId, $startOfMonth, $endOfMonth) {
                $q->where('user_id', $userId)
                    ->whereBetween('transaction_date', [$startOfMonth, $endOfMonth]);
            })
            ->with(['transactions' => function ($q) use ($userId, $startOfMonth, $endOfMonth) {
                $q->where('user_id', $userId)
                    ->whereBetween('transaction_date', [$startOfMonth, $endOfMonth]);
            }])
            ->get();


        foreach ($categories as $category) {
            $total = $category->transactions->sum('amount');
            if ($total > 0) {
                $this->chartLabels[] = $category->name;
                $this->chartData[] = $total;
            }

        }


        //chart 2
        $lastExpenses = Transaction::where('category_id', '>', 8)
            ->where('user_id', auth()->id())
            ->orderBy('transaction_date', 'desc')
            ->take(10)
            ->get()
            ->reverse();

        foreach ($lastExpenses as $category) {

                $this->labels2[] = $category->category->name;
                $this->data2[] = $category->amount;


        }


    }




    public function render()
    {
        return view('livewire.dashboard.transaction-manager')->layout('components.layouts.admin');
    }
}
