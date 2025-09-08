<?php

namespace App\Livewire\Dashboard\Debt;

use App\Models\Debt;
use Livewire\Component;

class AddDebt extends Component
{
    public $selectedOption = null;
    public $title ;
    public $balance ,$type ,$description , $careerDate;
    public function selectOption($option)
    {
        $this->selectedOption = $option;

    }
    protected $rules = [
        'title' => 'required',
        'balance' => 'required|numeric|min:0',
        'type' => 'required',
        'careerDate' => 'required',
    ];

    public function save()
    {
        $time = date('Y-m-d H:i:s', $this->careerDate);
        $this->validate();
        Debt::create([
            'user_id' => auth()->id(),
            'title' => $this->title,
            'total_amount' => $this->balance,
            'type' => $this->type,
            'description' => $this->description,
            'start_date' => $time,
        ]);


            session()->flash('success', 'بدهی یا طلب مورد نظر با موفقیت ثبت شد ✅');
            return redirect('/dashboard/debt-manager');
    }


    public function render()
    {
        return view('livewire.dashboard.debt.add-debt')->layout('components.layouts.admin');
    }
}
