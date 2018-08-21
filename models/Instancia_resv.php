<?php

namespace app\models;
use Yii;
use yii\db\ActiveRecord;

class Instancia_resv extends ActiveRecord{
    
    public static function getDb(){
        return Yii::$app->db;
    }
    
    public static function tableName(){
        return 'instancia_resv';
    }
    
}