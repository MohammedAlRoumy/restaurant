<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MealRequest extends FormRequest
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
            'price' => 'required|numeric|min:0',
            'description' => 'required|string|max:255|min:3',
            'category_id' => 'required|int|exists:categories,id'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'الاسم مطلوب',
            'name.max' => 'الاسم لا يزيد عن 255 حرف',
            'name.min' => 'الاسم لا يقل عن 3 أحرف',

            'category_id.required' => 'قائمة الطعام مطلوبة',

            'price.required' => 'السعر مطلوب',
            'price.numeric' => 'السعر يجب أن يكون رقم',
            'price.min' => 'السعر لا يكون سالب ، يكون على الاقل 0 ',

            'description.required' => 'الوصف مطلوب',
            'description.max' => 'الوصف لا يزيد عن 255 حرف',
            'description.min' => 'الوصف لا يقل عن 3 أحرف',

        ];
    }
}
