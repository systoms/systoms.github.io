<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\helpers\Html;
/**
 * This is the model class for table "{{%role}}".
 *
 * @property integer $u_id
 * @property string $title
 * @property string $remark
 * @property string $insert_date
 * @property string $update_date
 */
class Role extends Model
{

    public $name;
    public $description;

    public function rules(){
        return [
            [['name'],'string','max'=>20],
            [['name','description'],'required'],
            ['name','match','pattern'=>'/^[a-z][a-z-_]{2,20}$/','message'=>'name属性不合法'],
            ['description','filter','filter'=>function($value){
                return Html::encode($value);
            }],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%auth_item}}';
    }

    public function attributeLabels(){
        return [
            'name'=>'角色名称',
            'description'=>'角色描述',
        ];
    }

    public function save(){
        if($this->validate()){
            $authManager = Yii::$app->authManager;
            $role = $authManager->createRole($this->name);
            $role->description = $this->description;
            $authManager->add($role);
            return true;
        }else{
            return false;
        }
    }

    public function update($name){
        if($this->validate()){
            $authManager = Yii::$app->authManager;
            $role = $authManager->getRole($name);
            if(!$role) return false;
            $authManager->remove($role);

            $role = $authManager->createRole($this->name);
            $role->description = $this->description;
            $authManager->add($role);
            return true;
        }
        return false;
    }

}
