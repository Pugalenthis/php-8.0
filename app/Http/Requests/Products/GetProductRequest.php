<?php

namespace App\Http\Requests\Products;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class GetProductRequest extends FormRequest
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
            'id' => 'required|exists:products,id',
        ];
    }

    public function prepareForValidation() {
        $this->merge(['id' => $this->id]);
    }

    public function messages()
    {

        //customized error messages
        return [
            'id.required' => 'Enter a product-id',
            'id.exists' => 'Product not found!',
        ];
    }

    public function failedValidation(Validator $validator){}

    public function getValidationInstance() {
        return $this->getValidatorInstance();
    }
}
