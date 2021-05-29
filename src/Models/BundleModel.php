<?php


namespace JanyPoch\Inventories\Models;


use Illuminate\Database\Eloquent\Model;

class BundleModel extends Model
{
    protected $table = 'bundles_models';

    public function model()
    {
        return $this->morphTo();
    }
}
