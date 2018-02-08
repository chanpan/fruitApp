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
                background-color: #2494F2;
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
                color: #2494f2;
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

            .footer {
                height: 60px;
                background-color: #1F2126;
                border-top: 1px solid #ddd;
                padding-top: 20px;
                color: #fff;
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
                .navbar-inverse .navbar-collapse, .navbar-inverse .navbar-form {
                    border-color: #2494f2;
                    background: #2494f2;
                }
            }
            .navbar-inverse .navbar-toggle:hover, .navbar-inverse .navbar-toggle:focus {
                background-color: #0e89f1;
            }
            .btn-danger {
                color: #fff;
                background-color: #ff0808;
                border-color: #dc1912;
            }
            .btn-info {
                color: #fff;
                background-color: #04c2fb;
                border-color: #46b8da;
            }
            .btn-primary {
                color: #fff;
                background-color: #007fec;
                border-color: #0471d0;
            }
            .panel-primary > .panel-heading {
                color: #fff;
                background-color: #0889f5;
                border-color: #0089ff;
            }
            .panel-primary {
                border-color: #0889f5;
            }
            .dropdown-menu > li > a {
                display: block;
                padding: 3px 20px;
                clear: both;
                font-weight: normal;
                line-height: 1.42857143;
                color: #fff;
                white-space: nowrap;
            }
            .dropdown-menu {
                color: white;
                position: absolute;
                top: 100%;
                left: 0;
                z-index: 1000;
                display: none;
                float: left;
                min-width: 160px;
                padding: 5px 0;
                margin: 2px 0 0;
                font-size: 14px;
                text-align: left;
                list-style: none;
                background-color: #2494f2;
                -webkit-background-clip: padding-box;
                background-clip: padding-box;
                border: 1px solid #ccc;
                border: 1px solid rgba(0, 0, 0, .15);
                border-radius: 4px;
                -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
                box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
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
                            ['label' => 'ค่าใช้จ่ายในการขนส่ง', 'url' => ['/expenses/transport/index']],
                            ['label' => 'ค่าซ่อมบำรุงรถยนต์', 'url' => ['/expenses/car/index']],
                            ['label' => 'ค่าจ้างพนักงาน', 'url' => ['/expenses/employee-wages/index']],
                        ],
                    ],
                    ['label' => 'ข้อมูลพนักงาน', 'url' => ['/employee/default/index']],
                    ['label' => 'ราคารับซื้อผลไม้', 'url' => ['/fruitprice/default/index']],
                    ['label' => 'ประชาสัมพันธ์', 'url' => ['/information/default/index']],
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

