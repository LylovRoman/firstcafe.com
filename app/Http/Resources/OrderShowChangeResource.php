<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderShowChangeResource extends JsonResource
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
                'change_orders' => [
                    [
                        'change_id' => $this->change_id,
                        'orders' => [
                            'id' => $this->id,
                            'table' => $this->book_id
                        ]
                    ]
                ]
            ]
        ];
    }
}
