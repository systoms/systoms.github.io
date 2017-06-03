<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%menu}}".
 *
 * @property integer $m_id
 * @property integer $pid
 * @property string $icon
 * @property string $title
 * @property integer $level
 * @property integer $sort
 * @property integer $is_menu
 * @property integer $s_id
 * @property integer $p_u_id
 * @property string $modules
 * @property string $controllers
 * @property string $action
 * @property string $insert_date
 * @property string $update_date
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%menu}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'level', 'sort', 'is_menu', 's_id', 'p_u_id'], 'integer'],
            [['insert_date', 'update_date'], 'safe'],
            [['icon', 'title', 'modules', 'controllers', 'action'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'm_id' => 'm_id',
            'pid' => '父级id',
            'icon' => '图标',
            'title' => '名称',
            'level' => '层级',
            'sort' => '排序',
            'is_menu' => '是否为菜单（1：是，2：不是）',
            's_id' => '站点id',
            'p_u_id' => '添加该项的用户id',
            'modules' => '模块',
            'controllers' => '控制器',
            'action' => '方法',
            'insert_date' => '写入时间',
            'update_date' => '修改时间',
        ];
    }
}
