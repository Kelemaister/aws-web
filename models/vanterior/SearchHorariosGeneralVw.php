<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\HorariosGeneralVw;

/**
 *
 */
class SearchHorariosGeneralVw extends HorariosGeneralVw
{

  public function rules()
  {
    return[
      [['tipo', 'frecuencia','region','hora','servidor_procesos','estatus'], 'safe'],
    ];
  }

  public function scenarios()
  {
    return Model::scenarios();
  }

  /**
   * Creates data provider instance with search query applied
   *
   * @param array $params
   *
   * @return ActiveDataProvider
   */

  public function search($params)
  {
    $query = HorariosGeneralVw::find();

    $dataProviderG = new ActiveDataProvider([
      'query' => $query,
    ]);



    if (!($this->load($params)&&$this->validate())) {
      return $dataProviderG;
    }

    $query->andFilterWhere([
      'tipo' =>$this->tipo,
      'frecuencia' =>$this->frecuencia,
      'region' =>$this->region,
    ]);

    $query->andFilterWhere(['like', 'hora', $this->hora])
          ->andFilterWhere(['like', 'servidor_procesos', $this->servidor_procesos])
          ->andFilterWhere(['like', 'estatus', $this->estatus]);


          return $dataProviderG;
  }
}
