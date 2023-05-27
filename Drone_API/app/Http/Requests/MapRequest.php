<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class MapRequest extends FormRequest
{
    /**
     * Determine if the map is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['success' => false, 'message' => $validator->errors()], 412));
    }
    
    public function rules(): array
    {
        return [
            'image_name'=>'required',
            'height'=>'required',
            'width'=>'required',
            'drone_id'=>'required',
        ];
    }
}
