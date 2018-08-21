<?php

namespace app\models;
use Yii;
use yii\db\ActiveRecord;

class BackupVolume extends ActiveRecord{
    
    public static function getDb(){
        return Yii::$app->db2;
    }
    
    public static function tableName(){
        return 'volumen';
    }
    
}