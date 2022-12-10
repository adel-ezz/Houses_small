<?php

namespace App\Http\Livewire;

use App\Models\Season;
use Livewire\Component;

class AddSeasons extends Component
{
    public function render()
    {
        return view('livewire.add-seasons');
    }

    ///=======For Form=======///
    public $name;
    public $describe;
    public $start;
    public $end;

    protected function rules()
    {
        return [
            'name' => "required",
            "describe" => "nullable",
            'start' => "required",
            'end' => "required"
        ];

    }

//====For Real time validation =======//
    protected $rules = [

        'name' => "required",
        "describe" => "nullable",
        'start' => "required",
        'end' => "required"
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields, $this->rules);
    }


    ////=============Rules && messages===============///
    function datamessages($formData)
    {

        $messages = [
            'name' => trans('name'),
            "describe" => trans('describe'),
            "start" => trans('start'),
            'end' => trans('end')
        ];


        return ['messages' => $messages];
    }

    public function submit()
    {

        $Names = [
            'name' => trans('name'),
            "describe" => trans('describe'),
            "start" => trans('start'),
            'end' => trans('end')
        ];


        $result = $this->validate($this->rules(), $Names, $Names);
        ///=========data Language==========///

        $result['created_by'] = auth()->id();

        $other = Season::whereBetween('start', [$result['start'], $result['end']])
            ->orWhereBetween('end', [$result['start'], $result['end']])
            ->first();
        if ($other) {
            $this->addError('not-allowed', trans('kindly choose another time you have another season in same time '));
            return;
        }


        $season = Season::create($result);
        $this->emit('alert_success');
        $this->emit('season_added');
        $this->reset();
    }

}
