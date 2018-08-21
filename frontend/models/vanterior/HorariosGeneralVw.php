<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "horarios_general_vw".
 *
 * @property string $tipo
 * @property string $frecuencia
 * @property string $region
 * @property string $hora
 * @property string $servidor_procesos
 * @property string $estatus
 */
class HorariosGeneralVw extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'horarios_general_vw';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo'], 'string', 'max' => 20],
            [['frecuencia'], 'string', 'max' => 10],
            [['region', 'servidor_procesos'], 'string', 'max' => 15],
            [['hora'], 'string', 'max' => 29],
            [['estatus'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tipo' => 'Tipo',
            'frecuencia' => 'Frecuencia',
            'region' => 'Region',
            'hora' => 'Hora',
            'servidor_procesos' => 'Region para la que aplica el horario',
            'estatus' => 'Estatus del Horario. A=Activo X=Inactivo',
        ];
    }
}
