<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "amis_activas_vw".
 *
 * @property string $image_id
 * @property string $region
 * @property string $tipo
 * @property string $instance_running
 * @property string $nombre
 * @property string $fecha
 * @property string $descripcion
 * @property string $tag_name
 * @property string $tag_owner
 * @property string $tag_department
 * @property string $instance_id
 * @property string $instance_name
 * @property string $instance_department
 * @property string $instance_owner
 * @property string $estatus
 * @property string $size
 */
class AmisActivasVw extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'amis_activas_vw';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image_id'], 'required'],
            [['fecha'], 'safe'],
            [['size'], 'integer'],
            [['image_id', 'region', 'instance_id'], 'string', 'max' => 15],
            [['tipo', 'estatus'], 'string', 'max' => 10],
            [['instance_running'], 'string', 'max' => 1],
            [['nombre', 'tag_owner', 'tag_department', 'instance_department', 'instance_owner'], 'string', 'max' => 50],
            [['descripcion'], 'string', 'max' => 200],
            [['tag_name', 'instance_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'image_id' => 'Image ID',
            'region' => 'Region',
            'tipo' => 'Tipo',
            'instance_running' => 'Instance Running',
            'nombre' => 'Nombre',
            'fecha' => 'Fecha',
            'descripcion' => 'Descripcion',
            'tag_name' => 'Tag Name',
            'tag_owner' => 'Tag Owner',
            'tag_department' => 'Tag Department',
            'instance_id' => 'Instance ID',
            'instance_name' => 'Instance Name',
            'instance_department' => 'Instance Department',
            'instance_owner' => 'Instance Owner',
            'estatus' => 'Estatus',
            'size' => 'Size',
        ];
    }
}
