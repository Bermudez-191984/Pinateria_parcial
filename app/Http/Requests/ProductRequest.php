<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
   
            if(request()->isMethod('post')){
                return [
                    'name'=> 'unique:products,name|string', //unique:nombre de la tabla,nombre de la fila
                    'description'=> 'nullable|max:255',
                    'amount'=> 'required',
                    'price'=> 'required',
                    'status'=> 'null',
                    'image' => 'nullable|image|mimes:jpg,jpeg,png|max:3000',
                    
                ];	
            } else if(request()->isMethod('put')){
                return [

                    'name'=> 'unique:products,name|string', //unique:nombre de la tabla,nombre de la fila
                    'description'=> 'nullable|max:255',
                    'amount'=> 'required',
                    'price'=> 'required',
                    'status'=> 'null',
                    'image' => 'nullable|image|mimes:jpg,jpeg,png|max:3000',
                ];
            }
            else{
                return [
                ];
            }
    
    }
    public function messages(){
        return [
            'name.unique' => 'The name already used.',
            'name.required' => 'El nombre es obligatorio.',
            'description.required' => 'La descripcion del producto es obligatorio.',
            'price.required' => 'El required es obligatoria.',
            'amount.required' => 'El Stock a ingresar es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos :min caracteres.',
            ];
        }


}