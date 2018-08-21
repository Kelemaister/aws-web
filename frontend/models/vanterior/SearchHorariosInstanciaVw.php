<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\HorariosInstanciaVw;


/**
 *
 */
class SearchHorariosInstanciaVw extends HorariosInstanciaVw
{

  public function rules()
  {
    return[
      [['id','dia_mes'], 'integer'],
      [['tipo','frecuencia','diasemana','hora','region','instance_id','balancer_id','tag_name','tag_owner','tag_department','encender','apagar',
      'servidor_procesos','last_backup','last_ami','instance_estatus','estatus'], 'safe'],
      [['instance_reboot'], 'boolean']
    ];
  }

  public function scenarios()
  {
    return Model::scenarios();
  }

  public function search($params)
  {
    $query = HorariosInstanciaVw::find();

    $dataProvider = new ActiveDataProvider([
      'query' => $query,
    ]);

    

    if (!($this->load($params) && $this->validate())) {
      return $dataProvider;
    }

    $query->andFilterWhere([
      'id' => $this->id,
      'tipo' => $this->tipo,
      'frecuencia' => $this->frecuencia,
      'diasemana'=> $this->diasemana,
      'dia_mes' => $this->dia_mes,
      'region' => $this->region,
      'instance_reboot' => $this->instance_reboot,

    ]);

    $query->andFilterWhere(['like', 'hora', $this->hora])
          ->andFilterWhere(['like', 'instance_id', $this->instance_id])
          ->andFilterWhere(['like', 'balancer_id', $this->balancer_id])
          ->andFilterWhere(['like', 'tag_name', $this->tag_name])
          ->andFilterWhere(['like', 'tag_owner', $this->tag_owner])
          ->andFilterWhere(['like', 'tag_department', $this->tag_department])
          ->andFilterWhere(['like', 'enceder', $this->encender])
          ->andFilterWhere(['like', 'apagar', $this->apagar])
          ->andFilterWhere(['like', 'servidor_procesos', $this->servidor_procesos])
          ->andFilterWhere(['like', 'last_backup', $this->last_backup])
          ->andFilterWhere(['like', 'last_ami', $this->last_ami])
          ->andFilterWhere(['like', 'instance_estatus', $this->instance_estatus])
          ->andFilterWhere(['like', 'estatus', $this->estatus]);


          return $dataProvider;
  }
}
