<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Relaciones
 *
 * @author Enoc
 */
namespace app\models;
use Yii;
use yii\db\ActiveRecord;

class Relaciones extends ActiveRecord{
    //put your code here
    public static function getDb(){
        return Yii::$app->db;
    }
    
    public static function tableName(){
        return 'relacion';
    }
}
