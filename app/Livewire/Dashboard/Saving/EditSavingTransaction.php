<?php

namespace App\Livewire\Dashboard\Saving;

use App\Models\Saving;
use App\Models\SavingTransaction;
use App\Models\Transaction;
use Livewire\Component;

class EditSavingTransaction extends Component
{
    public $selectedOption = null;
    public $balance = '';
    public $description, $type;
    public $transactionId;


    public function mount($id)
    {

        // گرفتن حساب‌
        $this->transactionId = $id;
        $transaction = SavingTransaction::with('savingRelation')->findOrFail($id);

        if ($transaction->savingRelation->user_id !== auth()->id()) {
            abort(403);
        }

        $this->description = $transaction->description;
        $this->balance = $transaction->amount;
        $this->type = $transaction->type;
    }


    public function selectOption($option)
    {
        $this->selectedOption = $option;

    }
    protected $rules = [
        'balance' => 'required|numeric|min:0',
        'type' => 'required',
    ];

    public function update()
    {
        $this->validate();
        $saving = Saving::where('user_id', auth()->id())->first();
       $transaction = SavingTransaction::find($this->transactionId);
        $oldSaveMoney = $transaction->amount;

        if ($saving) {
            if ($transaction->type==0) {
                $saving->amount += $oldSaveMoney;

            } else{
                $saving->amount -= $oldSaveMoney;

            }

                if ($this->type ==0) {
                    if($this->balance >= $saving->amount) {
                        session()->flash('success1', 'مبلغ وارد شده از کل موجودی حساب بیشتر است');
                        return redirect('/dashboard/saving-manager');
                    }else{
                        $saving->amount -= $this->balance ;

                    }
                }
                else{
                    $saving->amount += $this->balance ;
                   
                }
            $saving->save();
            $transaction->update([
                'type' => $this->type,
                'amount' => $this->balance,
                'description' => $this->description,
            ]);

            session()->flash('success', 'تراکنش با موفقیت ثبت شد ✅');
            return redirect('/dashboard/saving-manager');
        }

        else {
            return redirect('/dashboard/saving-manager');
        }
    }

    public function render()
    {
        return view('livewire.dashboard.saving.edit-saving-transaction')->layout('components.layouts.admin');;
    }
}
