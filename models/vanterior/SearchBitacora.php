<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Bitacora;

/**
 * SearchBitacora represents the model behind the search form about `app\models\Bitacora`.
 */
class SearchBitacora extends Bitacora
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['reporte', 'tipo', 'fecha', 'descripcion', 'estatus', 'region_id', 'instance_id', 'image_id', 'volume_id', 'snapshot_id', 'region_id_dest', 'image_id_dest', 'snapshot_id_dest'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
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
        $query = Bitacora::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'fecha' => $this->fecha,
        ]);

        $query->andFilterWhere(['like', 'reporte', $this->reporte])
            ->andFilterWhere(['like', 'tipo', $this->tipo])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'estatus', $this->estatus])
            ->andFilterWhere(['like', 'region_id', $this->region_id])
            ->andFilterWhere(['like', 'instance_id', $this->instance_id])
            ->andFilterWhere(['like', 'image_id', $this->image_id])
            ->andFilterWhere(['like', 'volume_id', $this->volume_id])
            ->andFilterWhere(['like', 'snapshot_id', $this->snapshot_id])
            ->andFilterWhere(['like', 'region_id_dest', $this->region_id_dest])
            ->andFilterWhere(['like', 'image_id_dest', $this->image_id_dest])
            ->andFilterWhere(['like', 'snapshot_id_dest', $this->snapshot_id_dest]);

        return $dataProvider;
    }
}
