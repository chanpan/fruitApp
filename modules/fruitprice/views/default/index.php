<?php
use kartik\dialog\Dialog;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
$this->title="ราคารับซื้อผลไม้";
?>

<div class="panel panel-primary"> 
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-6">
                <div class="panel-title pull-left"><i class="glyphicon glyphicon-th-large"></i> <?= Html::encode($this->title)?></div>
            </div>
            <div class="col-md-6 text-right">
                <?= Html::a('<i class="glyphicon glyphicon-plus"></i> ' . Yii::t('app', 'เพิ่มรายการ'), ['create'], ['class' => 'btn btn-default btn-xs']) ?>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <?php echo $this->render('_search')?>
        <div class="table-responsive">
            <?php echo
            GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                       'attribute'=>'fruit_name',
                       'label'=>'ชื่อผลไม้',
                       'value'=>'fruit_name'
                    ],
                    [
                       'attribute'=>'fruit_buy',
                       'label'=>'ราคารับซื้อ',
                       'value'=>'fruit_buy'
                    ],
                    [
                       'attribute'=>'fruit_unit',
                       'label'=>'หน่วย',
                       'value'=>'fruit_unit'
                    ],
                    [
                       'attribute'=>'create_date',
                       'label'=>'วันที่รับซื้อ',
                       'value'=>'create_date'
                    ],
                     /*button update and delete*/       
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
                                return "<a href='".Url::to(['update','id'=>$model["id"]])."' class='btn btn-info btn-xs'><i class='glyphicon glyphicon-edit'></i> Edit</a>";
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
</div>
<?php 
    echo Dialog::widget();
?>
<?php $this->registerJs("
    $('.btnDelete').click(function(){
        let id = $(this).attr('data-id');
        let url = '".Url::to(['/fruitprice/default/delete'])."';
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
                        location.href=('".\yii\helpers\Url::to(['/fruitprice/default/index'])."');
                    },800);
                });
            } else {
                //alert('Oops! You declined!');
            }
        });
    });

");?>
