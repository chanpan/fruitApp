<?php
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;
?>

<?php $form = ActiveForm::begin(['layout' => 'horizontal','id' => 'formUser','enableAjaxValidation' => FALSE]); ?>
<?= $form->field($model, 'cid')->widget(\yii\widgets\MaskedInput::className(), ['mask' => '9999999999999']);?>
<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'address')->textarea() ?>
<?= $form->field($model, 'tel')->widget(\yii\widgets\MaskedInput::className(), ['mask' => '9999999999']);?>
<div class="row">
    <div class="col-md-4 col-md-offset-2">
        <?= $form->field($model, 'wage')->textInput() ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'unit')->textInput() ?>
    </div>
</div>

<div class="form-group text-center">
    <a href="<?= yii\helpers\Url::to('/employee/default/index') ?>" class="btn btn-default">Cancel</a>
    <?= Html::submitButton("<i class='glyphicon glyphicon-floppy-disk'></i> Save", ["class" => 'btn btn-primary']) ?>
</div>
<?php ActiveForm::end(); ?>

<?php
echo $this->registerJs("
        $('#formUser').on('beforeSubmit', function(e) {
            let form = $(this);
            let formData = form.serialize();
            let url = form.attr('action');
            $.post(url,formData).done(function(res){
                console.log(res)
                if(res.status == 'success'){
                    new Noty({
                            type: 'success',
                            theme: 'bootstrap-v3',
                            layout: 'topRight',
                            text: res.message+'<span class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</span>'
                    }).show();
                    setTimeout(function(){
                         location.href=('" . \yii\helpers\Url::to(['/employee/default/index']) . "');
                    },800);
                }else{
                    new Noty({
                            type: 'error',
                            theme: 'bootstrap-v3',
                            layout: 'topRight',
                            text: res.message+'<span class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</span>'
                    }).show();
                }

            }).fail(function(err){
                console.log(err);
                " . \app\modules\utils\Noty::Error('Server Error.') . ";  
            });
            return false;
    });

");
?>

<?php
$this->registerCss("
div.required label.control-label:after {
    content: \" *\";
    color: red;
}
")?>