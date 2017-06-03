<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\Search\Menu */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '菜单管理';
$this->params['breadcrumbs'][] = $this->title;

$this->registerCssFile('/plugins/jquery-nestable/jquery.nestable.css',['depends'=>'backend\assets\AppAsset','position'=>yii\web\View::POS_END]);
$this->registerCssFile('/plugins/jquery-nestable/core_css.css',['depends'=>'backend\assets\AppAsset','position'=>yii\web\View::POS_END]);
$this->registerJsFile('/plugins/jquery-nestable/jquery.nestable.js',['depends'=>'backend\assets\AppAsset','position'=>yii\web\View::POS_END]);
?>
<div class="box">
    <div class="box-header with-border">
        <?= Html::a('添加', ['create'], ['class' => 'btn btn-success']) ?>
    </div>
    <div class="box-body">
        <?php
            $list = $dataProvider->getModels();
        ?>
        <div class="dd" id="menu_list">
            <ol class="dd-list">
                <?php foreach($list as $one_menu): ?>
                    <?php if($one_menu->level !== 1 or $one_menu->pid !== 0)continue;?>
                    <li class="dd-item dd3-item" data-id="<?=$one_menu->m_id?>">
                        <div class="dd-handle dd3-handle">拖拽</div>
                        <div class="dd3-content">
                            <i class="fa <?=$one_menu->icon?>"></i>
                            <?=$one_menu->title?>
                            <span class="link"><i class="fa fa-link"></i>
                                <?php
                                    $router = array($one_menu->modules,$one_menu->controllers,$one_menu->action);
                                    $router = array_filter($router);
                                    echo implode('/',$router);
                                ?>
                            </span>
                            <div class="action">
                                <a href="/menu/create?pid=<?=$one_menu->m_id?>" data-toggle="tooltip" data-original-title="新增子节点">
                                    <i class="list-icon fa fa-plus fa-fw"></i>
                                </a>
                                <a href="/menu/update?id=<?=$one_menu->m_id?>" data-toggle="tooltip" data-original-title="编辑">
                                    <i class="list-icon fa fa-pencil fa-fw"></i>
                                </a>
                                <a href="/menu/delete?id=<?=$one_menu->m_id?>" class="ajax-get confirm" title="Delete" aria-label="Delete" data-pjax="0" data-confirm="Are you sure you want to delete this item?" data-method="post">
                                    <i class="list-icon fa fa-times fa-fw"></i>
                                </a>
                            </div>
                        </div>
                        <ol class="dd-list">
                            <?php foreach($list as $two_menu): ?>
                                <?php if($two_menu->level !== 2 or $two_menu->pid !== $one_menu->m_id)continue;?>
                                <li class="dd-item dd3-item" data-id="<?=$two_menu->m_id?>">
                                    <div class="dd-handle dd3-handle">拖拽</div>
                                    <div class="dd3-content">
                                        <i class="fa <?=$two_menu->icon?>"></i>
                                        <?=$two_menu->title?>
                                        <span class="link"><i class="fa fa-link"></i>
                                            <?php
                                                $router = array($two_menu->modules,$two_menu->controllers,$two_menu->action);
                                                $router = array_filter($router);
                                                echo implode('/',$router);
                                            ?>
                                        </span>
                                        <div class="action">
                                            <a href="/menu/create?pid=<?=$two_menu->m_id?>" data-toggle="tooltip" data-original-title="新增子节点">
                                                <i class="list-icon fa fa-plus fa-fw"></i>
                                            </a>
                                            <a href="/menu/update?id=<?=$two_menu->m_id?>" data-toggle="tooltip" data-original-title="编辑">
                                                <i class="list-icon fa fa-pencil fa-fw"></i>
                                            </a>
                                            <a href="/menu/delete?id=<?=$two_menu->m_id?>" class="ajax-get confirm" title="Delete" aria-label="Delete" data-pjax="0" data-confirm="Are you sure you want to delete this item?" data-method="post">
                                                <i class="list-icon fa fa-times fa-fw"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <ol class="dd-list">
                                        <?php foreach($list as $three_menu): ?>
                                            <?php if($three_menu->level !== 3 or $three_menu->pid !== $two_menu->m_id)continue;?>
                                            <li class="dd-item dd3-item" data-level="<?=$three_menu['level']?>" data-pid="<?=$three_menu['pid']?>" data-m_id="<?=$two_menu['m_id']?>" data-id="<?=$three_menu->m_id?>">
                                                <div class="dd-handle dd3-handle">拖拽</div>
                                                <div class="dd3-content">
                                                    <i class="fa <?=$three_menu->icon?>"></i>
                                                    <?=$three_menu->title?>
                                                    <span class="link"><i class="fa fa-link"></i>
                                                        <?php
                                                            $router = array($three_menu->modules,$three_menu->controllers,$three_menu->action);
                                                            $router = array_filter($router);
                                                            echo implode('/',$router);
                                                        ?>
                                                    </span>
                                                    <div class="action">
                                                        <a href="/menu/update?id=<?=$three_menu->m_id?>" data-toggle="tooltip" data-original-title="编辑">
                                                            <i class="list-icon fa fa-pencil fa-fw"></i>
                                                        </a>
                                                        <a href="/menu/delete?id=<?=$three_menu->m_id?>" class="ajax-get confirm" title="Delete" aria-label="Delete" data-pjax="0" data-confirm="Are you sure you want to delete this item?" data-method="post">
                                                            <i class="list-icon fa fa-times fa-fw"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php endforeach; ?>
                                    </ol>
                                </li>
                            <?php endforeach; ?>
                        </ol>
                    </li>
                <?php endforeach; ?>
            </ol>
        </div>
        <style>
            .dd3 {
                background: #f9f9f9;
            }
        </style>
        <?php $this->beginBlock('test') ?>
            $(function($) {
                $('.dd').nestable({ /* config options */ });
            });
        <?php $this->endBlock() ?>
        <?php $this->registerJs($this->blocks['test'], \yii\web\View::POS_END); ?>
    </div>
</div>
