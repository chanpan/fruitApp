<?php
$this->title = "เพิ่มรายการซื้อผลไม้";
?>

<div class="panel panel-default">
    <div class="panel-heading"><?= \yii\helpers\Html::encode($this->title) ?></div>
    <div class="panel-body">
        <?php
        echo $this->render('_form', [
            'model' => $model
        ]);
        ?>
    </div>
</div>