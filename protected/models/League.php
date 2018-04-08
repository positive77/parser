<?php

Yii::import('application.models._base.BaseLeague');

class League extends BaseLeague
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
        
        public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Имя',
			'sport_id' => 'Вид спорта',
		);
	}
        
        public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('t.id',$this->id);
		$criteria->compare('t.name',$this->name,true);
		$criteria->with = array('sport');
                $criteria->compare( 'sport.name', $this->sport_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}