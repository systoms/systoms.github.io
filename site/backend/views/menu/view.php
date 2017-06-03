<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Menu */

$this->title = $model->m_id;
$this->params['breadcrumbs'][] = ['label' => '菜单管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box">
    <div class="box-body">
        <p>
            <?= Html::a('编辑', ['update', 'id' => $model->m_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('删除', ['delete', 'id' => $model->m_id], [
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
                        'm_id',
            'pid',
            'icon',
            'title',
            'level',
            'sort',
            'is_menu',
            's_id',
            'p_u_id',
            'modules',
            'controllers',
            'action',
            'insert_date',
            'update_date',
        ],
    ]) ?>
    </div>
</div>
