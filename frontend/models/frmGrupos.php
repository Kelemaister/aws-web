<?php
namespace app\models;

use Yii;
use yii\base\Model;

/**
 * 
 */
class frmGrupos extends Model
{
	public $grupo;
	public $descripcion;

	public function rules(){
		return [
			["grupo", "required"],
			["descripcion", "required"],
		];
	}
}