<?php

namespace App\Livewire\Dashboard\Saving;

use App\Models\Saving;
use App\Models\SavingTransaction;
use App\Models\Transaction;
use Livewire\Component;
use Livewire\WithPagination;

class SavingManager extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $details;
    public $jalali;
    public $progress ;
    public $transactions;
    public $delete_id;
    public $delete_id1;
    protected $listeners = ['deleteConfirmed'=>'deleteAccount','deleteConfirmed1'=>'deleteAccount1'];
    public function mount()
    {
        $this->loadData();

    }

    public function loadData()
    {
        $this->details = Saving::where('user_id', auth()->id())->with('transactions')->first();
        $save = Saving::where('user_id', auth()->id())->first();


        if ($save)
            $this->progress=ROUND($save->amount / $save->target_amount *100);
        else
            $this->progress=0;

    }

    public function deleteConfirmation($id)
    {

        $this->delete_id = $id;
        $this->dispatch('show-delete-confirmation');
    }

    public function deleteAccount()
    {
        $account= Saving::where('id',$this->details->id)->first();
        $account->delete();
        $this->loadData();
        $this->dispatch('studentDeleted');
    }



    public function deleteConfirmation1($id)
    {

        $this->delete_id1 = $id;
        // بعد از حذف، event به JS بفرست
        $this->dispatch('show-delete-confirmation1');
    }
    public function deleteAccount1()
    {
        $account= SavingTransaction::where('id',$this->delete_id1)->first();

        $findSaving = Saving::find($account->saving_id);
        if($account->type == 1){
            $findSaving->amount -=  $account->amount;
            $findSaving->save();
        }
        else{
            $findSaving->amount +=  $account->amount;
            $findSaving->save();
        }

        $account->delete();
        $this->loadData();
        $this->dispatch('studentDeleted');
    }




    public function render()
    {
        $save = Saving::where('user_id', auth()->id())->first();
        if ($save) {
            $transactionPage=SavingTransaction::where('saving_id', $save->id)->orderBy('created_at', 'desc')->paginate(15);
            return view('livewire.dashboard.saving.saving-manager',compact('transactionPage'))->layout('components.layouts.admin');
        }
        return view('livewire.dashboard.saving.saving-manager')->layout('components.layouts.admin');
    }

}
