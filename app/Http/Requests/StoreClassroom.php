<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClassroom extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'List_Classes.*.Name' => 'required',
            'List_Classes.*.Name_class_en' => 'required',
        ];
    }

    public function attributes()
    {
        $attributes =  [
            'List_Classes.0.Name' => 'الأسم بالغة العربية',
            'List_Classes.0.Name_class_en' => 'الأسم بالغة الأنجليزية',
        ];

        // if(count(request('List_Classes')) > 0){
        //     for($i = 0; $i < count(request('List_Classes')); $i++){
        //         $attributes['List_Classes.' . $i . '.Name'] = 'الأسم';
        //     }
        // }

        return $attributes;
    }

    public function messages()
    {
        return [
            'Name.required' => trans('validation.required'),
            'Name_class_en.required' => trans('validation.required'),
        ];
    }
}
