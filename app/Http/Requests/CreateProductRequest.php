<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
   public const NAME = 'name';
   public const PRICE = 'price';
   public const IMAGES = 'images';

    public function rules(): array
    {
        return [
            self::NAME => [
                'string',
                'required'
            ],

            self::PRICE => [
                'numeric',
                'required'
            ],

            self::IMAGES => [
                'array',
                'required'

            ]
        ];
    }

    public function getName(): string
    {
        return $this->get(self::NAME);
    }

    public function getPrice(): string
    {
        return $this->get(self::PRICE);
    }

    public function getImages(): array
    {
       return $this->file(self::IMAGES);
    }


}
