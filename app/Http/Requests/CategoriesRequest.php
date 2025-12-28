<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoriesRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        $categoryId = $this->route('category') ? $this->route('category')->id : null;

        return [
            'title' => 'required|max:255',
            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('categories', 'slug')->ignore($categoryId),
            ],
            'short_description' => 'nullable|string|max:255',
            'sort' => 'nullable|integer|min:0',
            'is_active' => 'required|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            // Title
            'title.required' => 'Kategori başlığı zorunludur.',
            'title.max'      => 'Başlık alanı en fazla 255 karakter olabilir.',

            // Slug
            'slug.string'    => 'Slug alanı geçerli bir metin olmalıdır.',
            'slug.max'       => 'Slug alanı en fazla 255 karakter olabilir.',
            'slug.unique'    => 'Bu slug (kalıcı bağlantı) başka bir kategori tarafından kullanılıyor.',

            // Short Description
            'short_description.string' => 'Kısa açıklama geçerli bir metin olmalıdır.',
            'short_description.max'    => 'Kısa açıklama en fazla 255 karakter olabilir.',

            // Sort
            'sort.integer' => 'Sıra numarası sadece rakamlardan oluşmalıdır.',
            'sort.min'     => 'Sıra numarası en az 0 olabilir.',

            // Is Active
            'is_active.required' => 'Kategori durumu (Aktif/Pasif) seçilmelidir.',
            'is_active.boolean'  => 'Kategori durumu geçersiz değer içeriyor.',
        ];
    }
}