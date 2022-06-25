<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
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
            'nama_event' => 'required|string',
            'deskripsi_event' => 'required|string',
            'slug' => 'required|string|unique:events',
            'alamat' => 'nullable|string',
            'social_media' => 'nullable|string',
        ];
    }
}
