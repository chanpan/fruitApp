<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\user\models\Users */

$this->title = Yii::t('app', 'Create Users');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-default">

    <div class="panel-heading"><?= Html::encode($this->title) ?></div>
    <div class="panel-body">
    <?= $this->render('_form', [
        'model' => $model,
        'profile'=>$profile,
        'role'=>$role
    ]) ?>
    </div>    

</div>
