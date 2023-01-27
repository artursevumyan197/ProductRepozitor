<?php

namespace App\Http\Requests;

class UpdateProductRequest extends CreateProductRequest
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
