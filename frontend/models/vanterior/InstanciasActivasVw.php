<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "instancias_activas".
 *
 * @property string $instance_id
 * @property string $region
 * @property string $zone
 * @property string $balancer_id
 * @property string $tag_name
 * @property string $tag_owner
 * @property string $tag_department
 * @property string $tag_creator
 * @property string $tag_reservedid
 * @property string $instance_state
 * @property string $instance_type
 * @property boolean $valid_reservation
 * @property string $last_backup
 * @property string $last_backup_running
 * @property string $last_ami
 * @property string $last_ami_running
 * @property string $last_update
 * @property integer $ebs_optimized
 * @property integer $ebs_size
 * @property string $ip_address
 * @property string $private_ip_address
 * @property string $platform
 * @property boolean $sap_stopstart
 * @property string $sap_hostname
 * @property string $dns_hostname
 * @property string $estatus
 */
class InstanciasActivasVw extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'instancias_activas_vw';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['valid_reservation', 'sap_stopstart'], 'boolean'],
            [['last_backup', 'last_backup_running', 'last_update'], 'safe'],
            [['ebs_optimized', 'ebs_size'], 'integer'],
            [['instance_id', 'region', 'balancer_id', 'last_ami', 'last_ami_running'], 'string', 'max' => 15],
            [['zone', 'instance_state', 'instance_type', 'ip_address', 'private_ip_address', 'platform', 'sap_hostname'], 'string', 'max' => 20],
            [['tag_name'], 'string', 'max' => 100],
            [['tag_owner', 'tag_department'], 'string', 'max' => 50],
            [['tag_creator'], 'string', 'max' => 30],
            [['tag_reservedid'], 'string', 'max' => 45],
            [['dns_hostname'], 'string', 'max' => 60],
            [['estatus'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'instance_id' => 'Instance ID',
            'region' => 'Region',
            'zone' => 'Zone',
            'balancer_id' => 'Balancer ID',
            'tag_name' => 'Tag Name',
            'tag_owner' => 'Tag Owner',
            'tag_department' => 'Tag Department',
            'tag_creator' => 'Tag Creator',
            'tag_reservedid' => 'Tag Reservedid',
            'instance_state' => 'Instance State',
            'instance_type' => 'Instance Type',
            'valid_reservation' => 'Valid Reservation',
            'last_backup' => 'Last Backup',
            'last_backup_running' => 'Last Backup Running',
            'last_ami' => 'Last Ami',
            'last_ami_running' => 'Last Ami Running',
            'last_update' => 'Last Update',
            'ebs_optimized' => 'Ebs Optimized',
            'ebs_size' => 'Ebs Size',
            'ip_address' => 'Ip Address',
            'private_ip_address' => 'Private Ip Address',
            'platform' => 'Platform',
            'sap_stopstart' => 'Sap Stopstart',
            'sap_hostname' => 'Sap Hostname',
            'dns_hostname' => 'Dns Hostname',
            'estatus' => 'Estatus',
        ];
    }
}
