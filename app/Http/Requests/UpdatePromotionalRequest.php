<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePromotionalRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
        /*     'title' => 'required|string', */
            'order' => 'required|string|max:255',
           /*  'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048' */
        ];
    }
   
}
