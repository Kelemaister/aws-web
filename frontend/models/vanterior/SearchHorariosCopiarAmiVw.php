<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\HorariosCopiarAmiVw;

/**
 *
 */
class SearchHorariosCopiarAmiVw extends HorariosCopiarAmiVw
{

  public function rules()
  {
    return[
      [['id','dia_mes'], 'integer'],
      [['image_id','instance_id','tipo','region_origen','region_destino','frecuencia','hora','descripcion','tag_name','tag_owner','tag_department'],'safe']
    ];
  }

  public function scenarios()
  {
    return Model::scenarios();
  }

  public function search($params)
  {
    $query = HorariosCopiarAmiVw::find();

    $dataProvider = new ActiveDataProvider([
      'query' => $query,
    ]);

    if (!(  $this ->load($params)&&$this->validate())) {
      return $dataProvider;
    }

    $query->andFilterWhere([
      'dia_mes' => $this->dia_mes,
      'id' => $this->id,
      'image_id' =>$this->image_id,
      'instance_id' => $this->instance_id,
      'tipo' => $this->tipo,
    ]);

    $query->andFilterWhere(['like', 'region_origen', $this->region_origen])
          ->andFilterWhere(['like', 'region_destino', $this->region_destino])
          ->andFilterWhere(['like', 'frecuencia', $this->frecuencia])
          ->andFilterWhere(['like', 'hora', $this->hora])
          ->andFilterWhere(['like', 'descripcion', $this->descripcion])
          ->andFilterWhere(['like', 'tag_name', $this->tag_name])
          ->andFilterWhere(['like', 'tag_owner', $this->tag_owner])
          ->andFilterWhere(['like', 'tag_department', $this->tag_department]);

          return $dataProvider;
  }
}
