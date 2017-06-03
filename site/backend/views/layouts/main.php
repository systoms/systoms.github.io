<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use common\models\Menu;
AppAsset::register($this);

$cache = Yii::$app->cache;
$menu_list = $cache->exists('menu_list');
if($menu_list){
//   $cache->delete('menu_list');
  $menu_list = $cache->get('menu_list');
}else{
  $menu_list = Menu::find()
    ->where('modules = :modules',array(':modules' => 'panel'))
    ->orderBy('level,pid,sort')
    ->all();
  $cache->set('menu_list',$menu_list);
}
$current_router = Yii::$app->request->getPathInfo();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="sidebar-mini fixed layout-boxed skin-blue-light">
<?php $this->beginBody() ?>

<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>达</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>达达建站</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <?php if (!Yii::$app->user->isGuest): ?>
                <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=Yii::$app->user->identity->avatar?>" onerror='this.src="/img/avatar5.png"' class="user-image" alt="User Image">
              <span class="hidden-xs"><?=Yii::$app->user->identity->username?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=Yii::$app->user->identity->avatar?>" onerror='this.src="/img/avatar5.png"' class="img-circle" alt="User Image">

                <p>
                    <?=Yii::$app->user->identity->username?>
                  <small><?=Yii::$app->user->identity->describe?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">个人资料</a>
                </div>
                <div class="pull-right">
                    <?=Html::beginForm(['/site/logout'], 'post')?>
                    <?=Html::submitButton(
                        '注销',
                        ['class' => 'btn btn-default btn-flat logout']
                    )?>
                    <?=Html::endForm()?>
                </div>
              </li>
            </ul>
          </li>
            <?php endif; ?>
        </ul>
      </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <?php if (!Yii::$app->user->isGuest): ?>
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?=Yii::$app->user->identity->avatar?>" onerror='this.src="/img/avatar5.png"' class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?=Yii::$app->user->identity->username?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
            <?php endif; ?>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <?php foreach($menu_list as $one_menu): ?>
                  <?php if($one_menu['level'] == 1): ?>
                    <li class="header"><?=$one_menu['title']?></li>
                  <?php elseif($one_menu['level'] == 2): ?>
                    <?php
                        $three_menu_html = '';
                        $is_current_router = false;
                        foreach($menu_list as $two_or_three_menu){
                            if($two_or_three_menu['pid'] == $one_menu['m_id']){
                                $three_menu_router = "{$two_or_three_menu['controllers']}/{$two_or_three_menu['action']}";
                                $class = '';
                                if($three_menu_router == $current_router){
                                    $class .= ' active';
                                    $is_current_router = true;
                                }
                                if($two_or_three_menu['is_menu'] !== 1){
                                    continue;
                                }
                                $three_menu_html .= "<li class=\"{$class}\"><a href=\"/{$three_menu_router}\"><i class=\"fa {$two_or_three_menu['icon']}\"></i>{$two_or_three_menu['title']}</a></li>";
                            }
                        }

                    ?>
                    <li class="treeview <?php if($is_current_router): ?>active<?php endif; ?>">
                        <a href="#">
                            <i class="<?= $one_menu['icon'] ?>"></i> <span><?=$one_menu['title']?></span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <?= $three_menu_html ?>
                        </ul>
                    </li>
                  <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                <?= Html::encode($this->title) ?>
            </h1>
            <?= Breadcrumbs::widget([
                'homeLink'=>[
                    'label' => '主 页',
                    'url' => Yii::$app->homeUrl
                ],
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
        </section>
        <div class="content-alert">
            <?= Alert::widget() ?>
        </div>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <?= $content ?>
                </div>
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0.0
        </div>
        <strong>Copyright &copy; 2016-<?=date('Y')?> <a href="http://almsaeedstudio.com">mycgi</a>.</strong> All rights
        reserved.
    </footer>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
