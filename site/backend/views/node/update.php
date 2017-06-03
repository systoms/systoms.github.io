<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Role */

$this->title = '编辑';
$this->params['breadcrumbs'][] = ['label' => '角色管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'name' => $model->name]];
$this->params['breadcrumbs'][] = '编辑';
?>
<div class="box">
    <div class="box-body">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model,'name')->textInput(['maxlength'=>true,'value'=>$model->name])->hint('节点名称由小写字母开头，3-20位字符（小写字母-_）组成')?>

        <?= $form->field($model,'description')->textarea(['rows'=>3,'value'=>$model->description])?>

        <?= $form->field($model,'parent')->textInput(['maxlength'=>true,'parent'=>$model->parent])->hint('节点名称由小写字母开头，3-20位字符（a-z-_）组成')?>

        <div class="form-group">
            <?= Html::submitButton(Yii::$app->controller->action->id == 'create' ? '添加' : '保存', ['class' => Yii::$app->controller->action->id == 'create' ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
