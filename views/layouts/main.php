<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

Yii::$app->name = "<i class='glyphicon glyphicon-education'></i> ระบบขนส่งผลไม้";
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
        <style>

    .navbar-inverse {
        background-color: #e65328;
        border-color: #4e606f;
        height:40px;
    }
    .navbar-inverse .navbar-brand {
        color: #ffffff;
        padding-left: 15px;
    }
    .navbar-inverse .navbar-nav > li > a {
        color: #ffffff;
    }
    .navbar-inverse .navbar-nav > .active > a, .navbar-inverse .navbar-nav > .active > a:hover, .navbar-inverse .navbar-nav > .active > a:focus {
        color: #fff;
        background-color: #1b1b1b;
    }
    .navbar-inverse .navbar-toggle {
        border-color: #174e7d;
    }
    .navbar {
        position: fixed;
        min-height: 40px;
        margin-bottom: 20px;
        border: 1px solid transparent;
    }
    .navbar-brand {
        float: left;
        height: 38px;
        padding: 6px 0px;
        font-size: 20px;
        line-height: 20px;
    }
    .navbar-nav {
        /*margin: -5.5px -23px;*/
    }
    .navbar-nav > li > a {
        padding-top: 10px;
        padding-bottom: 10px;
        line-height: 14px;
    }
    .navbar-nav > li > a {
        padding-top: 10px;
        padding-bottom: 10px;
        line-height: 19px;
    }
    .navbar-inverse .navbar-nav > .active > a, .navbar-inverse .navbar-nav > .active > a:hover, .navbar-inverse .navbar-nav > .active > a:focus {
        color: #e65328;
        background-color: #ffffff;
        padding: 8px 20px 4px 20px;
        margin-top: 3px;
        border-radius: 4px;
        font-weight: bold;
        font-size: 12px;
            font-family: sans-serif;
    }
    .navbar-toggle {
        position: relative;
        float: right;
        padding: 9px 10px;
        margin-top: 3px;
        margin-right: 15px;
        margin-bottom: 3px;
        background-color: transparent;
        background-image: none;
        border: 1px solid transparent;
        border-radius: 4px;
    }
    .navbar-inverse .navbar-nav > .open > a, .navbar-inverse .navbar-nav > .open > a:hover, .navbar-inverse .navbar-nav > .open > a:focus {
        color: #fff;
        background-color: transparent;
    }
    .navbar-inverse .navbar-collapse, .navbar-inverse .navbar-form {
        border-color: #e65328;
        background: #f16339f0;
    }
    @media (max-width: 767px){
        .navbar-inverse .navbar-nav .open .dropdown-menu > li > a {
            color: #ffffff;
            /* border-bottom: 1px solid #ffffff; */
            padding: 11px;
            margin-left: 12%;
            border: 1px solid #ffffff;
            margin-right: 1%;
        }
    }


</style>
<?php $this->beginBody() ?>

        <div class="wrap">
            <?php
            if (!empty(\app\modules\login\classes\Cookie::getCookie("logins"))) {
                $items = [
                    ['label' => '<i class="glyphicon glyphicon-user"></i> User', 'url' => ['/user/users/index']],
                    ['label' => 'รับซื้อผลไม้', 'url' => ['/fruit/default/index']],
                    ['label' => 'ค่าใช้จ่าย',  
                        'url' => ['#'],
                        'template' => '<a href="{url}" >{label}<i class="fa fa-angle-left pull-right"></i></a>',
                        'items' => [
                            ['label' => 'ค่าใช้จ่ายในการขนส่ง', 'url' => '#'],
                            ['label' => 'ค่าซ่อมบำรุงรถยนต์', 'url' => '#'],
                            ['label' => 'ค่าจ้างพนักงาน', 'url' => '#'],
                        ],
                    ],
                    ['label' => 'ข้อมูลพนักงาน', 'url' => ['']],
                    ['label' => 'ประชาสัมพันธ์', 'url' => ['']],
                    ['label' => 'ราคารับซื้อผลไม้', 'url' => ['']],
                    ['label' => 'Logout (' . \app\modules\user\classes\Identity::user()->loadUser()->getName() . ')', 'url' => ['/login/default/logout']],
                ];
            } else {
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
                'items' => $items,
                'encodeLabels' => false,
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

