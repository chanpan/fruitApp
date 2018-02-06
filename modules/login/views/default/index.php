<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = "LOGIN";
?>


<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title"><?= Html::encode($this->title) ?></div>
            </div>
            <div class="panel-body">
                <?php
                $form = ActiveForm::begin([
                    'id' => 'formLogin',
                    'enableAjaxValidation' => FALSE
                ]);
                ?>
                <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
                <div class="form-group text-center">
                    <?= Html::submitButton("Login", ["class" => 'btn btn-primary btn-block']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
<?php 
echo $this->registerJs("
        $('#formLogin').on('beforeSubmit', function(e) {
        let form = $(this);
        let formData = form.serialize();
        let url = form.attr('action');
        
        let dataUrl = $('#reloadDiv').attr('data-url');
        $.post(url,formData).done(function(res){
            if(res.status == 'success'){
                new Noty({
                        type: 'success',
                        theme: 'bootstrap-v3',
                        layout: 'topRight',
                        text: res.message+'<span class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</span>'
                }).show();
                setTimeout(function(){
                     location.href=('".\yii\helpers\Url::to(['/site/index'])."');
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
            ".\app\modules\utils\Noty::Error('Server Error.').";  
        });
        return false;
    });

");
?>