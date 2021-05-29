<?php

namespace JanyPoch\Inventories\Traits;

use \JanyPoch\Inventories\Models\Bundle;
use JanyPoch\Inventories\Models\BundleModel;


trait Bundleable
{
    public function bundle()
    {
        return $this
        ->morphToMany(Bundle::class, 'model', 'bundles_models');
    }

    public function bundleModels()
    {
        return $this->hasMany(BundleModel::class);
    }

    public function getBundleModel(Bundle $bundle)
    {
        return $this->bundleModels()->where('bundle_id', $bundle->id)->first() ?? null;
    }
}
