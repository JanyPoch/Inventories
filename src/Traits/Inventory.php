<?php


namespace JanyPoch\Inventories\Traits;


use JanyPoch\Inventories\Models\InventoryModel;
use JanyPoch\Inventories\Models\Transaction;

trait Inventory
{
    public function inventory()
    {
        return $this->morphToMany(\JanyPoch\Inventories\Models\Inventory::class, 'model', 'inventories_models');
    }

    public function inventoryModels()
    {
        return $this->hasMany(InventoryModel::class);
    }

    public function inventoryTransactions()
    {
        return $this->hasManyThrough(Transaction::class, InventoryModel::class, 'model_id', 'inventory_model_id', 'id', 'id');
    }
}
