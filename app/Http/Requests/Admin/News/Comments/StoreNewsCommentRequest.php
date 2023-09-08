<?php

namespace App\Http\Requests\Admin\News\Comments;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewsCommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'content' => 'required|string',
            'user_id' => 'required|exists:news,id',
            'news_id' => 'required|exists:news,id',
        ];
    }
}