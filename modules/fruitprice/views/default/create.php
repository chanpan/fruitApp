<?php

use yii\helpers\Html;
$this->title = Yii::t('app', 'เพิ่ม ราคารับซื้อผลไม้');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'ราคารับซื้อผลไม้'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-primary">
    <div class="panel-heading"><?= Html::encode($this->title) ?></div>
    <div class="panel-body">
    <?= $this->render('_form', [
        'model' => $model
    ]) ?>
    </div>    

</div>
