<?php

/**
 * This is the model class for table "event".
 *
 * The followings are the available columns in table 'event':
 * @property integer $id
 * @property integer $team_home
 * @property integer $team_away
 * @property string $date
 * @property string $created
 * @property integer $league_id
 *
 * The followings are the available model relations:
 * @property League $league
 * @property Line[] $lines
 */
class BaseEvent extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Event the static model class
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
		return 'event';
	}

	/**
	 * @return array validation rules for model attributes.
	 */ 
	 
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('team_home, team_away, date, created, league_id', 'required'),
			array('team_home, team_away, league_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, team_home, team_away, date, created, league_id', 'safe', 'on'=>'search'),
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
			'league' => array(self::BELONGS_TO, 'League', 'league_id'),
			'lines' => array(self::HAS_MANY, 'Line', 'event_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'team_home' => 'Team Home',
			'team_away' => 'Team Away',
			'date' => 'Date',
			'created' => 'Created',
			'league_id' => 'League',
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
		$criteria->compare('team_home',$this->team_home);
		$criteria->compare('team_away',$this->team_away);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('league_id',$this->league_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}