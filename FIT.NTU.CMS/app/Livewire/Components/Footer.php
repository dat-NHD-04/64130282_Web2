<?php

namespace App\Livewire\Components;

use Datlechin\FilamentMenuBuilder\Models\Menu;
use Livewire\Component;

class Footer extends Component
{
    public function render()
    {
        return view('livewire.components.footer', [
            'menu' => Menu::location('header'),
        ]);
    }
}
