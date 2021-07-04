<?php

namespace app\models;

use yii\db\ActiveRecord;

class Catalog extends ActiveRecord
{
    public function getModel()
    {
        return $this->hasOne(Model::class, ['id' => 'model_id']);
    }

    public function getEngine()
    {
        return $this->hasOne(Engine::class, ['id' => 'engine_id']);
    }

    public function getDrive()
    {
        return $this->hasOne(Drive::class, ['id' => 'drive_id']);
    }

    public function getBrand()
    {
        return $this->hasOne(Brand::class, ['id' => 'brand_id'])->via('model');
    }

    public static function getBrandNameByAlias(string $alias)
    {
        $brand = Brand::findOne(['alias' => $alias]);
        return $brand->name ?? '';
    }

    public static function getModelNameByAlias(string $alias)
    {
        $model = Model::findOne(['alias' => $alias]);
        return $model->name ?? '';
    }
}