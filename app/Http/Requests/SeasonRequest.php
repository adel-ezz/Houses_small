<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeasonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return request()->isMethod('put') || request()->isMethod('patch') ?
            $this->onUpdate() : $this->onCreate();
    }

    /**
     *
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => trans('name'),
            'describe' => trans('describe'),
            'start' => trans('start'),
            'end' => trans('end'),
            'price' => trans('price')
        ];
    }


    /**
     *
     * Get the validation rules that apply to the request.
     *
     * @return array (onCreate,onUpdate,rules) methods
     */
    protected function onCreate()
    {

        return [
            'name' => "required",
            "describe" => "nullable",
            "start" => 'required',
            "end" => 'required',
        ];
    }

    protected function onUpdate()
    {

        return [
            'name' => "required",
            "describe" => "nullable",
            "start" => 'required',
            "end" => 'required',
        ];
    }
}
