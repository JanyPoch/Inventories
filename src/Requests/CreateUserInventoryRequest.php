<?php

namespace JanyPoch\Inventories\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use JanyPoch\Inventories\Models\Inventory;

class CreateUserInventoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id'          => 'required|integer',
            'type'             => ['required', 'string', Rule::in(Inventory::TYPES)],
            'name'             => 'required|string',
            'description'      => 'sometimes|nullable|string',
            'options.category' => ['required', 'string', Rule::in(Inventory::CATEGORIES)],
            'models'           => 'required|array',
            'models.*.type'    => ['required', 'string', Rule::in(config('inventories.categories.' . request()->options['category']))],
            'models.*.id'      => 'required|integer',
            'models.*.amount'  => [Rule::requiredIf(request()->options['category'] == Inventory::BUNDLES), 'integer'],
            'options.limit'    => [Rule::requiredIf(request()->options['category'] == Inventory::MONEY), 'numeric']
        ];
    }

    public function all($keys = null)
    {
        $data = parent::all();
        $data['user_id'] = $this->route('user')->id ?? null;

        return $data;
    }
}
