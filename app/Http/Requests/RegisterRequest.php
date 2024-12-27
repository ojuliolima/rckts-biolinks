<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'confirmed', 'unique:users'],
            'password' => [
                'required',
                Password::defaults()
            ]
        ];
    }

    public function tryToRegister()
    {
        /* $user = new User;
        $user->name = $this->name;
        $user->password = $this->password;
        $user->email = $this->email;
        $user->save(); */

        //busca todos os campos que são validados no model, para criar o usuário via mass assignment
        $user = User::query()->create($this->validated());

        auth()->login($user);

        return true;
    }
}
