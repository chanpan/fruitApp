<?php
$this->title = "แก้ไข ค่าใช้จ่ายในการขนส่ง";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'ค่าใช้จ่ายในการขนส่ง'), 'url' => ['index']];
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