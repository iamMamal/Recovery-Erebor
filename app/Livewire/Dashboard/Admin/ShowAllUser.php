<?php

namespace App\Livewire\Dashboard\Admin;

use App\Models\User;
use Livewire\Component;

class ShowAllUser extends Component
{
    public $users;
    public $delete_id;
    protected $listeners = ['deleteConfirmed'=>'deleteAccount'];

    public function mount()
    {
        $this->loadData();
    }
    public function loadData(){
        $this->users = User::withCount('accounts')->get();
    }

    public function deleteConfirmation($id)
    {

        $this->delete_id = $id;
        $this->dispatch('show-delete-confirmation');
    }

    public function deleteAccount()
    {
        $account= User::where('id',$this->delete_id)->first();
        $account->delete();
        $this->loadData();
        $this->dispatch('studentDeleted');
    }

    public function render()
    {
        return view('livewire.dashboard.admin.show-all-user')->layout('components.layouts.admin');
    }
}
