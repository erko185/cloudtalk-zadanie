<?php
$this->Paginator->options([
    'url' => [
        'controller' => 'Service',
        'action' => 'index',
        'next'
    ]
]);
$this->assign('title',"Crud");
?>
<div class="products index content">
    <div class="col-md-12">
        <?= $this->Form->create() ?>
        <div class="form-group">
            <?= $this->Form->control('date', ['label' => __('Datum na vypocet'),'type'=>'date', 'required' => true, 'class' => 'form-control']) ?>
        </div>
        <?= $this->Form->button(__('Odoslat'), ['class' => 'btn btn-primary','style'=>'margin-top:15px']) ?>
        <?= $this->Form->end() ?>
    </div>

    <?php if($showDiv!=0):?>

    <div style="margin-top: 15px">
        Vyska mesacnej ceny za sluzby je: <?= str_replace(".",",",$priceTotal)?> €
    </div>
    <?php endif; ?>
</div>
