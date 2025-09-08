<?php

namespace App\Livewire\Dashboard;

use App\Models\Account;
use Livewire\Component;

class EditBank extends Component
{
    public $accountId;
    public $title;
    public $balance;
    public $bank_id;

    public function mount($id)
    {
        $this->accountId = $id;
        $account = Account::where('user_id', auth()->id())->findOrFail($id);

        $this->title = $account->title;
        $this->balance = $account->balance;


    }

    public function update()
    {
        $this->validate([
            'title' => 'required|string|min:2|max:255',
        ]);

        Account::where('user_id', auth()->id())
            ->findOrFail($this->accountId)
            ->update([
                'title' => $this->title,
            ]);

        session()->flash('success', 'حساب با موفقیت ویرایش شد');
        return redirect('/dashboard/bank-manager');
    }

}
