<?php

namespace app\models;

use yii\data\ActiveDataProvider;

class CatalogSearch extends Catalog
{
    public $brand;
    public $model;
    public $engine;
    public $drive;

    public static function tableName()
    {
        return 'catalog';
    }

    public function rules()
    {
        return [
            [['id', 'model_id', 'engine_id', 'drive_id'], 'integer'],
            [['brand', 'model', 'engine', 'drive'], 'string'],
        ];
    }

    public function search($params)
    {
        $query = Catalog::find()->joinWith(['brand', 'model', 'engine', 'drive']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'totalCount' => $query->count(),
                'pageSize' => 10,
                'forcePageParam' => false,
                'pageSizeParam' => false,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['brand.alias' => $this->brand]);
        $query->andFilterWhere(['model.alias' => $this->model]);
        $query->andFilterWhere(['engine.alias' => $this->engine]);
        $query->andFilterWhere(['drive.alias' => $this->drive]);

        return $dataProvider;
    }
}