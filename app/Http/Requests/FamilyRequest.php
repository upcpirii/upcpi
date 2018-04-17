<?php

namespace UPCEngineering\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FamilyRequest extends FormRequest
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
        $last_name = $this->last_name;

        return [
            'first_name' => [
                'required',
                Rule::exists('tenant.members')->where(function ($query) use ($last_name) {
                    $query->where('last_name', $last_name);
                }),
            ],
            'last_name'  => 'required',
        ];
    }
}
