<?php

namespace App\Http\Requests;

use App\Models\Biodata;
use Illuminate\Foundation\Http\FormRequest;

class BiodataUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    // Biodata::

    /**
     * Get the validation rules that apply to the request.
     *
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'fullname' => ['required', 'string', 'max:255'],
            'whatsapp' => ['numeric', 'min_digits:10', 'max_digits:14'],
            'religion' => ['string', 'max:255'],
            'sex' => ['string', 'max:255'],
            'city' => ['string', 'max:255'],
            'birthday' => ['string'],
            'address' => ['max:255'],
            'university' => ['string', 'max:255'],
            'faculty' => ['string', 'max:255'],
            'major' => ['string', 'max:255'],
            'semester' => ['integer', 'max:8'],
            'father' => ['string', 'max:255'],
            'fatherWhatsapp' => ['numeric', 'min_digits:10', 'max_digits:14'],
            'mother' => ['string', 'max:255'],
            'motherWhatsapp' => ['numeric', 'min_digits:10', 'max_digits:14'],
            'vehicle' => ['string', 'max:255'],
            'disease' => ['string'],
            'goals' => ['string'],
            'organizationsExp' => ['string'],
        ];
    }
}
