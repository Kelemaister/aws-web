<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace app\models;
use Yii;
use yii\base\Model;


class ModelEncender extends Model{
    public $tipo;
    public $frecuencia;
    public $dia;
    public $region;
    public $instance;
    public $encender;
    public $apagar;
    public $servidor;
    public $estatus;
    
    public function rules()
    {
        return [
            ["tipo","required"],
            ["frecuencia","required"],
            ["dia","required"],
            ["region","required"],
            ["instance","required"],
            ["encender","required"],
            ["apagar","required"],
            ["servidor","required"],
            ["estatus","required"],
            
        ];
    }
    
    
}
