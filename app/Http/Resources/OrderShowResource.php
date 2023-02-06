<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => [
                'book_id' => $this->book_id,
                'orders' => [
                    [
                        'id' => $this->id,
                        'dish' => $this->dish
                    ]
                ]
            ]
        ];
    }
}
