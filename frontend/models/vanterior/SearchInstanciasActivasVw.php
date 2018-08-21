<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\InstanciasActivasVw;


class SearchInstanciasActivasVw extends InstanciasActivasVw
{

  public function rules()
  {
    return[
      [['ebs_optimized','ebs_size'], 'integer'],
      [['instance_id','region','zone','balancer_id','tag_name','tag_owner','tag_department','tag_creator','tag_reservedid',
      'instance_state','instance_type','last_backup','last_backup_running','last_ami','last_ami_running','last_update',
      'ip_address','private_ip_address','platform','sap_hostname','dns_hostname','estatus'], 'safe'],
      [['valid_reservation','sap_stopstart'], 'boolean']
    ];
  }

  public function scenarios()
  {
    return Model::scenarios();
  }

  public function search($params)
  {
    $query = InstanciasActivasVw::find();
    $dataProvider = new ActiveDataProvider([
      'query' => $query,
    ]);

    if (!($this->load($params) && $this->validate())) {
      return $dataProvider;
    }

    $query->andFilterWhere([
      'ebs_optimized' => $this->ebs_optimized,
      'ebs_size' => $this->ebs_size,
      'valid_reservation' => $this->valid_reservation,
      'instance_id' => $this->instance_id,
      'region' => $this->region,
      'zone' => $this->zone,
      'balancer_id' => $this->balancer_id,
      'tag_name' => $this->tag_name,
      'tag_owner' => $this->tag_owner,
    ]);

    $query->andFilterWhere(['like','tag_department',$this->tag_department])
          ->andFilterWhere(['like','tag_creator',$this->tag_creator])
          ->andFilterWhere(['like','tag_reservedid',$this->tag_reservedid])
          ->andFilterWhere(['like','instance_state',$this->instance_state])
          ->andFilterWhere(['like','instance_type', $this->instance_type])
          ->andFilterWhere(['like','last_backup',$this->last_backup])
          ->andFilterWhere(['like','last_backup_running', $this->last_backup_running])
          ->andFilterWhere(['like','last_ami',$this->last_ami])
          ->andFilterWhere(['like','last_ami_running',$this->last_ami_running])
          ->andFilterWhere(['like','last_update',$this->last_update])
          ->andFilterWhere(['like','ip_address',$this->ip_address])
          ->andFilterWhere(['like','private_ip_address',$this->private_ip_address])
          ->andFilterWhere(['like','platform',$this->platform])
          ->andFilterWhere(['like','sap_stopstart',$this->sap_stopstart])
          ->andFilterWhere(['like','sap_hostname',$this->sap_hostname])
          ->andFilterWhere(['like','dns_hostname',$this->dns_hostname])
          ->andFilterWhere(['like','estatus',$this->estatus]);

          return$dataProvider;
  }
}
