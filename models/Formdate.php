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

class Formdate extends Model{
    //put your code here
    public $instance;
    public $nombre;
    public $fechaon;
    public $horaon;
    public $fechaoff;
    public $horaoff;
    


    public function rules()
    {
        return [
           
            ["instance","required"],
            ["nombre","required"],
            ["fechaon","required"],
            ["horaon","required"],
            ["fechaoff","required"],
            ["horaoff","required"]
           
        ];
    }
     
     
    
}
