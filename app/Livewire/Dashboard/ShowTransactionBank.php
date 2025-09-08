<?php

namespace App\Livewire\Dashboard;

use App\Models\Account;
use App\Models\Category;
use App\Models\Transaction;
use Livewire\Component;
use Livewire\WithPagination;

class ShowTransactionBank extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $accountId;
    public $account;
    public $count;

    //delete
    public $delete_id;
    protected $listeners = ['deleteConfirmed'=>'deleteAccount'];

    function toJalaliDatetime($datetime) {
        return \Morilog\Jalali\Jalalian::fromDateTime($datetime)->format('Y/m/d H:i');
    }

    public function mount($id)
    {
        $this->accountId = $id;
        $this->account = Account::where('id', $this->accountId)
            ->where('user_id', auth()->id())
            ->firstOrFail();
        $this->count = Transaction::where('account_id', $this->accountId)->count();
//         $this->findCategory = Transaction::where('account_id', $this->accountId)->first();

    }

    public function deleteConfirmation($id)
    {

        $this->delete_id = $id;
        $this->dispatch('show-delete-confirmation');
    }

    public function deleteAccount()
    {
        $account= Transaction::where('id',$this->delete_id)->first();
        $findAccount = Account::find($account->account_id);
        if($account->category_id <= 8){
            $findAccount->balance -=  $account->amount;
            $findAccount->save();
        }
        else{
            $findAccount->balance +=  $account->amount;
            $findAccount->save();
        }

        $account->delete();
        $this->dispatch('studentDeleted');
    }

    public function render()
    {
        $transactions = Transaction::where('account_id', $this->accountId)->orderBy('transaction_date', 'desc')->paginate(15);
        return view('livewire.dashboard.show-transaction-bank',compact('transactions'))->layout('components.layouts.admin');
    }
}
