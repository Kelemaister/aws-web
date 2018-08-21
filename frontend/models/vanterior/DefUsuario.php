<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Def_Usuario".
 *
 * @property string $username
 * @property integer $Def_TipoUsuario_id_tipousuario
 * @property string $hotel
 * @property string $password
 * @property string $NoColaborador
 * @property string $tittle
 * @property string $name
 * @property string $estado
 * @property string $fecha_creacion
 *
 * @property DefTipoUsuario $defTipoUsuarioIdTipousuario
 */
class DefUsuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Def_Usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'Def_TipoUsuario_id_tipousuario'], 'required'],
            [['Def_TipoUsuario_id_tipousuario'], 'integer'],
            [['fecha_creacion'], 'safe'],
            [['username', 'password', 'tittle', 'name'], 'string', 'max' => 45],
            [['hotel'], 'string', 'max' => 6],
            [['NoColaborador'], 'string', 'max' => 10],
            [['estado'], 'string', 'max' => 1],
            [['Def_TipoUsuario_id_tipousuario'], 'exist', 'skipOnError' => true, 'targetClass' => DefTipoUsuario::className(), 'targetAttribute' => ['Def_TipoUsuario_id_tipousuario' => 'id_tipousuario']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => yii::t('app','Username:'),
            'Def_TipoUsuario_id_tipousuario' => yii::t('app','Tipo de usuario:'),
            'hotel' => yii::t('app','Hotel:'),
            'password' => yii::t('app','Contraseña:'),
            'NoColaborador' => yii::t('app','No. Colaborador:'),
            'tittle' => yii::t('app','Tittle'),
            'name' => yii::t('app','Nombre Completo:'),
            'estado' => yii::t('app','Estado:'),
            'fecha_creacion' => yii::t('app','Fecha Creacion:'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDefTipoUsuarioIdTipousuario()
    {
        return $this->hasOne(DefTipoUsuario::className(), ['id_tipousuario' => 'Def_TipoUsuario_id_tipousuario']);
    }
}
