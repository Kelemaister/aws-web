<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "horarios_volumen_vw".
 *
 * @property integer $id
 * @property string $tipo
 * @property string $frecuencia
 * @property string $region
 * @property string $volume_id
 * @property string $instance_id
 * @property string $dispositivo
 * @property string $tag_name
 * @property string $tag_owner
 * @property string $tag_department
 * @property string $last_snapshot
 * @property string $last_snapshot_time
 * @property integer $dia
 * @property string $diasemana
 * @property string $hora
 * @property string $servidor_procesos
 * @property string $volume_status
 * @property string $volume_last_updated
 * @property string $estatus
 */
class HorariosVolumenVw extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'horarios_volumen_vw';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['last_snapshot_time', 'volume_last_updated'], 'safe'],
            [['id','dia'], 'integer'],
            [['tipo', 'dispositivo'], 'string', 'max' => 20],
            [['frecuencia', 'diasemana'], 'string', 'max' => 10],
            [['region', 'volume_id', 'instance_id', 'last_snapshot', 'servidor_procesos'], 'string', 'max' => 15],
            [['tag_name'], 'string', 'max' => 100],
            [['tag_owner', 'tag_department'], 'string', 'max' => 50],
            [['hora'], 'string', 'max' => 29],
            [['volume_status', 'estatus'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipo' => 'Tipo',
            'frecuencia' => 'Frecuencia',
            'region' => 'Region',
            'volume_id' => 'Volume ID',
            'instance_id' => 'Instance ID',
            'dispositivo' => 'Dispositivo',
            'tag_name' => 'Tag Name',
            'tag_owner' => 'Tag Owner',
            'tag_department' => 'Tag Department',
            'last_snapshot' => 'Last Snapshot',
            'last_snapshot_time' => 'Last Snapshot Time',
            'dia' => 'Dia',
            'diasemana' => 'Diasemana',
            'hora' => 'Hora',
            'servidor_procesos' => 'Region para la que aplica el horario',
            'volume_status' => 'Estatus del Volumen X=Inactivo A=Activo',
            'volume_last_updated' => 'Volume Last Updated',
            'estatus' => 'Estatus del Horario. A=Activo X=Inactivo',
        ];
    }
}
