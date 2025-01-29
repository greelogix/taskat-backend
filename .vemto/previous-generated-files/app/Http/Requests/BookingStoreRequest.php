<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'user_id' => ['required'],
            'service_id' => ['required'],
            'package_id' => ['required'],
            'delivery_id' => ['required'],
            'template_id' => ['nullable'],
            'status' => ['required'],
            'booking_date' => ['required', 'date'],
            'total_price' => ['required'],
            'text' => ['required', 'string'],
            'note' => ['nullable', 'string'],
            'own_domain' => ['nullable', 'boolean'],
            'domain_url' => ['nullable', 'string'],
            'payment_method' => ['required', 'string'],
            'payment_status' => ['required', 'string'],
        ];
    }
}
