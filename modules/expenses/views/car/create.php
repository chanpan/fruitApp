<?php
$this->title = "เพิ่ม ค่าซ่อมบำรุงรถยนต์";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'ค่าซ่อมบำรุงรถยนต์'), 'url' => ['index']];
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