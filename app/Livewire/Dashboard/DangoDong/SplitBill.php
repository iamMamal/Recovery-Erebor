<?php

namespace App\Livewire\Dashboard\DangoDong;

use Livewire\Component;

class SplitBill extends Component
{
    public $users = [];
    public $newUser = '';

    public $sharedExpenses = [];
    public $personalExpenses = [];

    public $sharedUser = '';
    public $sharedAmount = '';
    public $sharedDesc = '';

    public $personalUser = '';
    public $personalAmount = '';
    public $personalDesc = '';
    public $personalSharedExpense = '';

    public $finalDebts = [];

    public function addUser()
    {
        if (!empty($this->newUser) && !in_array($this->newUser, $this->users)) {
            $this->users[] = $this->newUser;
            $this->newUser = '';
        }
    }

    public function addSharedExpense()
    {
        if ($this->sharedUser && $this->sharedAmount > 0) {
            $this->sharedExpenses[] = [
                'user' => $this->sharedUser,
                'amount' => $this->sharedAmount,
                'remaining' => $this->sharedAmount, // برای خرج شخصی
                'description' => $this->sharedDesc
            ];
            $this->reset(['sharedUser', 'sharedAmount', 'sharedDesc']);
        }
    }

    public function addPersonalExpense()
    {
        if ($this->personalUser && $this->personalAmount > 0 && $this->personalSharedExpense !== '') {
            $index = $this->personalSharedExpense;
            $amount = min($this->personalAmount, $this->sharedExpenses[$index]['remaining']);

            $this->personalExpenses[] = [
                'user' => $this->personalUser,
                'amount' => $amount,
                'description' => $this->personalDesc,
                'sharedExpenseIndex' => $index
            ];

            // کم کردن از باقی‌مانده خرج مشترک
            $this->sharedExpenses[$index]['remaining'] -= $amount;
            $this->sharedExpenses[$index]['amount'] -= $amount;

            $this->reset(['personalUser', 'personalAmount', 'personalDesc', 'personalSharedExpense']);
        }
    }

    public function calculate()
    {
        // 1. ایجاد آرایه بالانس برای هر کاربر
        $balances = array_fill_keys($this->users, 0);

        // 2. خرج مشترک: سهم هر کاربر از خرج مشترک کم می‌شود، صاحب خرج اضافه می‌شود
        foreach ($this->sharedExpenses as $shared) {
            $sharedPerUser = $shared['amount'] / count($this->users);
            foreach ($this->users as $user) {
                $balances[$user] -= $sharedPerUser;
            }
            $balances[$shared['user']] += $shared['amount'];
        }

        // 3. خرج شخصی: فقط از پرداخت‌کننده به صاحب خرج مرتبط اضافه می‌شود
        foreach ($this->personalExpenses as $personal) {
            $index = $personal['sharedExpenseIndex'];
            $payer = $personal['user'];
            $owner = $this->sharedExpenses[$index]['user'];

            $balances[$payer] -= $personal['amount'];
            $balances[$owner] += $personal['amount'];
        }

        // 4. تبدیل به متن برای نمایش
        $debts = [];
        foreach ($balances as $user => $balance) {
            if ($balance > 0) {
                $debts[] = "$user طلبکار $balance 💰";
            } elseif ($balance < 0) {
                $debts[] = "$user بدهکار " . abs($balance) . " 💸";
            } else {
                $debts[] = "$user تسویه 👌";
            }
        }

        $this->finalDebts = $debts;
    }

    public function render()
    {
        return view('livewire.dashboard.dango-dong.split-bill')->layout('components.layouts.admin');
    }
}
