<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace app\models;
use Yii;
use yii\db\ActiveRecord;

class BackupAmiOregon extends ActiveRecord{
    
    public static function getDb(){
        return Yii::$app->db2;
    }
    
    public static function tableName(){
        return 'ami_oregon';
    }
    
}
