<?php
namespace app\models;
use Yii;
use yii\base\Model;
use app\models\Users;

class FormRegister extends Model{
 
    public $username;
    public $colaborador;
    public $password;
    public $password_repeat;
    public $grupo;
    public function rules()
    {
        return [
            ['username', 'username_existe', 'message'=>'El usuario ya existe'],
            ["username","required"],
            ["colaborador","required"],
            ["colaborador","integer"],
            ["colaborador","col_existe"],
            ["password","required"],
            ["password","string", "min"=>7],
            ["password_repeat", 'compare', 'compareAttribute' => 'password', 'message' => 'Las contraseñas no coinciden'],
            ["grupo","required"],
            
            /*[['username', 'colaborador', 'password', 'password_repeat'], 'required', 'message' => 'Campo requerido'],
            ['username', 'match', 'pattern' => "/^.{3,50}$/", 'message' => 'Mínimo 3 y máximo 50 caracteres'],
            ['username', 'match', 'pattern' => "/^[0-9a-z]+$/i", 'message' => 'Sólo se aceptan letras y números'],
            ['username', 'username_existe'],
            ['colaborador', 'string', 'message' => 'Formato no válido'],
            ['password', 'match', 'pattern' => "/^.{8,16}$/", 'message' => 'Mínimo 6 y máximo 16 caracteres'],
            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => 'Los passwords no coinciden'],
            ['grupo', 'required'],
            
            */
        ];
        
    }
    
    public function col_existe($attribute, $params)
    {
  
  //Buscar el numero de colaborador en la tabla
  $table = Users::find()->where("colaborador=:colaborador", [":colaborador" => $this->colaborador]);
  
  //Si el numero de colaborador existe mostrar el error
  if ($table->count() == 1)
  {
                $this->addError($attribute, "El colaborador seleccionado tiene cuenta registrada");
  }
    }
 
    public function username_existe($attribute, $params)
    {
  //Buscar el username en la tabla
  $table = Users::find()->where("username=:username", [":username" => $this->username]);
  
  //Si el username existe mostrar el error
  if ($table->count() == 1)
  {
                $this->addError($attribute, "El usuario seleccionado existe");
  }
    }
 
}