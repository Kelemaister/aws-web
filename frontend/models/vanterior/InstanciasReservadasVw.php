<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "instancias_reservadas_vw".
 *
 * @property string $region
 * @property string $zone
 * @property string $instance_type
 * @property string $platform
 * @property string $tag_name
 * @property string $instance_state
 * @property string $instance_id
 * @property boolean $valid_reservation
 * @property string $resv_id
 * @property string $resv_region
 * @property string $resv_zone
 * @property string $resv_instance_type
 * @property string $resv_state
 * @property string $resv_platform
 * @property string $resv_instance_count
 */
class InstanciasReservadasVw extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'instancias_reservadas_vw';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['valid_reservation'], 'boolean'],
            [['resv_instance_count'], 'integer'],
            [['region', 'instance_id', 'resv_region', 'resv_state'], 'string', 'max' => 15],
            [['zone', 'instance_type', 'platform', 'instance_state', 'resv_zone', 'resv_instance_type'], 'string', 'max' => 20],
            [['tag_name', 'resv_platform'], 'string', 'max' => 100],
            [['resv_id'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'region' => 'Region',
            'zone' => 'Zone',
            'instance_type' => 'Instance Type',
            'platform' => 'Platform',
            'tag_name' => 'Tag Name',
            'instance_state' => 'Instance State',
            'instance_id' => 'Instance ID',
            'valid_reservation' => 'Valid Reservation',
            'resv_id' => 'Resv ID',
            'resv_region' => 'Resv Region',
            'resv_zone' => 'Resv Zone',
            'resv_instance_type' => 'Resv Instance Type',
            'resv_state' => 'Resv State',
            'resv_platform' => 'Resv Platform',
            'resv_instance_count' => 'Resv Instance Count',
        ];
    }
}
