<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "horarios_instancia_vw".
 *
 * @property integer $id
 * @property string $tipo
 * @property string $frecuencia
 * @property string $diasemana
 * @property integer $dia_mes
 * @property string $hora
 * @property string $region
 * @property string $instance_id
 * @property string $balancer_id
 * @property string $tag_name
 * @property string $tag_owner
 * @property string $tag_department
 * @property string $encender
 * @property string $apagar
 * @property boolean $instance_reboot
 * @property string $servidor_procesos
 * @property string $last_backup
 * @property string $last_ami
 * @property string $instance_estatus
 * @property string $estatus
 */
class HorariosInstanciaVw extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'horarios_instancia_vw';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'dia_mes'], 'integer'],
            [['hora', 'encender', 'apagar', 'last_backup'], 'safe'],
            [['instance_reboot'], 'boolean'],
            [['tipo'], 'string', 'max' => 20],
            [['frecuencia', 'diasemana'], 'string', 'max' => 10],
            [['region', 'instance_id', 'balancer_id', 'servidor_procesos', 'last_ami'], 'string', 'max' => 15],
            [['tag_name'], 'string', 'max' => 100],
            [['tag_owner', 'tag_department'], 'string', 'max' => 50],
            [['instance_estatus', 'estatus'], 'string', 'max' => 1],
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
            'diasemana' => 'Diasemana',
            'dia_mes' => 'Dia Mes',
            'hora' => 'Hora',
            'region' => 'Region',
            'instance_id' => 'Instance ID',
            'balancer_id' => 'Balanceadores a los que pertence',
            'tag_name' => 'Tag Name',
            'tag_owner' => 'Tag Owner',
            'tag_department' => 'Tag Department',
            'encender' => 'Encender',
            'apagar' => 'Apagar',
            'instance_reboot' => 'Si debe reiniciarse la instancia cuando se respalda',
            'servidor_procesos' => 'Region para la que aplica el horario',
            'last_backup' => 'Fecha de ultimo respaldo',
            'last_ami' => 'ID de la ultima AMI de la instancia',
            'instance_estatus' => 'Estatus A-Activo X-Inactivo',
            'estatus' => 'Estatus del Horario. A=Activo X=Inactivo',
        ];
    }
}
