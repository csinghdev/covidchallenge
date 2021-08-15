<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetStateInfoRequest extends FormRequest
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
            'state' => 'required|string'
        ];
    }

    public function getState() {
        return $this->get('state');
    }
}
