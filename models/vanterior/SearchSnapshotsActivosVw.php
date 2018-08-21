<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SnapshotsActivosVw;

/**
 *
 */
class SearchSnapshotsActivosVw extends SnapshotsActivosVw
{

  public function rules()
  {
    return[
      [['snapshot_id','region','image_id','volume_id','instance_id','snapshot_dev','tipo',
        'fecha','descripcion','tag_name','tag_owner','tag_department','estatus','vol_name','vol_department',
        'vol_owner','inst_name','inst_department','inst_owner','size'], 'safe']
    ];
  }

  public function scenarios()
  {
    return Model::scenarios();
  }

  public function search($params)
  {
    $query = SnapshotsActivosVw::find();

    $dataProvider = new ActiveDataProvider([
      'query' => $query,
    ]);

    if (!($this->load($params)&& $this->validate())) {
      return $dataProvider;
    }

    $query->andFilterWhere([
      'snapshot_id' => $this->snapshot_id,
      'region' =>$this->region,
      'image_id' =>$this->image_id,
      'volume_id' =>$this->volume_id,
      'instance_id' =>$this->instance_id,
      'snapshot_dev' =>$this->snapshot_dev,
      'tipo' =>$this->tipo,
    ]);

    $query->andFilterWhere(['like','fecha', $this->fecha])
          ->andFilterWhere(['like','descripcion', $this->descripcion])
          ->andFilterWhere(['like','tag_name', $this->tag_name])
          ->andFilterWhere(['like','tag_owner', $this->tag_owner])
          ->andFilterWhere(['like','tag_department', $this->tag_department])
          ->andFilterWhere(['like','estatus', $this->estatus])
          ->andFilterWhere(['like','vol_name', $this->vol_name])
          ->andFilterWhere(['like','vol_department', $this->vol_department])
          ->andFilterWhere(['like','vol_owner', $this->vol_owner])
          ->andFilterWhere(['like','inst_name', $this->inst_name])
          ->andFilterWhere(['like','inst_department', $this->inst_department])
          ->andFilterWhere(['like','inst_owner', $this->inst_owner])
          ->andFilterWhere(['like','size', $this->size]);



          return $dataProvider;
  }
}
