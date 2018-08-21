<?php
namespace app\models;
use Yii;
use yii\base\Model;
use app\models\Users;

class FormEditar extends Model{
 
    public $id;
    public $usuario;
    public $numero_colaborador;
    public $grupo;
    public $contra_actual;
    public $contra_nueva;
    public $check;
    public $url;

    public function rules()
    {
        return [
            ["id", "required"],
            ["usuario","required"],
            ["numero_colaborador","required"],
            ["numero_colaborador","integer"],
            ["grupo","required"],
            ["contra_actual","string", "min"=>7],
            ["contra_actual","required"],
            ["contra_nueva", "string", "min"=>7],
            ["contra_nueva", "default"],
            ["url", "required"],
            /*[["contra_actual", "contra_nueva"], "required", "when"=>function($model){
              return $model->drop == 1;
            }, 'whenClient' => "function (attribute, value) {
                  return $('#dropContra').val() == 1;
                }",]*/
        ];
        
    }

    public function attributeLabels(){
      return [
        'contra_actual'=>'Contraseña Actual',
        'contra_nueva'=>'Contraseña Nueva',
        'check'=>false,
      ];
    }
}