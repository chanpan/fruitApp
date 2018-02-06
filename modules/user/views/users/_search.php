<?php
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;
    use yii\helpers\Url;
?>
<?php ActiveForm::begin(['action'=>Url::to(['/user/users/index']), 'method'=>'get','layout'=>'horizontal']); ?>
<div class="input-group">
    <?= Html::input("text", "search", "", ["class" => "form-control","placeholder"=>"ค้นหา User"]) ?>
    <span class="input-group-btn">
        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i> ค้นหา</button>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> ' . Yii::t('app', 'Create User'), ['create'], ['class' => 'btn btn-success']) ?>
    </span> 
</div><br />
<?php ActiveForm::end() ?>