<?php

namespace App\Http\Livewire;

use App\Models\Proberty;
use App\Models\Season;
use Livewire\Component;

class Seasons extends Component
{
    public $seasons = [];
    public $house;

    public $season_vlaues = [];

    public function render()
    {
        return view('admin.houses.livewire.seasons');
    }

    public function mount()
    {
        if ($this->house != null) {
            foreach ($this->house->seasons as $value) {
                $this->season_vlaues[$value->id] = $value->pivot->price;
            }
        }
        $this->seasons = Season::latest()->get();
    }


    protected $listeners = ['season_added' => 'season_added'];

    function season_added()
    {
        $this->seasons = Season::latest()->get();
    }
}
