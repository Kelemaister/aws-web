<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\InstanciasReservadasVw;


/**
 *
 */
class SearchInstanciasReservadasVw extends InstanciasReservadasVw
{

  public function rules()
  {
    return[
      [['region','zone','instance_type','platform','tag_name','instance_state','instance_id',
        'resv_id','resv_region','resv_zone','resv_instance_type','resv_state','resv_platform','resv_instance_count'],'safe'],
      [['valid_reservation'],'boolean']
    ];
  }

  public function scenarios()
  {
    return Model::scenarios();
  }

  public function search($params)
  {
    $query =InstanciasReservadasVw::find();

    $dataProvider = new ActiveDataProvider([
      'query' => $query,
    ]);


    if (!($this->load($params)&& $this->validate())) {
      return $dataProvider;
    }

    $query->andFilterWhere([
      'region' =>$this->region,
      'zone' =>$this->region,
      'instance_type' =>$this->instance_type,
      'platform' =>$this->platform,
      'valid_reservation' =>$this->valid_reservation,
    ]);

    $query->andFilterWhere(['like','tag_name', $this->tag_name])
          ->andFilterWhere(['like','instance_state', $this->instance_state])
          ->andFilterWhere(['like','instance_id', $this->instance_id])
          ->andFilterWhere(['like','resv_id', $this->resv_id])
          ->andFilterWhere(['like','resv_region', $this->resv_region])
          ->andFilterWhere(['like','resv_zone', $this->resv_zone])
          ->andFilterWhere(['like','resv_instance_type', $this->resv_instance_type])
          ->andFilterWhere(['like','resv_state', $this->resv_state])
          ->andFilterWhere(['like','resv_platform', $this->resv_platform])
          ->andFilterWhere(['like','resv_instance_count', $this->resv_instance_count]);


          return $dataProvider;
  }

}
