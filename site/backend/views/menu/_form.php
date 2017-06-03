<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Menu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php if($model->isNewRecord && intval(Yii::$app->getRequest()->get('pid'))): ?>
        <?= $form->field($model, 'pid')->hiddenInput(['value'=>intval(Yii::$app->getRequest()->get('pid'))]) ?>
    <?php elseif($model->isNewRecord): ?>
        <?= $form->field($model, 'pid')->textInput() ?>
    <?php endif; ?>

    <?= $form->field($model, 'icon')->widget('common\widgets\Icon') ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'level')->textInput() ?>

    <?= $form->field($model, 'sort')->textInput() ?>

    <?= $form->field($model, 'is_menu')->dropDownList(['1' => '是', '2' => '不是']); ?>

    <?= $form->field($model, 'modules')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'controllers')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'action')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '保存', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>