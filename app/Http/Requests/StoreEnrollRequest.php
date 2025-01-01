<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEnrollRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->hasAnyRole(['owner']);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|string|email|max:255',
            'proof' => 'required|image|mimes:png,jpg',
            'jenis_pembayaran' => 'required|string|max:255',
            'transaksi' => 'required|integer|max:10000000',
            'tanggal_enroll' => 'required|string|max:255',
            'kelas_id' => 'required|integer',
            // 'user_id' => 'required|integer',
        ];
    }
}
