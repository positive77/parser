<?php

Yii::import('application.models._base.BaseAliasTeam');

class AliasTeam extends BaseAliasTeam
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
        
        public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'alias' => 'Псевдоним',
			'team_id' => 'Команда',
		);
	}
}