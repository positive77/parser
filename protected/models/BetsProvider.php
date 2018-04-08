<?php

Yii::import('application.models._base.BaseBetsProvider');

class BetsProvider extends BaseBetsProvider
{
        const LEONBETS = 1;
    
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}