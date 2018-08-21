<?php
namespace app\models;
use Yii;
use yii\base\Model;

class UsuarioEditar extends Model{
    public $id;
    public $grupo;
    public $url;
    
    public function rules()
    {
        return [
            ["id","required"],
            ["grupo","required"],
            ["url","required"],
        ];
    }
}