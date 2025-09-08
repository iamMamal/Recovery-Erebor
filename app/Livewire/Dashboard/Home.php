<?php

namespace App\Livewire\Dashboard;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Morilog\Jalali\Jalalian;

class Home extends Component
{

    public $user = [];
    public  $totalBalance = 0;
    public  $highest = 0;
    public $totalDeposits , $totalBardasht;


    public function mount()
    {
        $this->user = User::find(auth()->id());
        $this->totalBalance = auth()->user()->accounts()->sum('balance');
        $this->highest = DB::table('accounts')->where('user_id', auth()->id())->orderBy('balance', 'desc')->first();

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

//bardasht mah
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
    }

    public function render()
    {

        return view('livewire.dashboard.home')->layout('components.layouts.admin');
    }
}
