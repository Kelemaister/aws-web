<?php
namespace app\models;
use Yii;
use yii\base\Model;
class ConfirmarEliminacion extends Model{
    public $id;
    public $proceso;
    


    public function rules()
    {
        return [
            ["id","required"],
            ["proceso","required"],
            
        ];
    }
    
    
    
   
}

