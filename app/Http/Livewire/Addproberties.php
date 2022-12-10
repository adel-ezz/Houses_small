<?php

namespace App\Http\Livewire;

use App\Models\Proberty;
use Livewire\Component;

class Addproberties extends Component
{

    ///=======For Form=======///
    public $title;
    public $describe;


    public function render()
    {
        return view('livewire.addproberties');
    }

    protected function rules()
    {
        return [
            'title' => "required|unique:properties",
            "describe" => "nullable",
        ];

    }

    protected $rules = [

        'title' => "required|unique:properties",
        "describe" => "nullable",
    ];
//=====Real time validate ===
    public function updated($fields)
    {
        $this->validateOnly($fields, $this->rules);
    }

    ////=============Rules && messages===============///
    function datamessages($formData)
    {

        $messages = [
            'title' => trans('title'),
            "describe" => trans('describe'),
        ];


        return ['messages' => $messages];
    }

    public function submit()
    {

        $Names = [
            'title' => trans('title'),
            "describe" => trans('describe'),
        ];

        $result = $this->validate($this->rules(), $Names, $Names);
        ///=========data Language==========///

        $result['created_by'] = auth()->id();
        $file = Proberty::create($result);
        $this->emit('alert_success');
        $this->emit('proberties_added');
        $this->reset();
    }


}
