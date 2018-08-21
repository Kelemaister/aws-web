<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Def_TipoUsuario".
 *
 * @property integer $id_tipousuario
 * @property string $detalle
 *
 * @property DefUsuario[] $defUsuarios
 */
class DefTipoUsuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Def_TipoUsuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['detalle'], 'required'],
            [['detalle'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tipousuario' => 'Id Tipousuario',
            'detalle' => 'Detalle',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDefUsuarios()
    {
        return $this->hasMany(DefUsuario::className(), ['Def_TipoUsuario_id_tipousuario' => 'id_tipousuario']);
    }
}
