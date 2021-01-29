<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;

$this->assign('title',"Detail");
?>
<div class="products index content">
    <div style="margin-top: 15px" class="container">

        <div class="row">
            <div class="col-md-12"><?= $this->Html->link(__('Späť'), ['controller' => 'Service','action' => 'index',''], ['class' => 'button float-right']) ?></div>

            <div class="col-md-12">

                ID: <?= $service->id ?><br>
                Meno: <?= $service->id ?><br>
                Jednotkova cena: <?= str_replace(".",",",$service->price) ?> €<br>
                Fakturacne obdobie: <?php
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

                $service->billing_period ?><br>
                Zaciatok platnosti: <?= date("d.m.Y", strtotime($service->date_start))?><br>
                Koniec platnosti:  <?= date("d.m.Y", strtotime($service->date_end))?><br>
                Datum a cas vytvorenia: <?= date("d.m.Y h:i:s", strtotime($service->created_at)) ?><br>
                Datum a cas poslednej upravy: <?php if($service->updated_at!=""){echo date("d.m.Y h:i:s", strtotime($service->updated_at));}?>

            </div>
        </div>
    </div>
</div><!-- /.container -->
