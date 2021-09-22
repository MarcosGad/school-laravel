<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;

class Counter extends Component
{
    // public $count = 0;
    
    public $search = '';

    public $userCount;

    protected $listeners = ['userAdded' => 'incrementUserCount'];


    // public function increment()
    // {
    //     $this->count++;
    // }

    // public function m()
    // {
    //     $this->count--;
    // }

    // <div style="text-align: center">
    // <button wire:click="increment">+</button>
    // <h1>{{ $count }}</h1>
    // <button wire:click="m">-</button>
    // </div>

    public function incrementUserCount()
    {
        $this->userCount = User::count();
    }

    public function render()
    {
        //return view('livewire.counter');
        return view('livewire.counter', [
            'users' => User::where('name', $this->search)->get(),
            'userCount' => $this->userCount,
        ]);
    }
}
