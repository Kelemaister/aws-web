<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FormSearchDate
 *
 * @author Enoc
 */
namespace app\models;
use Yii;
use yii\base\Model;

class FormSearchDate extends Model{
    //put your code here
    public $date_1;
    
       public function rules()
    {
        return [
           
            ["date_1","required"]
            
        ];
    }
    
    public function attributeLabels()
    {
        return [
    
            'date_1' => "Fecha:"
        ];
    }
    
}
