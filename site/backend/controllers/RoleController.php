<?php
namespace backend\controllers;

use common\models\Role as RoleForm;
use yii\base\Exception;
use yii\helpers\ArrayHelper;
use yii\web\Controller;

class RoleController extends Controller
{
    use \backend\models\beforeAction;

    public function actionIndex(){
        $authManager = \Yii::$app->authManager;
        $roles = $authManager->getRoles();
        return $this->render('index',[
            'roles'=>$roles,
        ]);
    }

    public function actionCreate(){
        $model = new RoleForm();

        if($model->load(\Yii::$app->request->post()) && $model->save()){
            \Yii::$app->session->setFlash('success','角色['.$model->name.']添加成功');
            return $this->redirect(['/role/index']);
        }else{
            return $this->render('create',[
                'model'=>$model,
            ]);
        }
    }

    public function actionUpdate($name){
        $authManager = \Yii::$app->authManager;
        $child = $authManager->getChildren($name);
        if($child){
            \Yii::$app->session->setFlash('success','角色['.$name.']有用户,不能修改');
            return $this->redirect(['/role/index']);
        }

        $role = $authManager->getRole($name);
        if(!$role) return false;
        $model = new RoleForm();
        $model->name = $role->name;
        $model->description = $role->description;

        if($model->load(\Yii::$app->request->post()) && $model->update($name)){
            \Yii::$app->session->setFlash('success','角色['.$name.']修改成功');
            return $this->redirect(['/role/index']);
        }else{
            return $this->render('update',[
                'model'=>$model,
            ]);
        }
    }

    public function actionDelete($name){
        $authManager = \Yii::$app->authManager;
        $child = $authManager->getChildren($name);
        if($child){
            \Yii::$app->session->setFlash('success','节点['.$name.']有子节点,不能删除');
            return $this->redirect(['/node/index']);
        }
        $role = $authManager->getRole($name);
        if(!$role) return false;
        if($authManager->remove($role)){
            \Yii::$app->session->setFlash('success','节点['.$name.']删除成功');
        }else{
            \Yii::$app->session->setFlash('error','节点['.$name.']删除失败');
        }
        return $this->redirect(['/role/index']);
    }

    public function actionNode($name){
        $authManager = \Yii::$app->authManager;
        $role = $authManager->getRole($name);
        if(!$role){
            throw new Exception('节点未找到');
        }
        if(\Yii::$app->request->isPost){
            $nodes = \Yii::$app->request->post('node');
            $authManager->removeChildren($role);
            foreach($nodes as $v){
                $node = $authManager->getPermission($v);
                if(!$node)continue;
                $authManager->addChild($role,$node);
            }
            return $this->redirect(['/role/index']);
        }
        $roleNodes = $authManager->getPermissionsByRole($name);
        $roleNodes = array_keys($roleNodes);
        $nodes = $authManager->getPermissions();
        return $this->render('node',[
            'nodes'=>$nodes,
            'roleNodes'=>$roleNodes,
            'name'=>$name,
        ]);
    }

}