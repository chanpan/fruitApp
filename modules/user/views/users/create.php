<?php

use yii\helpers\Html;
$this->title = Yii::t('app', 'เพิ่ม User');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-primary">

    <div class="panel-heading"><?= Html::encode($this->title) ?></div>
    <div class="panel-body">
    <?= $this->render('_form', [
        'model' => $model,
        'profile'=>$profile,
        'role'=>$role
    ]) ?>
    </div>    

</div>
