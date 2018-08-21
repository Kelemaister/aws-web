<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace app\models;
use Yii;
use yii\base\Model;


class newproces extends Model{
    public $tipo;
    public $frecuencia;
    public $dia;
    public $diaMes;
    public $hora;
    public $region;
    public $region_destino;
    public $instance;
    public $volumen;
     public $encender;
    public $apagar;
    public $instance_reboot;
    public $servidor;
    public $estatus;
    
    public function rules()
    {
        return [
             
            ["tipo","required"],
            ["frecuencia","required"],
            ["dia","required"],
            ["diaMes",'required'],
            ["hora","required"],
            ["region","required"],
            ["region_destino","string"],
            ["instance","string"],
            ["volumen","string"],
            ["encender","required"],
            ["apagar","required"],
            ["instance_reboot","required"],
            ["servidor","required"],
            ["estatus","required"],
            
        ];
    }
    
    
}
