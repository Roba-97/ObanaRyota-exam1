<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
        $telRules = 'required|max:5|regex:/^[0-9]+$/';

        return [
            'last_name' => 'required',
            'first_name' => 'required',
            'gender' => 'required',
            'email' => 'required|email',
            'tel-1' => $telRules,
            'tel-2' => $telRules,
            'tel-3' => $telRules,
            'address' => 'required',
            'category_id' => 'required',
            'detail' => 'required|max:120',
        ];
    }

    public function messages()
    {
        $messages = [
            'last_name.required' => '姓を入力してください',
            'first_name.required' => '名を入力してください',
            'gender.required' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスはメール形式で入力してください',
            'address.required' => '住所を入力してください',
            'category_id.required' => 'お問い合わせの種類を選択してください',
            'detail.required' => 'お問い合わせ内容を入力してください',
            'detail.max' => 'お問い合わせ内容は120文字以内で入力してください',
        ];

        // 電話番号の共通メッセージをループで追加
        foreach (['tel-1', 'tel-2', 'tel-3'] as $telField) {
            $messages["{$telField}.required"] = '電話番号を入力してください';
            $messages["{$telField}.max"] = '電話番号は5桁までの数字で入力してください';
            $messages["{$telField}.regex"] = '電話番号は5桁までの数字で入力してください';
        }

        return $messages;

    }
}
