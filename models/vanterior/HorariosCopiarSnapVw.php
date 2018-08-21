<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "horarios_copiar_snap_vw".
 *
 * @property integer $id
 * @property string $snapshot_id
 * @property string $volume_id
 * @property string $image_id
 * @property string $instance_id
 * @property string $snapshot_dev
 * @property string $tipo
 * @property string $region_origen
 * @property string $region_destino
 * @property string $frecuencia
 * @property integer $dia_mes
 * @property string $hora
 * @property string $descripcion
 * @property string $tag_name
 * @property string $tag_owner
 * @property string $tag_department
 */
class HorariosCopiarSnapVw extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'horarios_copiar_snap_vw';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'dia_mes'], 'integer'],
            [['volume_id'], 'required'],
            [['hora'], 'safe'],
            [['snapshot_id', 'volume_id', 'image_id', 'instance_id', 'region_origen', 'region_destino'], 'string', 'max' => 15],
            [['snapshot_dev'], 'string', 'max' => 30],
            [['tipo', 'frecuencia'], 'string', 'max' => 10],
            [['descripcion'], 'string', 'max' => 200],
            [['tag_name'], 'string', 'max' => 100],
            [['tag_owner', 'tag_department'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'snapshot_id' => 'Snapshot ID',
            'volume_id' => 'ID del volumen según amazon',
            'image_id' => 'Image ID',
            'instance_id' => 'Instance ID',
            'snapshot_dev' => 'Snapshot Dev',
            'tipo' => 'Tipo',
            'region_origen' => 'Region Origen',
            'region_destino' => 'Region Destino',
            'frecuencia' => 'Frecuencia',
            'dia_mes' => 'Dia Mes',
            'hora' => 'Hora',
            'descripcion' => 'Descripcion',
            'tag_name' => 'Tag Name',
            'tag_owner' => 'Tag Owner',
            'tag_department' => 'Tag Department',
        ];
    }
}
