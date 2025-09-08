<?php

namespace App\Livewire\Dashboard\Debt;

use App\Models\Debt;
use App\Models\Installment;
use Livewire\Component;

class ShowInstallments extends Component
{
    public $installments;
    public $debt;
    public $status = [];
    public $pageId;

    public function mount($id)
    {
        $this->pageId = $id;
        $this->debt = Debt::where('user_id', auth()->id())->with('installments')->findOrFail($id);
        $this->installments = $this->debt->installments;
    }


    public function updateStatus($installmentId)
    {
        $installment = Installment::find($installmentId);
        if ($installment) {
            $installment->is_paid = (bool)$this->status[$installmentId];
            $installment->save();

        }
        $this->mount($this->debt->id);
    }


    public function render()
    {
        return view('livewire.dashboard.debt.show-installments')->layout('components.layouts.admin');
    }
}
