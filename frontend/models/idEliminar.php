<?php
namespace app\models;
use Yii;
use yii\base\Model;

class idEliminar extends Model{
    public $url;
    public $id;

    public function rules()
    {
        return [
            ["url","required"],         
            ["id","required"],           
        ];
    }
}