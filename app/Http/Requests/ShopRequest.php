<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'genre_id' => 'required|integer',
            'region_id' => 'required|integer',
            'description' => 'required|string|max:255',
            'image' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => '名前を入力してください。',
            'name.max' => '名前は100文字以内で入力してください。',
            'genre.required' => 'ジャンルを選択してください。',
            'region.required' => '地域を選択してください。',
            'description.required' => '説明を入力してください。',
            'description.max' => '説明は255文字以内で入力してください。',
            'image.required' => '画像を選択してください。',
        ];
    }
}
