<?php

namespace CryptaEve\Seat\Strict\Validation;

use Illuminate\Foundation\Http\FormRequest;

class ValidateSettings extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            // Enablers
            'globalenable'    => 'integer|present|min:0|max:1',

            // What to remove
            'removesquads'    => 'integer|present|min:0|max:1',
            'removeperms'     => 'integer|present|min:0|max:1',
            'removemods'     => 'integer|present|min:0|max:1',

            // Removal Reasons
            'tokeninvalid'    => 'integer|present|min:0|max:1',
        ];
    }
}
