<?php

/**
 * This is the model class for table "league".
 *
 * The followings are the available columns in table 'league':
 * @property integer $id
 * @property string $name
 * @property integer $sport_id
 *
 * The followings are the available model relations:
 * @property AliasLeague[] $aliasLeagues
 * @property Event[] $events
 * @property Sport $sport
 */
class BaseLeague extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return League the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'league';
	}

	/**
	 * @return array validation rules for model attributes.
	 */ 
	 
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, sport_id', 'required'),
			array('sport_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, sport_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'aliasLeagues' => array(self::HAS_MANY, 'AliasLeague', 'league_id'),
			'events' => array(self::HAS_MANY, 'Event', 'league_id'),
			'sport' => array(self::BELONGS_TO, 'Sport', 'sport_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'sport_id' => 'Sport',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('sport_id',$this->sport_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}