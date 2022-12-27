<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ClientEditRequest extends FormRequest
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
        $statusActive = User::STATUS_ACTIVE;
        $statusNotActive = User::STATUS_NOT_ACTIVE;
        $statusProcess = User::STATUS_PROCESS;
        $statusBan = User::STATUS_BAN;
        return [
            'name' => "required",
            'telephone' => 'required',
            'address' => 'required',
            'status' => "required|in:$statusActive,$statusNotActive,$statusProcess,$statusBan"
        ];
    }
}
