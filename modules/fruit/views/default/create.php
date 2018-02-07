<?php
    $this->title = "เพิ่มรายการรับซื้อผลไม้";
 
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'รับซื้อผลไม้'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class="panel panel-primary">
    <div class="panel-heading"><?= \yii\helpers\Html::encode($this->title) ?></div>
    <div class="panel-body">
        <?php
        echo $this->render('_form', [
            'model' => $model
        ]);
        ?>
    </div>
</div>