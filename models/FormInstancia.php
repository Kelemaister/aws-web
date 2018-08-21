<?php
namespace app\models;
use Yii;
use yii\base\Model;
class FormInstancia extends Model{
    
    public $instancia;
    public $action;
    public $urlActual;

    public function rules()
    {
        return [
            ["instancia","required"],
            ["action","required"],
            ["urlActual","required"],
            
        ];
    }
    
    
    
   
}