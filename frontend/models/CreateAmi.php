<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace app\models;
use Yii;
use yii\base\Model;


class CreateAmi extends Model{
    public $tipo;
    public $frecuencia;
    public $dia;
    public $diaMes;
    public $hora;
    public $region;
    public $region_destino;
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
            ["diaMes",'required'],
            ["hora","required"],
            ["region","required"],
            ["region_destino","string"],
            ["instance","required"],
            ["encender","required"],
            ["apagar","required"],
            ["servidor","required"],
            ["estatus","required"],
            
        ];
    }
    
    
}
