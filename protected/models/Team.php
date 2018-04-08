<?php

Yii::import('application.models._base.BaseTeam');

class Team extends BaseTeam
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
        
        public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Имя',
		);
	}
}