<?php


namespace JanyPoch\Inventories\Traits;


use JanyPoch\Inventories\Models\Inventory;

trait Inventories
{
    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }
}
