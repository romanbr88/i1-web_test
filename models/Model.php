<?php

namespace app\models;

use yii\db\ActiveRecord;

class Model extends ActiveRecord
{
    public function getBrand()
    {
        return $this->hasOne(Brand::class, ['id' => 'brand_id']);
    }
}