<?php
use kartik\dialog\Dialog;
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
                                return "<a href='".Url::to(['/user/users/update','id'=>$model["id"]])."' class='btn btn-info btn-xs'><i class='glyphicon glyphicon-edit'></i> Edit</a>";
                            },
                            'delete' => function($url, $model, $key) {
                                return "<a data-id='".$model['id']."' href='#' class='btn btn-danger btn-xs btnDelete'><i class='glyphicon glyphicon-trash'></i> Delete</a>";
                            }
                        ]
                    ],
                ],
                
            ]);
        ?>
    </div>
</div>
<?php 
    echo Dialog::widget();
?>
<?php $this->registerJs("
    $('.btnDelete').click(function(){
        let id = $(this).attr('data-id');
        let url = '".Url::to(['/user/users/delete'])."';
        krajeeDialog.confirm('Confirm Delte?', function (result) {
            if (result) {
                $.post(url,{id:id},function(res){
                    new Noty({
                            type: 'success',
                            theme: 'bootstrap-v3',
                            layout: 'topRight',
                            text: res.message+'<span class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</span>'
                    }).show();
                    setTimeout(function(){
                        location.href=('".\yii\helpers\Url::to(['/user/users/index'])."');
                    },800);
                });
            } else {
                //alert('Oops! You declined!');
            }
        });
    });

");?>
