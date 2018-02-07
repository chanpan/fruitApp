<?php
$this->title = "แก้ไขรายการค่าจ้าง";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'รายการค่าจ้างพนักงาน'), 'url' => ['index']];
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