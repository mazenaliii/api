<?php

namespace App\Http\Requests\api;

use App\traits\jsontrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class catogryrequest extends FormRequest
{
    use jsontrait;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'=>'required|string|max:30',
            'desc'=>'nullable',
            'image'=>'required|mimes:jpeg,jpg',
        ];
    
    }
    public function failedValidation(Validator $validator) { 
        //write your bussiness logic here otherwise it will give same old JSON response
       throw new HttpResponseException ($this->senderrors('error',$validator->errors()));
   }
  
}
