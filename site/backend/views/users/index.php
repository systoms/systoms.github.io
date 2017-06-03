<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\Search\User */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '用户管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-header with-border">
        <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <div class="box-body">
        <?php Pjax::begin(); ?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'id',
                    'avatar',
                    'username',
                    'auth_key',
                    'password_hash',
                    // 'password_reset_token',
                    // 'email:email',
                    // 'status',
                    // 'describe:ntext',
                    // 'created_at',
                    // 'updated_at',
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template'=>'{view} {update} {delete} {options}',
                        'options'=>['width'=>'100'],
                        'buttons'=>[
                            'options'=>function($url,$model,$key){
                                return Html::a('权限',['/users/role','id'=>$model->id]);
                            }
                        ],
                    ],
//                    ['header' => '操作','class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        <?php Pjax::end(); ?>
    </div>
</div>
