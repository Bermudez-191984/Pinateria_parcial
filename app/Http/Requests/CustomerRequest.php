<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
        if (request()->isMethod('post')) {
            return [
                'firstname' => 'required|string|max:255',
                'secondname' => 'nullable',
                'lastname' => 'required|string|max:255',
                'secondlastname' => 'nullable',
                'age' => 'required|numeric',
                'email' => 'required|string|max:255',
                'status' => 'null',
                'image' => 'nullable|image|mimes:jpg,jpeg,png|max:3000',

            ];
        } else if (request()->isMethod('put')) {
            return [

                'name' => 'required|string', //unique:nombre de la tabla,nombre de la fila
                'document' => 'required|string',
                'mail' => 'nullable|max:255',
                'address' => 'required',
                'phone' => 'required',
                'status' => 'null',
                'image' => 'nullable|image|mimes:jpg,jpeg,png|max:3000',
            ];
        } else {
            return [];
        }
    }

    public function attributes()
    {
        return [
            'cutomer_id' => 'customer',


        ];
    }
}