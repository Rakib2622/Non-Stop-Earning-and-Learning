<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
 
    public function rules()
    {
        return [
            'id' => 'int',
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'language' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'whatsapp' => 'nullable|string|max:20',
            'status'=> 'nullable|string|max:20',
            'balance'=> 'nullable|string|max:20',
            'team_leader_id'=> 'nullable|string|max:20',
            'trainer_id'=> 'nullable|string|max:20',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}

