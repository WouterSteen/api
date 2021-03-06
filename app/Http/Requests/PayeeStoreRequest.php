<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class PayeeStoreRequest extends FormRequest
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
            'account_id' => 'sometimes|exists:accounts,id',
            'name' => [
                'required_if:account_id,null',
                Rule::unique('payees')->where(function ($query) {
                    return $query->where([
                        'budget_id' => $this->route('budget')->id,
                        'name' => $this->input('name'),
                    ]);
                })
            ]
        ];
    }
}
