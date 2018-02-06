<hr />
    <div id="view-name">55555</div>
<hr />
 
<div class="col-md-3" style="margin-top:20px">
    <button id="btnHisName" class="btn btn-primary">Hide</button>
    <button id="btnShowName" class="btn btn-primary">Show</button>
</div>

<?php 
$this->registerJs("
    $('#btnHisName').click(function(){
        $('#view-name').hide();
        $('#btnShowName').attr('disabled',true);
    });
    $('#btnShowName').click(function(){
        $('#view-name').show();
    });
");
?>