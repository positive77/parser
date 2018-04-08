<?php

Yii::import('application.models._base.BaseBannedLeague');

class BannedLeague extends BaseBannedLeague
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}