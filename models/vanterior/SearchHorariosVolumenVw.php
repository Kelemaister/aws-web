<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\HorariosVolumenVw;

  /**
   *
   */
  class SearchHorariosVolumenVw extends HorariosVolumenVw
  {

    public function rules()
    {
      return [
        [['id','dia',], 'integer'],
        [['tipo','frecuencia','region','volume_id','instance_id','dispositivo','tag_name','tag_owner','tag_department','last_snapshot','last_snapshot_time','diasemana','hora',
        'servidor_procesos','volume_status','volume_last_updated','estatus'], 'safe'],
      ];
    }

    public function scenarios()
    {
      return Model::scenarios();
    }

    public function search($params)
    {
      $query = HorariosVolumenVw::find();

      $dataProvider = new ActiveDataProvider([
        'query'  => $query,
      ]);



      if (!($this->load($params) && $this->validate())) {
          return $dataProvider;
      }

        $query->andFilterWhere([
          'id' => $this->id,
          'tipo' => $this->tipo,
          'frecuencia' => $this->frecuencia,
          'dia' => $this->dia,
          'region' => $this->region,
        ]);

        $query->andFilterWhere(['like', 'volume_id', $this->volume_id])
            ->andFilterWhere(['like', 'instance_id', $this->instance_id])
            ->andFilterWhere(['like', 'dispositivo', $this->dispositivo])
            ->andFilterWhere(['like', 'tag_name', $this->tag_name])
            ->andFilterWhere(['like', 'tag_owner', $this->tag_owner])
            ->andFilterWhere(['like', 'tag_department', $this->tag_department])
            ->andFilterWhere(['like', 'last_snapshot', $this->last_snapshot])
            ->andFilterWhere(['like', 'last_snapshot_time', $this->last_snapshot_time])
            ->andFilterWhere(['like', 'diasemana', $this->diasemana])
            ->andFilterWhere(['like', 'hora', $this->hora])
            ->andFilterWhere(['like', 'servidor_procesos', $this->servidor_procesos])
            ->andFilterWhere(['like', 'volume_status', $this->volume_status])
            ->andFilterWhere(['like', 'volume_last_updated', $this->volume_last_updated])
            ->andFilterWhere(['like', 'estatus', $this->estatus]);


        return $dataProvider;
    }
  }
