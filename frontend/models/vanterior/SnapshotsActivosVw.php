<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "snapshots_activos_vw".
 *
 * @property string $snapshot_id
 * @property string $region
 * @property string $image_id
 * @property string $volume_id
 * @property string $instance_id
 * @property string $snapshot_dev
 * @property string $tipo
 * @property string $fecha
 * @property string $descripcion
 * @property string $tag_name
 * @property string $tag_owner
 * @property string $tag_department
 * @property string $estatus
 * @property string $vol_name
 * @property string $vol_department
 * @property string $vol_owner
 * @property string $inst_name
 * @property string $inst_department
 * @property string $inst_owner
 * @property string $size
 */
class SnapshotsActivosVw extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'snapshots_activos_vw';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha'], 'safe'],
            [['size'], 'integer'],
            [['snapshot_id', 'region', 'image_id', 'volume_id', 'instance_id'], 'string', 'max' => 15],
            [['snapshot_dev'], 'string', 'max' => 30],
            [['tipo', 'estatus'], 'string', 'max' => 10],
            [['descripcion'], 'string', 'max' => 200],
            [['tag_name', 'vol_name', 'inst_name'], 'string', 'max' => 100],
            [['tag_owner', 'tag_department', 'vol_department', 'vol_owner', 'inst_department', 'inst_owner'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'snapshot_id' => 'Snapshot ID',
            'region' => 'Region',
            'image_id' => 'Image ID',
            'volume_id' => 'Volume ID',
            'instance_id' => 'Instance ID',
            'snapshot_dev' => 'Snapshot Dev',
            'tipo' => 'Tipo',
            'fecha' => 'Fecha',
            'descripcion' => 'Descripcion',
            'tag_name' => 'Tag Name',
            'tag_owner' => 'Tag Owner',
            'tag_department' => 'Tag Department',
            'estatus' => 'Estatus',
            'vol_name' => 'Vol Name',
            'vol_department' => 'Vol Department',
            'vol_owner' => 'Vol Owner',
            'inst_name' => 'Inst Name',
            'inst_department' => 'Inst Department',
            'inst_owner' => 'Inst Owner',
            'size' => 'Size',
        ];
    }
}
