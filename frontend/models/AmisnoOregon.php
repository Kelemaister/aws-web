<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AmisnoOregon
 *
 * @author Enoc
 */
namespace app\models;
use Yii;
use yii\db\ActiveRecord;

class AmisnoOregon extends ActiveRecord{
    //put your code here
    public static function getDb(){
        return Yii::$app->db;
    }
    
    public static function tableName(){
        return 'ami_solo_virginia';
    }
}
