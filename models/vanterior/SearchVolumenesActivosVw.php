<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\VolumenesActivosVw;

/**
 *
 */
class SearchVolumenesActivosVw extends VolumenesActivosVw
{

  public function rules()
  {
    return[
      [['size'],'integer'],
      [['region','zone','volume_id','snapshot_id','tag_name','tag_department','tag_owner',
        'instance_id','instance_name','instance_department','instance_owner','status','type',
        'iops','attach_time','create_time','last_snapshot','last_snapshot_time','dispositivo','estatus','last_updated'],'safe'],
      [['encrypted','delete_on_termination'],'boolean']
    ];
  }

  public function scenarios()
  {
    return Model::scenarios();
  }

  public function search($params)
  {
    $query = VolumenesActivosVw::find();

    $dataProvider = new ActiveDataProvider([
      'query' => $query,
    ]);

    if (!($this->load($params)&& $this->validate())) {
      return $dataProvider;
    }

    $query->andFilterWhere([
      'size' => $this->size,
      'encrypted' => $this->encrypted,
      'delete_on_termination' => $this->delete_on_termination,
      'region' => $this->region,
      'zone' => $this->zone,
      'volume_id' => $this->volume_id,
      'snapshot_id' => $this->snapshot_id,
      'tag_name'=> $this->tag_name,
      'tag_department' => $this->tag_department,
      'tag_owner'=> $this->tag_owner,
    ]);

    $query->andFilterWhere(['like','instance_id', $this->instance_id])
          ->andFilterWhere(['like','instance_name', $this->instance_name])
          ->andFilterWhere(['like','instance_department', $this->instance_department])
          ->andFilterWhere(['like','instance_owner', $this->instance_owner])
          ->andFilterWhere(['like','status', $this->status])
          ->andFilterWhere(['like','type', $this->type])
          ->andFilterWhere(['like','iops', $this->iops])
          ->andFilterWhere(['like','attach_time', $this->attach_time])
          ->andFilterWhere(['like','create_time', $this->create_time])
          ->andFilterWhere(['like','last_snapshot', $this->last_snapshot])
          ->andFilterWhere(['like','last_snapshot_time', $this->last_snapshot_time])
          ->andFilterWhere(['like','dispositivo', $this->dispositivo])
          ->andFilterWhere(['like','estatus', $this->estatus])
          ->andFilterWhere(['like','last_updated', $this->last_updated]);


          return $dataProvider;
  }

}
