<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class ChangeEmailRequest extends FormRequest
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
            'user_id' => 'integer|required',
            'email' => 'required|string|email|max:255',
            
            // Rule::unique('users', 'email')->ignore(Auth::id())->whereNull('deleted_at')]
        ];
    }
    public function messeges()
    {
        return [
        'user_id.integer' => 'SystemError:システム管理者にお問い合わせください',
        'user_id.required' => 'SystemError:システム管理者にお問い合わせください',
        'email.required' => 'メールアドレスに誤りがあります',
        ];
    }

}
