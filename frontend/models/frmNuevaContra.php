<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * 
 */
class frmNuevaContra extends Model
{
	public $username;
	public $contraseña;

	public function rules(){
		return [
			["username", "required"],
			["contraseña", "string", "min"=>7],
			["contraseña", "required"],
		];
	}
}