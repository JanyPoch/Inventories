<?php

namespace JanyPoch\Inventories\Services;

use \JanyPoch\Inventories\Models\Bundle as BundleModel;


class Bundle
{

    public function attach(BundleModel $bundle, array $models)
    {
        foreach ($models as $model) {
            $configModel = config('inventories.bundleable.' . $model['type']);

            if ($configModel) {
                $class = $configModel::find($model['id']);
                $class->bundle()->syncWithoutDetaching($bundle);
            }
        }

        return $bundle;
    }
}
