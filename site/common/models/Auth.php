<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%auth}}".
 *
 * @property integer $a_id
 * @property integer $u_id
 * @property integer $r_id
 * @property integer $m_id
 * @property string $insert_date
 * @property string $update_date
 */
class Auth extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%auth}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['u_id', 'r_id', 'm_id'], 'integer'],
            [['insert_date', 'update_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'a_id' => 'A ID',
            'u_id' => '添加该项的用户id',
            'r_id' => 'R ID',
            'm_id' => '菜单id',
            'insert_date' => '添加时间',
            'update_date' => '修改时间',
        ];
    }
}
