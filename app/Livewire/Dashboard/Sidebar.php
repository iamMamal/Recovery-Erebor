<?php

namespace App\Livewire\Dashboard;

use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Sidebar extends Component
{
//    public $activeMenu = ''; // مثلا پیش‌فرض منوی خانه فعال باشه


    public string $activeRoute = '';

    public function mount()
    {
        $this->activeRoute = Route::currentRouteName();
//        $this->checkRoute = in_array($this->activeRoute, ['dashboard.bank-manager', 'dashboard.add-bank']);

    }

//    public function setActiveMenu($menu)
//    {
//        $this->activeMenu = $menu;
//    }

    public function render()
    {
        return view('livewire.dashboard.sidebar');
    }
}
