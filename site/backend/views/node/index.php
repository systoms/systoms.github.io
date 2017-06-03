<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\Search\Role */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '角色管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-header with-border">
        <?= Html::a('添加', ['create'], ['class' => 'btn btn-success']) ?>
    </div>
    <div class="box-body">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>节点名称</th>
                <th>节点描述</th>
                <th>操 作</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($nodes as $v){?>
                <tr>
                    <td><?= $v->name?></td>
                    <td><?= $v->description?></td>
                    <td style="width: 60px;">
                        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span>',['/node/update','name'=>$v->name])?>
                        &nbsp;
                        <?= Html::a('<span class="glyphicon glyphicon-trash"></span>',['/node/delete','name'=>$v->name],[
                            'data' => [
                                'confirm' => '确认删除吗？',
                                'method' => 'post',
                            ]
                        ])?>
                    </td>
                </tr>
            <?php }?>
            </tbody>
        </table>
    </div>
</div>
