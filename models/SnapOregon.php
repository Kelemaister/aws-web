<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace app\models;
use Yii;
use yii\db\ActiveRecord;

class SnapOregon extends ActiveRecord{
    
    public static function getDb(){
        return Yii::$app->db;
    }
    
    public static function tableName(){
        return 'snap_oregon';
    }
    
}
