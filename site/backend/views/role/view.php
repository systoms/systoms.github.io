<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Role */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '角色管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box">
    <div class="box-body">
        <p>
            <?= Html::a('编辑', ['update', 'name' => $model->name], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('删除', ['delete', 'name' => $model->name], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
                        'r_id',
            'u_id',
            'title',
            'remark',
            'insert_date',
            'update_date',
        ],
    ]) ?>
    </div>
</div>
