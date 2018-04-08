<?php

Yii::import('application.models._base.BaseSport');

class Sport extends BaseSport
{
        const SOCCER = 1;
        const BASKETBALL = 2;
        const TENNIS = 3;
    
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}