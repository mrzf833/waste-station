<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ItemPointCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'point' => 'required|numeric|min:1',
            'image' => 'required|image',
            'deskripsi1' => 'nullable',
            'deskripsi2' => 'nullable',
            'stock' => 'required|numeric|min:0',
        ];
    }
}
