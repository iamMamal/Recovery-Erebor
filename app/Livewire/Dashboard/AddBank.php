<?php

namespace App\Livewire\Dashboard;

use App\Models\Account;
use Livewire\Component;

class AddBank extends Component
{
    public $title = "";
    public $balance ='';

    protected $rules = [
        'title' => 'required|string|min:2|max:255',
        'balance' => 'required|numeric|min:0',
    ];

    public function save()
    {
        $this->validate();
            Account::create([
                'user_id' => auth()->id(),
                'title' => $this->title,
                'balance' => $this->balance,
            ]);
        session()->flash('success', 'حساب با موفقیت ثبت شد ✅');

        return redirect('/dashboard/bank-manager');
    }

    public function render()
    {

        return view('livewire.dashboard.add-bank')->layout('components.layouts.admin');
    }
}
