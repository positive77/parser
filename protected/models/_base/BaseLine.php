<?php

/**
 * This is the model class for table "line".
 *
 * The followings are the available columns in table 'line':
 * @property integer $id
 * @property double $team_home
 * @property double $draw
 * @property double $team_away
 * @property integer $event_id
 * @property double $count_points
 * @property integer $bet_type_id
 * @property string $created
 * @property string $updated
 *
 * The followings are the available model relations:
 * @property Event $event
 * @property BetType $betType
 */
class BaseLine extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Line the static model class
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
		return 'line';
	}

	/**
	 * @return array validation rules for model attributes.
	 */ 
	 
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('team_home, team_away, event_id, bet_type_id, created, updated', 'required'),
			array('event_id, bet_type_id', 'numerical', 'integerOnly'=>true),
			array('team_home, draw, team_away, count_points', 'numerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, team_home, draw, team_away, event_id, count_points, bet_type_id, created, updated', 'safe', 'on'=>'search'),
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
			'event' => array(self::BELONGS_TO, 'Event', 'event_id'),
			'betType' => array(self::BELONGS_TO, 'BetType', 'bet_type_id'),
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
			'draw' => 'Draw',
			'team_away' => 'Team Away',
			'event_id' => 'Event',
			'count_points' => 'Count Points',
			'bet_type_id' => 'Bet Type',
			'created' => 'Created',
			'updated' => 'Updated',
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
		$criteria->compare('draw',$this->draw);
		$criteria->compare('team_away',$this->team_away);
		$criteria->compare('event_id',$this->event_id);
		$criteria->compare('count_points',$this->count_points);
		$criteria->compare('bet_type_id',$this->bet_type_id);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}