<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Search\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options'=>['class' => 'form-inline'],
        // 'fieldConfig' => [  //统一修改字段的模板
        //     'template' => "{label}\n<div class=\"col-lg-5\">{input}</div>\n<div class=\"col-lg-3\">{error}</div>", 
        //     'labelOptions' => ['class' => 'col-lg-2 control-label'],  //修改label的样式
        // ],
    ]); ?>

    <?= Html::a('创建', ['create'], ['class' => 'btn btn-success']) ?>

    <?= $form->field($model, 'u_id') ?>

    <?= $form->field($model, 'r_id') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'avatar') ?>

    <?= $form->field($model, 'nickname') ?>

    <?php // echo $form->field($model, 'sex') ?>

    <div class="form-group">
        <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('重置', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
