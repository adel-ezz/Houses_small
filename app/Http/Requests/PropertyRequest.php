<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
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
             'title'=>trans('title'),
            'describe'=>trans('describe')
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
            'title' => "required|unique:properties,title",
            "describe"=>"required",
        ];
    }

    protected function onUpdate()
    {

        return  [
            'title' => "unique:properties,title,". $this->route('property'),
            "describe"=>"required",
        ];
    }
}
