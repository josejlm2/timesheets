<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "time".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $date
 * @property string $arrival
 * @property string $lunch_start
 * @property string $lunch_end
 * @property string $departure
 * @property integer $total
 */
class Time extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'time';
    }

    public function behaviors()
          {
              return [            
                  [
                      'class' => BlameableBehavior::className(),
                      'createdByAttribute' => 'user_id',
                      'updatedByAttribute' => 'user_id',
                  ],
              ];
          }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'total'], 'integer'],
            [['date', 'arrival', 'lunch_start', 'lunch_end', 'departure'], 'safe'],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'date' => 'Date',
            'arrival' => 'Arrival',
            'lunch_start' => 'Lunch Start',
            'lunch_end' => 'Lunch End',
            'departure' => 'Departure',
            'total' => 'Total',
        ];
    }
}
