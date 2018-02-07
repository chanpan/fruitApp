<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
?>
<?php ActiveForm::begin(['action' => Url::to(['/fruit']), 'method' => 'get', 'layout' => 'horizontal']); ?>
<div class="col-md-6 col-md-offset-6" style="padding:0;">
    <div class="input-group">

<?= Html::input("text", "search", "", ["class" => "form-control", "placeholder" => "ค้นหา"]) ?>
        <span class="input-group-btn">
            <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i> ค้นหา</button>
        </span> 

    </div>
</div>    
<div class="clearfix"></div>
 <br/>
<?php ActiveForm::end() ?>
