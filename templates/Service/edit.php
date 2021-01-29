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

$cakeDescription = 'Service';
?>
<div class="products index content">
    <div style="margin-top: 15px" class="container">

        <div class="row">
            <div class="col-md-12">
                <?= $this->Form->create($service) ?>
                <div class="form-group">
                    <?= $this->Form->control('name', ['label' => __('Nazov'), 'required' => true, 'class' => 'form-control']) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('price', ['label' => __('Jednotkova cena'), 'required' => true, 'class' => 'form-control']) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('billing_period', ['label' => __('Fakturacne obdobie'),'options' => [0=>__('mesacne'),1=>__('stvrtrocne'),2=>__('polrocne'),3=>__('rocne')], 'required' => true, 'class' => 'form-control']) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('date_start', ['label' => __('Zaciatok platnosti sluzby'), 'required' => true, 'class' => 'form-control']) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('date_end', ['label' => __('Koniec platnosti sluzby'), 'required' => true, 'class' => 'form-control']) ?>
                </div>

                <?= $this->Form->button(__('Odoslat'), ['class' => 'btn btn-primary','style'=>'margin-top:15px']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div><!-- /.container -->
