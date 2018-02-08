<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
 
?>
<?php $form = ActiveForm::begin(['id' => 'formTransport', 'layout' => 'horizontal']); ?>
<?= $form->field($model, 'list')->textInput() ?>
<?= $form->field($model, 'price')->textInput() ?>
<?= $form->field($model, 'description')->textarea() ?>

<div class="col-md-3 col-md-offset-6">
    <?= Html::submitButton("<i class='glyphicon glyphicon-floppy-disk'></i> Save", ['class' => 'btn btn-primary btn-block']) ?>
</div>
<?php ActiveForm::end(); ?>
<?php
echo $this->registerJs("
        $('#formTransport').on('beforeSubmit', function(e) {
        let form = $(this);
        let formData = form.serialize();
        let url = form.attr('action');
        
        let dataUrl = $('#reloadDiv').attr('data-url');
        $.post(url,formData).done(function(res){
            console.log(res)
            new Noty({
                        type: 'success',
                        theme: 'bootstrap-v3',
                        layout: 'topRight',
                        text: res.message+'<span class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</span>'
                }).show();
                setTimeout(function(){
                     location.href=('" . \yii\helpers\Url::to(['/expenses/transport/index']) . "');
                },800);
  
        }).fail(function(err){
            " . \app\modules\utils\Noty::Error('Server Error.') . ";  
        });
        return false;
    });

");
?>
<?php $this->registerCss("
div.required label.control-label:after {
    content: \" *\";
    color: red;
}
") ?>
