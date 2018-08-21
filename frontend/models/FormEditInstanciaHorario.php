<?php
namespace app\models;
use Yii;
use yii\base\Model;


class FormEditInstanciaHorario extends Model{
    public $dia;
    public $horaEncender;
    public $horaApagar;
    public $status;
    public $url;
    public $id;
    
    public function rules()
    {
        return [
            ["dia","required"],
            //["dia","verifica_dia"],
            ["horaEncender","required"],
            ["horaApagar","required"],
            ["status","required"],
            ["url","required"],            
            ["id","required"],            
        ];
    }
    
}
