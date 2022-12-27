<?php

namespace App\Http\Requests;

use App\Models\Waste;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class WasteEditRequest extends FormRequest
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
        $worthless = Waste::WORTHLESS;
        $valuable = Waste::VALUABLE;
        return [
            'name' => 'required',
            'point' => 'required|numeric|min:0',
            'type' =>"required|in:$valuable, $worthless",
            'images' => 'nullable|array|min:0'
        ];
    }
}
