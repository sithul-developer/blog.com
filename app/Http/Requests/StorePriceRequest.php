<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePriceRequest  extends FormRequest
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
            'product_name' => 'required|string|max:191',
            'compay_name' => 'required|string|max:191',
            'order' => 'required',
            'time_effect' => 'required|string|max:255',
            'price_usd' => 'required|string|max:10',
            'price_khr' => 'required|string|max:10',

        /*     'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'content' => 'required',
            'description' => 'required|string|max:255',
            'category_id' => 'required', */
          /*   'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048' */
        ];
    }
   
}
