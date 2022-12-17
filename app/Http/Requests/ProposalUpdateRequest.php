<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProposalUpdateRequest extends FormRequest
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
            'proposal_id' => ['nullable', 'exists:proposals,id'],
            'user_id' => ['required', 'exists:users,id'],
            'text' => ['required', 'min:5', 'max:2000'],
            'status' => ['nullable','string']
        ];
    }
}
