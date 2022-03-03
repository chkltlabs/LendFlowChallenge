<?php

namespace App\Http\Requests;

use App\Rules\IntIsMultOf20;
use App\Rules\ISBN;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class NYTGetRequest extends FormRequest
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
            'author' => 'string',
            'isbn' => ['string', new ISBN], //10 or 13 digits, multiple isbns separated by ';'
            'title' => 'string',
            'offset' => [new IntIsMultOf20], //nyt.com says must be a multiple of 20
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'status' => false,
                'message' => 'Validation of parameters failed!',
                'errors' => $validator->errors()->messages()
            ], 400)
        );
    }
}
