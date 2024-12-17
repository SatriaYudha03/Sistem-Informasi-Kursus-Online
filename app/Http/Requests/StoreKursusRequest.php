<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKursusRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->hasAnyRole(['instruktur', 'owner']);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255', 
            'path_trailer' => 'required|string|max:255',
            'about' => 'required|string',
            'kategori_id' => 'required|integer',
            'thumbnail' => 'required|image|mimes:png,jpg,svg',
            'materi_kursuses.*' => 'required|string|max:255',
        ];
    }
}
