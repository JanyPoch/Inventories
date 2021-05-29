<?php


namespace JanyPoch\Inventories\Models;


use Illuminate\Database\Eloquent\Model;

class InventoryModel extends Model
{
    protected $table = 'inventories_models';

    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }

    public function model()
    {
        return $this->morphTo();
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function currentMonthTransactions()
    {
        return $this->transactions()->whereYear('created_at', date('Y'))->whereMonth('created_at', date('m'))->get();
    }

}
