<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Game;

class GameRequest extends FormRequest
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
                'title' => ['required', 'string', 'max:255', 'unique:games,title,'.$this->id], // Verifica que el título sea único excepto para el juego actual
                'categoryId' => ['required', 'exists:categories,id'],
                'releasedate' => ['required', 'date'],
                'developer' => ['required', 'string', 'max:255'],
                'price' => ['required', 'numeric', 'min:0'],
                'genre' => ['required', 'string', 'max:255'],
                'slider' => ['boolean'],
                'description' => ['nullable', 'string', 'max:500'],
            ];
        } else {
            return [
                'title' => ['required', 'string', 'max:255', 'unique:games,title'], // Verifica que el título sea único
                'categoryId' => ['required', 'exists:categories,id'],
                'releasedate' => ['required', 'date'],
                'developer' => ['required', 'string', 'max:255'],
                'price' => ['required', 'numeric', 'min:0'],
                'genre' => ['required', 'string', 'max:255'],
                'slider' => ['boolean'],
                'description' => ['nullable', 'string', 'max:500'],
            ];
        }
        
        
    }
}
