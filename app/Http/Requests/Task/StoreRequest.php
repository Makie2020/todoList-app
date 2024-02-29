<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|min:5 |max:100',
            'description' => 'required|min:5 |max:255',
            'date' => 'required|date',
            'status' => 'nullable|boolean'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'A task name is required',
            'name.min' => 'A task name must be at least 5 characters',
            'name.max' => 'A task name cannot be more than 100 characters',

 
            'description.required' => 'The description is required',
            'description.min' => 'he description must be at least 5 characters',
            'description.max' => 'The description cannot be more than 255 characters',
 
            'date.required' => 'The date is required',
 
        ];
    }
}