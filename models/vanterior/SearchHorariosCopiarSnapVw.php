<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\HorariosCopiarSnapVw;


/**
 *
 */
class SearchHorariosCopiarSnapVw extends HorariosCopiarSnapVw
{

  public function rules()
  {
    return[
      [['id','dia_mes'], 'integer'],
      [['snapshot_id','volume_id','image_id','instance_id','snapshot_dev','tipo','region_origen','region_destino',
      'frecuencia','hora','descripcion','tag_name','tag_owner','tag_department'], 'safe']
    ];
  }


  public function scenarios()
  {
    return Model::scenarios();
  }

  public function search($params)
  {
    $query = HorariosCopiarSnapVw::find();

    $dataProvider = new ActiveDataProvider([
      'query' => $query,
    ]);


    if (!($this->load($params)&&$this->validate())) {
      return $dataProvider;
    }

    $query->andFilterWhere([
      'id' =>$this->id,
      'snapshot_id' =>$this->snapshot_id,
      'dia_mes' =>$this->dia_mes,
      'volume_id' =>$this->volume_id,
      'image_id' =>$this->image_id,
      'instance_id' =>$this->instance_id,
      'snapshot_dev' =>$this->snapshot_dev,
    ]);
    $query->andFilterWhere(['like', 'tipo', $this->tipo])
          ->andFilterWhere(['like', 'region_origen', $this->region_origen])
          ->andFilterWhere(['like', 'region_destino', $this->region_destino])
          ->andFilterWhere(['like', 'frecuencia', $this->frecuencia])
          ->andFilterWhere(['like', 'hora', $this->hora])
          ->andFilterWhere(['like', 'descripcion', $this->descripcion])
          ->andFilterWhere(['like', 'tag_name', $this->tag_name])
          ->andFilterWhere(['like', 'tag_owner', $this->tag_owner])
          ->andFilterWhere(['like', 'tag_departement', $this->tag_department]);

          return $dataProvider;
  }
}
