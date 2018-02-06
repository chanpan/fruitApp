<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
Yii::$app->name = "<i class='glyphicon glyphicon-record'></i> ระบบขนส่งผลไม้";
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <div class="wrap">
            <?php
               if(!empty(\app\modules\login\classes\Cookie::getCookie("logins"))){
                   $items = [
                        ['label' => 'User', 'url' => ['/user/users/index']],
                        ['label' => 'รับซื้อผลไม้', 'url' => ['/fruit/default/index']],
                        ['label' => 'Logout ('.\app\modules\user\classes\Identity::user()->loadUser()->getName().')', 'url' => ['/login/default/logout']],                    
                    ];
               }else{
                   $items = [
                        ['label' => 'Login', 'url' => ['/login']],               
                    ];
               }
                
                

            if (!empty(\app\modules\login\classes\Cookie::getCookie("logins"))) {
                
            }
            NavBar::begin([
                'brandLabel' => Yii::$app->name,
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => $items
            ]);
            NavBar::end();
            ?>

            <div class="container">
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
                <?= Alert::widget() ?>
<?= $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

                <p class="pull-right"><?= Yii::powered() ?></p>
            </div>
        </footer>

<?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>

<style>
    
    .navbar-inverse {
        background-color: #ff1818;
        border-color: #c31616;
    }
    .navbar-inverse .navbar-brand {
        color: #ffffff;
    }
    .navbar-inverse .navbar-nav > li > a {
        color: #ffffff;
    }
    .navbar-inverse .navbar-nav > .active > a, .navbar-inverse .navbar-nav > .active > a:hover, .navbar-inverse .navbar-nav > .active > a:focus {
        color: #fff;
        background-color: #e40505;
    }
    .navbar-inverse .navbar-toggle {
        border-color: #d60000;
    }
</style>