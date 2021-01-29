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
    <?= $this->Html->link(__('Vypocet mesacnej ceny'), ['controller'=>'CountPrice','action' => 'index'], ['class' => 'button float-right']) ?>
    <?= $this->Html->link(__('Nova sluzba'), ['action' => 'add'], ['class' => 'button float-right','style'=>'margin-right:10px']) ?>
    <h3><?= __('Sluzby') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('name','Nazov') ?></th>
                <th><?= $this->Paginator->sort('price','Jednotkova cena') ?></th>
                <th><?= $this->Paginator->sort('billing_period','Fakturacne obdobie:') ?></th>
                <th><?= $this->Paginator->sort('date_start','Zaciatok platnosti') ?></th>
                <th><?= $this->Paginator->sort('date_end','Koniec platnosti:') ?></th>
                <th><?= $this->Paginator->sort('created_at','Datum a cas vytvorenia:') ?></th>
                <th><?= $this->Paginator->sort('updated_at','Datum a cas poslednej upravy:') ?></th>
                <th class="actions"><?= __('Akcie') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($services as $service): ?>
                <tr>
                    <td><?= ($service->name) ?></td>
                    <td><?= str_replace(".",",",$service->price) ?> €</td>
                    <td>
                        <?php
                        switch($service->billing_period){
                            case 0:
                                echo   __('mesacne');
                                break;
                            case 1:
                                echo   __('stvrtrocne');
                                break;
                            case 2:
                                echo   __('polrocne');
                                break;
                            case 3:
                                echo   __('rocne');
                                break;
                        }
                        ?>
                    </td>
                    <td><?= date("d.m.Y", strtotime($service->date_start)) ?></td>
                    <td><?= date("d.m.Y", strtotime($service->date_end)) ?></td>
                    <td><?= date("d.m.Y", strtotime($service->created_at)) ?></td>
                    <td><?php if($service->updated_at!=""){echo date("d.m.Y h:i:s", strtotime($service->updated_at));}?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Prezriet'), ['action' => 'view', $service->id]) ?>
                        <?= $this->Html->link(__('Editovat'), ['action' => 'edit', $service->id]) ?>
                        <?= $this->Form->postLink(__('Zmazat'), ['action' => 'delete', $service->id], ['confirm' => __('Chcete vymazat sluzbu {0}?', $service->name)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
        <ul class="pagination">
            <?= $this->Paginator->prev('<') ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next('>') ?>
        </ul>
</div>
