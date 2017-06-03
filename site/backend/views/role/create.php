<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Role */

$this->title = '添加';
$this->params['breadcrumbs'][] = ['label' => '角色管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model,'name')->textInput(['maxlength'=>true])->hint('角色名称由小写字母开头，3-20位字符（a-z-_）组成')?>

        <?= $form->field($model,'description')->textarea(['rows'=>3])?>

        <div class="form-group">
            <?= Html::submitButton(Yii::$app->controller->action->id == 'create' ? '添加' : '保存', ['class' => Yii::$app->controller->action->id == 'create' ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
