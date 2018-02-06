<?php
$this->title = "User";

use yii\grid\GridView;
use yii\helpers\Html;
$this->title = "Users";
?>

<div class="panel panel-default"> 
    <div class="panel-heading">
        <?= Html::encode($this->title)?>
    </div>
    <div class="panel-body">
        <?= $this->render('_search')?>
        <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'email:email',
                    'username',
                    'fname',
                    'lname',
                    'tel',
                    ['class' => 'yii\grid\ActionColumn'],
                ],
                
            ]);
        ?>
    </div>
</div>
