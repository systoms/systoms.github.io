<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
$this->registerJsFile('/plugins/iCheck/icheck.min.js',['depends'=>'backend\assets\AppAsset','position'=>yii\web\View::POS_END]);
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
    <body class="hold-transition login-page">
    <?php $this->beginBody() ?>
        <div class="login-box">
            <div class="login-logo">
                <a href="../../index2.html"><b>达达建站</b></a>
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg"></p>

                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                    <?= $form->field($model, 'username')->textInput(['autofocus' => true,'placeholder' => "请输入用户名"])->label(false) ?>
                    <?= $form->field($model, 'password')->passwordInput(['placeholder' => "请输入密码"])->label(false) ?>
                    <div class="row">
                        <div class="col-xs-8">
                            <?= $form->field($model, 'rememberMe')->checkbox()->label('记住密码') ?>
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">登录</button>
                        </div>
                        <!-- /.col -->
                    </div>
                <?php ActiveForm::end(); ?>

                <div class="social-auth-links text-center">
                </div>
                <!-- /.social-auth-links -->

                <a href="#">忘记密码？</a><br>
                <a href="register.html" class="text-center">注册账号</a>

            </div>
            <!-- /.login-box-body -->
        </div>
        <?php $this->beginBlock('test') ?>
            $(function($) {
                $('input[type="checkbox"]').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' // optional
                });
            });
        <?php $this->endBlock() ?>
        <?php $this->registerJs($this->blocks['test'], \yii\web\View::POS_END); ?>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
