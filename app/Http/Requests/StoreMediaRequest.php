<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreMediaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $mediaId = $this->route('media')?->id;

        if ($this->isMethod('PATCH')) {
            return [
                'title' => ['sometimes', 'string', 'max:255', Rule::unique('media', 'title')->ignore($mediaId)],
                'status' => ['sometimes', 'string', 'max:100'],
                'episode_count' => ['sometimes', 'integer', 'min:0'],
                'rating' => ['sometimes', 'numeric', 'min:0', 'max:10'],
            ];
        }

        return [
            'title' => ['required', 'string', 'max:255', 'unique:media,title'],
            'status' => ['required', 'string', 'max:100'],
            'episode_count' => ['required', 'integer', 'min:0'],
            'rating' => ['required', 'numeric', 'min:0', 'max:10'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Judul media wajib diisi',
            'title.unique' => 'Judul media sudah ada',
            'status.required' => 'Status media wajib diisi',
            'episode_count.required' => 'Jumlah episode wajib diisi',
            'episode_count.min' => 'Jumlah episode tidak boleh kurang dari 0',
            'rating.required' => 'Rating wajib diisi',
            'rating.max' => 'Rating maksimal adalah 10',
        ];
    }
}
