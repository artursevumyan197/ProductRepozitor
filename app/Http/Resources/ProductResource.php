<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{


    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'price' => $this->resource->price,
            'name' => $this->resource->name,
            'images'=>  $this->resource->getMedia(),
        ];
    }

}
