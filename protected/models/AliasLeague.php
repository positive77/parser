<?php

Yii::import('application.models._base.BaseAliasLeague');

class AliasLeague extends BaseAliasLeague
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
        
        public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'alias' => 'Псевдоним',
			'league_id' => 'Лига',
		);
	}
}