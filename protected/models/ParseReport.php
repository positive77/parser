<?php

Yii::import('application.models._base.BaseParseReport');

class ParseReport extends BaseParseReport
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}