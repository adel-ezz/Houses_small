<?php

namespace App\Http\Livewire;

use App\Models\Proberty;
use Livewire\Component;

class Proberties extends Component
{
    public $properties = [];
    public $house;
    public $selected_proberties = [];
    public $check_all=false;

    public function render()
    {
        return view('admin.houses.livewire.properties');
    }

    function mount()
    {
        if ($this->house != null) {
            $this->selected_proberties = $this->house->properties->pluck('id')->toArray();
        }
        $this->properties = Proberty::latest()->get();
    }

//proberties_added
    protected $listeners = ['proberties_added' => 'proberties_added'];

    function proberties_added()
    {
        $this->selected_proberties = $this->house->properties->pluck('id')->toArray();
    }

//    public function updatedCheckAll(){
//
//    }
}
