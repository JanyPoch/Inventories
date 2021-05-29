<?php

namespace JanyPoch\Inventories\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InventoryModelsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'   => $this->model_id,
            'type' => $this->model_type,
           // 'name' => $this->name,
        ];
    }
}
