<?php


namespace JanyPoch\Inventories\Controllers;


use App\Http\Controllers\Controller;
use JanyPoch\Inventories\Requests\CreateUserInventoryRequest;
use App\Models\User;
use JanyPoch\Inventories\Models\Inventory;
use JanyPoch\Inventories\Resources\InventoryResource;

class UserController extends Controller
{
    public function setInventory(User $user, CreateUserInventoryRequest $request)
    {
        $fields = $request->validated();
        $fields['options'] = json_encode($request->options);
        $inventory = Inventory::create($fields);

        foreach ($request->models as $model) {
            $configModel = config('inventories.supported_models.' . $model['type']);

            if ($configModel) {
                $class = $configModel::find($model['id']);
                $class->inventory()->syncWithoutDetaching(isset($model['amount']) ? [$inventory->id => ['amount' => $model['amount']]]:$inventory->id);
            }
        }
        return new InventoryResource($inventory);
    }
}
