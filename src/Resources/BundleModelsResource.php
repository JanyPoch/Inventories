<?php

namespace JanyPoch\Inventories\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BundleModelsResource extends JsonResource
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
            'id'   => $this->model->id,
            'type' => $this->model_type,
            'name' => $this->model->name,
        ];
    }
}
