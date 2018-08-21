<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AmisActivasVw;


/**
 *
 */
class SearchAmisActivasVw extends AmisActivasVw
{

  public function rules()
  {
    return[
      [['image_id','region','tipo','instance_running','nombre','fecha','descripcion',
        'tag_name','tag_owner','tag_department','instance_id','instance_name','instance_department',
        'instance_owner','estatus','size'],'safe']
    ];
  }

  public function scenario()
  {
    return Molde::scenarios();
  }

  public function search($params)
  {
    $query = AmisActivasVw::find();

    $dataProvider = new ActiveDataProvider([
      'query' =>$query,
    ]);

    if (!($this->load($params)&& $this->validate())) {
      return $dataProvider;
    }

    $query->andFilterWhere([
      'image_id'=> $this->image_id,
      'region'=> $this->region,
      'tipo'=> $this->tipo,
      'instance_running'=> $this->instance_running,
      'nombre'=> $this->nombre,
      'fecha'=> $this->fecha,
    ]);

    $query->andFilterWhere(['like','descripcion', $this->descripcion])
          ->andFilterWhere(['like','tag_name', $this->tag_name])
          ->andFilterWhere(['like','tag_owner', $this->tag_owner])
          ->andFilterWhere(['like','tag_department', $this->tag_department])
          ->andFilterWhere(['like','instance_id', $this->instance_id])
          ->andFilterWhere(['like','instance_name', $this->instance_name])
          ->andFilterWhere(['like','instance_department', $this->instance_department])
          ->andFilterWhere(['like','instance_owner', $this->instance_owner])
          ->andFilterWhere(['like','estatus', $this->estatus])
          ->andFilterWhere(['like','size', $this->size]);


          return $dataProvider;
  }
}
