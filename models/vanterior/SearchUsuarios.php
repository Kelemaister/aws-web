<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DefUsuario;

/**
 * SearchUsuarios represents the model behind the search form about `app\models\DefUsuario`.
 */
class SearchUsuarios extends DefUsuario
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'hotel', 'password', 'NoColaborador', 'tittle', 'name', 'estado', 'fecha_creacion'], 'safe'],
            [['Def_TipoUsuario_id_tipousuario'], 'integer'],
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
        $query = DefUsuario::find();

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
            'Def_TipoUsuario_id_tipousuario' => $this->Def_TipoUsuario_id_tipousuario,
            'fecha_creacion' => $this->fecha_creacion,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'hotel', $this->hotel])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'NoColaborador', $this->NoColaborador])
            ->andFilterWhere(['like', 'tittle', $this->tittle])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'estado', $this->estado]);

        return $dataProvider;
    }
}
