<?php

namespace JanyPoch\Inventories\Models;

use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use JanyPoch\Inventories\Contracts\IInventory;

class Inventory extends Model
{
    use SoftDeletes;

    protected $table = 'inventories';
    protected $fillable = [
        'user_id',
        'type',
        'name',
        'description',
        'options'
    ];

    const TYPES = [
        'public',
        'private'
    ];

    const CATEGORIES = [
        'bundles',
        'money'
    ];

    const MONEY = 'money';
    const BUNDLES = 'bundles';
    const ALLOWED = 1;

    public static function getModelsByCategory(string $category)
    {
        return config('inventories.categories.'.$category);
    }

    public function bundles()
    {
        return $this->morphedByMany(Bundle::class, 'model', 'inventories_models');
    }

    public function models()
    {
        return $this->HasMany(InventoryModel::class);
    }

    public function moneyModel()
    {
        $models = self::getModelsByCategory(self::MONEY);
        $models = is_array($models) ? array_shift($models):$models;
        $class = config('inventories.supported_models.'.$models);
        $model = $this->models()->where('model_type', $class)->first();
        return $model;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_inventories');
    }

    public function isAllowedForUser(User $user)
    {
        return $this->users()->where('user_id', $user->id)->where('users_inventories.status', self::ALLOWED)->first() ? true:false;
    }

    public function getCategoryAttribute()
    {
        return json_decode($this->options)->category ?? null;
    }

    public function getLimitAttribute()
    {
        return json_decode($this->options)->category == self::MONEY ? json_decode($this->options)->limit : null;
    }
}
