<?php
namespace app\models;

use Yii;
use yii\base\Model;

/**
 * 
 */
class frmEditarGrupo extends Model
{
	public $id;
	public $grupo;
	public $descripcion;

	public function rules(){
		return [
			["id", "required"],
			["grupo", "required"],
			["descripcion", "required"],
		];
	}
}