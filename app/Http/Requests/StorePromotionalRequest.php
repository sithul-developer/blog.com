<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePromotionalRequest  extends FormRequest
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
        /*     'title' => 'required', */
            'order' => 'required',
            'options' => 'required',
            'image' => 'required',
        /*     'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'content' => 'required',
            'description' => 'required|string|max:255',
            'category_id' => 'required', */
          /*   'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048' */
        ];
    }
   
}
