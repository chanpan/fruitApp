<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;

$sql = "SELECT * FROM employees";
$query = Yii::$app->db->createCommand($sql)->queryAll();
$item = ArrayHelper::map($query, "id", "name");
?>
<?php $form = ActiveForm::begin(['id' => 'formEmployeewages', 'layout' => 'horizontal']); ?>
<?= $form->field($model, 'emp_id')->dropDownList($item, ['prompt' => 'เลือกพนักงาน']) ?>
<?= $form->field($model, 'emp_price')->textInput() ?>
<div class="row">

    <?php
    echo $form->field($model, 'date_st')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'จากวันที่'],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ],
    ]);
    ?>
    <?php
    echo $form->field($model, 'date_en')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'ถึงวันที่'],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'        ]
    ]);
    ?>
</div>
<div class="col-md-3 col-md-offset-6">
    <?= Html::submitButton("<i class='glyphicon glyphicon-floppy-disk'></i> Save", ['class' => 'btn btn-primary btn-block']) ?>
</div>
<?php ActiveForm::end(); ?>
<?php
echo $this->registerJs("
        $('#formEmployeewages').on('beforeSubmit', function(e) {
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
                     location.href=('" . \yii\helpers\Url::to(['/expenses/employee-wages/index']) . "');
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
