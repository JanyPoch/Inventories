<?php


namespace JanyPoch\Inventories\Controllers;


use App\Http\Controllers\Controller;
use JanyPoch\Inventories\Models\Inventory;
use JanyPoch\Inventories\Resources\InventoryResource;

class InventoriesController extends Controller
{
    public function get(Inventory $inventory)
    {
        return new InventoryResource($inventory);
    }
}
