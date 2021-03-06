<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "volumen".
 *
 * @property string $volume_id
 * @property string $region
 * @property string $instance_id
 * @property string $snapshot_id
 * @property string $tag_name
 * @property string $tag_department
 * @property string $tag_owner
 * @property string $status
 * @property integer $size
 * @property string $zone
 * @property string $type
 * @property string $iops
 * @property boolean $encrypted
 * @property boolean $delete_on_termination
 * @property string $attach_time
 * @property string $create_time
 * @property string $last_snapshot
 * @property string $last_snapshot_time
 * @property string $dispositivo
 * @property string $estatus
 * @property string $last_updated
 */
class Volumen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'volumen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['volume_id'], 'required'],
            [['size'], 'integer'],
            [['encrypted', 'delete_on_termination'], 'boolean'],
            [['attach_time', 'create_time', 'last_snapshot_time', 'last_updated'], 'safe'],
            [['volume_id', 'region', 'instance_id', 'snapshot_id', 'zone', 'type', 'iops', 'last_snapshot'], 'string', 'max' => 15],
            [['tag_name'], 'string', 'max' => 100],
            [['tag_department', 'tag_owner'], 'string', 'max' => 50],
            [['status'], 'string', 'max' => 10],
            [['dispositivo'], 'string', 'max' => 20],
            [['estatus'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'volume_id' => 'Volume ID',
            'region' => 'Region',
            'instance_id' => 'Instance ID',
            'snapshot_id' => 'Snapshot ID',
            'tag_name' => 'Tag Name',
            'tag_department' => 'Tag Department',
            'tag_owner' => 'Tag Owner',
            'status' => 'Status',
            'size' => 'Size',
            'zone' => 'Zone',
            'type' => 'Type',
            'iops' => 'Iops',
            'encrypted' => 'Encrypted',
            'delete_on_termination' => 'Delete On Termination',
            'attach_time' => 'Attach Time',
            'create_time' => 'Create Time',
            'last_snapshot' => 'Last Snapshot',
            'last_snapshot_time' => 'Last Snapshot Time',
            'dispositivo' => 'Dispositivo',
            'estatus' => 'Estatus',
            'last_updated' => 'Last Updated',
        ];
    }
}
