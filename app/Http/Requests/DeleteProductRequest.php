<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeleteProductRequest extends FormRequest
{
    public const ID = 'id';

    public function getId(): string
    {
        return $this->route(self::ID);
    }
    public function rules(): array
    {
        return [];
    }
}
