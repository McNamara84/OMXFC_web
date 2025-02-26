<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->user()->id),
            ],
            'einstiegsroman' => ['nullable', 'string', 'max:255'],
            'lieblingsroman' => ['nullable', 'string', 'max:255'],
            'lieblingszyklus' => ['nullable', 'string', 'max:255'],
            'lieblingscharakter' => ['nullable', 'string', 'max:255'],
            'lesestand' => ['nullable', 'string', 'max:255'],
            'leseform' => ['nullable', 'in:eBook,Papier'],
        ];
    }
}
