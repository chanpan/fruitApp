<?php
$this->title = "User";

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
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
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{update} {delete}',
                        'contentOptions' => [
                            'noWrap' => true,
                            'width' => '135px',
                            'text-align' => 'center'
                        ],
                        'buttons' => [
                            'update' => function($url, $model, $key) {
                                return "<a href='#' class='btn btn-info btn-xs'><i class='glyphicon glyphicon-edit'></i> Edit</a>";
                            },
                            'delete' => function($url, $model, $key) {
                                return "<a href='#' class='btn btn-danger btn-xs'><i class='glyphicon glyphicon-trash'></i> Delete</a>";
                            }
                        ]
                    ],
                ],
                
            ]);
        ?>
    </div>
</div>
