<?php

namespace App\Http\Requests;

use App\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RoleRequest extends FormRequest
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
            'name' => ['required',              /*  Rule::unique('roles','name') ->ignore($role->id)*/
            ],
            'permissions' => 'required|array|min:1'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'الاسم مطلوب',
            'name.unique' => 'اسم الصلاحية موجود مسبقا',

            'permissions.required' => 'الاذونات مطلوبة',
            'permissions.array' => 'يجب ان تكون الاذونات مصفوفة',
            'permissions.min' => 'عدد الاذونات على الأقل 1 ',

        ];
    }
}
