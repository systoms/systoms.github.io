<?php

namespace backend\models;
use Yii;
/**
 * Created by PhpStorm.
 * User: systom
 * Date: 2017/6/2
 * Time: 15:16
 */
trait beforeAction
{
    public function beforeAction($action)
    {
        $action = Yii::$app->controller->action->id;
        if(\Yii::$app->user->can($action)){
            return true;
        }else{
//            throw new \Exception('对不起，您现在还没获此操作的权限');
            return true;
        }
    }
}