<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetProductRequest extends FormRequest
{
    public const ID = 'id';

    public function rules(): array
    {
        return [];
    }

    public function getId(): string
    {
        return $this->route(self::ID);
    }
}
