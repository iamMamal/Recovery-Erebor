<?php

namespace App\Livewire\Dashboard;

use App\Models\Account;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AddTransaction extends Component
{


    public $accounts;
    public $categories;

    //برای فرم
    public $balance ='';
    public $careerDate , $bankChose,$categoryChose ,$description;

    protected $rules = [
        'balance' => 'required|numeric|min:0',
        'categoryChose' => 'required',
        'bankChose' => 'required',
        'careerDate' => 'required',
    ];

    public function mount()
    {
        // گرفتن حساب‌ها
        $this->accounts = Account::where('user_id', Auth::id())->get();

        // فقط دسته‌هایی که type = 1 هستن
        $this->categories = Category::where('type', 1)->get();

    }



    public function save()
    {
         $time = date('Y-m-d H:i:s', $this->careerDate);
        $this->validate();
        DB::transaction(function () use ($time) {
            $transaction = Transaction::create([
                'user_id' => auth()->id(),
                'account_id' => $this->bankChose,
                'amount' => $this->balance,
                'category_id' => $this->categoryChose,
                'transaction_date' => $time,
                'description' => $this->description,
            ]);

            $account = Account::find($this->bankChose);
            $account->balance += $this->balance; // یا -= برای برداشت
            $account->save();
        });

        session()->flash('success', 'تراکنش با موفقیت ثبت شد ✅');

        return redirect('/dashboard/transactions');
    }

    public function render()
    {
        return view('livewire.dashboard.add-transaction')->layout('components.layouts.admin');
    }
}
