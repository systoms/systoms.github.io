<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Search\Menu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options'=>['class' => 'form-inline'],
    ]); ?>

    <?= Html::a('添加', ['create'], ['class' => 'btn btn-success']) ?>
    <?= $form->field($model, 'm_id') ?>

    <?= $form->field($model, 'pid') ?>

    <?= $form->field($model, 'icon') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'level') ?>

    <?php // echo $form->field($model, 'sort') ?>

    <?php // echo $form->field($model, 'is_menu') ?>

    <?php // echo $form->field($model, 's_id') ?>

    <?php // echo $form->field($model, 'p_u_id') ?>

    <?php // echo $form->field($model, 'modules') ?>

    <?php // echo $form->field($model, 'controllers') ?>

    <?php // echo $form->field($model, 'action') ?>

    <?php // echo $form->field($model, 'insert_date') ?>

    <?php // echo $form->field($model, 'update_date') ?>

    <div class="form-group">
        <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('重置', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
