<?php

Yii::import('application.models._base.BaseBetType');

class BetType extends BaseBetType
{
        const MONEYLINE_1X2 = 1;
        const SPREAD = 2;
        const OVER_UNDER = 3;
        const DOUBLE_EXIT = 4;
        const MONEYLINE_12 = 5;
        
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}