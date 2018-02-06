<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>


    <?php
    $form = ActiveForm::begin([
                'layout' => 'horizontal',
                'id' => 'formUser',
                'enableAjaxValidation' => FALSE,
                //'enableClientValidation' => true,
    ]);
    ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
<?php if($model->isNewRecord): ?>
    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
<?php endif; ?>    
    <?= $form->field($profile, 'fname')->textInput(['maxlength' => true]) ?>
    <?= $form->field($profile, 'lname')->textInput(['maxlength' => true]) ?>
    <?= $form->field($profile, 'sex')->radioList(['1'=>'ชาย','2'=>'หญิง']) ?>
    <?= $form->field($profile, 'tel')->widget(\yii\widgets\MaskedInput::className(), [
        'mask' => '9999999999',
    ]) ?>
    <?= $form->field($profile, 'address')->textarea() ?>
    
    <?= $form->field($model, 'role')->radioList(['1'=>'admin','2'=>'user']) ?>
    <div class="form-group text-center">
        <a href="<?= yii\helpers\Url::to('/user/users/index') ?>" class="btn btn-default">Cancel</a>
        <?= Html::submitButton("Save", ["class"=>'btn btn-primary'])?>
    </div>

<?php ActiveForm::end(); ?>

<?php 
echo $this->registerJs("
        $('#formUser').on('beforeSubmit', function(e) {
        let form = $(this);
        let formData = form.serialize();
        let url = form.attr('action');
        
        let dataUrl = $('#reloadDiv').attr('data-url');
        $.post(url,formData).done(function(res){
            console.log(res)
            if(res.status == 'success'){
                ".\app\modules\utils\Noty::Success('Success.').";
                setTimeout(function(){
                     location.href=('".\yii\helpers\Url::to(['/user/users/index'])."');
                },800);
            }else{
                ".\app\modules\utils\Noty::Error('Server Error.').";
            }
  
        }).fail(function(err){
            console.log(err);
            ".\app\modules\utils\Noty::Error('Server Error.').";  
        });
        return false;
    });

");
?>