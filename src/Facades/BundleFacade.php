<?php

namespace JanyPoch\Inventories\Facades;


use Illuminate\Support\Facades\Facade;

class BundleFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'JanyPoch\Inventories\Services\Bundle';
    }
}
