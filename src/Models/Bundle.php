<?php


namespace JanyPoch\Inventories\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bundle extends Model
{
    use SoftDeletes;

    protected $table = 'bundles';
    protected $fillable = [
        'name'
    ];

    public function models()
    {
        return $this->HasMany(BundleModel::class);
    }

    public function inventory()
    {
        return $this->morphToMany(Inventory::class, 'model', 'inventories_models');
    }
}
