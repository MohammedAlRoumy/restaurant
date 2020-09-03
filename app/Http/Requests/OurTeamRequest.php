<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OurTeamRequest extends FormRequest
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
            'name' => 'required|string|max:255|min:3',
            'image' => 'required|image',
            'description' => 'required|string|max:255|min:3'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'الاسم مطلوب',
            'name.max' => 'الاسم لا يزيد عن 255 حرف',
            'name.min' => 'الاسم لا يقل عن 3 أحرف',

            'image.required' => 'الصورة مطلوبة',
            'image.image' => 'يجب أن تكون صورة',

            'description.required' => 'الوصف مطلوب',
            'description.max' => 'الوصف لا يزيد عن 255 حرف',
            'description.min' => 'الوصف لا يقل عن 3 أحرف',

        ];
    }

   /* public function attributes()
    {
        return [
            'name' => __('اسم القائمة'),
        ];
    }*/
}
