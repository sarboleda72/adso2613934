<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        if ($this->method() == "PUT") {
            return [
                'name' => ['required', 'string', 'unique:'.Category::class.',name,'.$this->id],
                'manufacturer' => ['required', 'string', 'max:255'],
                'releasedate' => ['required', 'date'],
                'description' => ['required', 'string', 'max:255'],
            ];

        }else{
            return [
                'name' => ['required', 'string', 'unique:'.Category::class.',name,'.$this->id],
                'manufacturer' => ['required', 'string', 'max:255'],
                'releasedate' => ['required', 'date'],
                'description' => ['required', 'string', 'max:255'],
            ];
        }
    }
}
