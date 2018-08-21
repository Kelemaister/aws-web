<?php
namespace app\models;
use Yii;
use yii\base\Model;

class FormSearch extends Model{
    public $q;
    //public $url;
    
    public function rules()
    {
        return [
            ["q","required"],
            //["url","required"],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'q' => "Buscar:",
        ];
    }   
}