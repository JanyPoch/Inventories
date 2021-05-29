<?php

namespace JanyPoch\Inventories\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InventoryResource extends JsonResource
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
            'user'        => $this->user,
            'type'        => $this->type,
            'name'        => $this->name,
            'description' => $this->description,
            'models'      => InventoryModelsResource::collection($this->models)
        ];
    }
}
