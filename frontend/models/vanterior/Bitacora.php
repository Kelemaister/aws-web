<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bitacora".
 *
 * @property integer $id
 * @property string $reporte
 * @property string $tipo
 * @property string $fecha
 * @property string $descripcion
 * @property string $estatus
 * @property string $region_id
 * @property string $instance_id
 * @property string $image_id
 * @property string $volume_id
 * @property string $snapshot_id
 * @property string $region_id_dest
 * @property string $image_id_dest
 * @property string $snapshot_id_dest
 */
class Bitacora extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bitacora';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo', 'fecha'], 'required'],
            [['fecha'], 'safe'],
            [['reporte', 'descripcion'], 'string', 'max' => 100],
            [['tipo'], 'string', 'max' => 15],
            [['estatus', 'region_id', 'instance_id', 'image_id', 'volume_id', 'snapshot_id', 'region_id_dest', 'image_id_dest', 'snapshot_id_dest'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'reporte' => 'Reporte',
            'tipo' => 'Tipo',
            'fecha' => 'Fecha',
            'descripcion' => 'Descripcion del reporte',
            'estatus' => 'Estatus',
            'region_id' => 'Region ID',
            'instance_id' => 'ID de la instancia involucrada',
            'image_id' => 'ID de la imagen involucrada',
            'volume_id' => 'ID del Volumen involucrado',
            'snapshot_id' => 'ID del snapshot involucrado',
            'region_id_dest' => 'Region Id Dest',
            'image_id_dest' => 'Image Id Dest',
            'snapshot_id_dest' => 'Snapshot Id Dest',
        ];
    }
}
