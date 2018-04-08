<?php

/**
 * This is the model class for table "parse_report".
 *
 * The followings are the available columns in table 'parse_report':
 * @property integer $id
 * @property integer $bet_provider_id
 * @property string $body
 * @property integer $count_updated
 * @property integer $count_created
 * @property string $date
 *
 * The followings are the available model relations:
 * @property BetsProvider $betProvider
 */
class BaseParseReport extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ParseReport the static model class
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
		return 'parse_report';
	}

	/**
	 * @return array validation rules for model attributes.
	 */ 
	 
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('bet_provider_id, count_updated, count_created, date', 'required'),
			array('bet_provider_id, count_updated, count_created', 'numerical', 'integerOnly'=>true),
			array('body', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, bet_provider_id, body, count_updated, count_created, date', 'safe', 'on'=>'search'),
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
			'betProvider' => array(self::BELONGS_TO, 'BetsProvider', 'bet_provider_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'bet_provider_id' => 'Bet Provider',
			'body' => 'Body',
			'count_updated' => 'Count Updated',
			'count_created' => 'Count Created',
			'date' => 'Date',
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
		$criteria->compare('bet_provider_id',$this->bet_provider_id);
		$criteria->compare('body',$this->body,true);
		$criteria->compare('count_updated',$this->count_updated);
		$criteria->compare('count_created',$this->count_created);
		$criteria->compare('date',$this->date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}