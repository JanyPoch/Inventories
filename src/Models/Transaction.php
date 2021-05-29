<?php


namespace JanyPoch\Inventories\Models;


use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'inventories_models_transactions';
    protected $fillable = [
        'inventory_model_id',
        'invoice_id',
        'value'
    ];
}
