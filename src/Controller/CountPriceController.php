<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Date;

class CountPriceController extends AppController
{


    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Include the FlashComponent
        $this->loadModel('Service');
    }

    public function index()
    {
        $priceTotal = 0.0;
        $showDiv = 0;
        if ($this->request->is('post')) {
//            $service = $this->Service->patchEntity($service, $this->request->getData());
            $services = $this->Service->find('all');
            $month = date("m");
            foreach ($services as $service) {
                if (date("Y-m-d",strtotime($service['date_start'])) <= $this->request->getData()['date'] && date("Y-m-d",strtotime($service['date_end'])) >= $this->request->getData()['date']) {
                    if ($service['billing_period'] == 0) {
                        $priceTotal = $priceTotal + floatval($service['price']);
                    } else if ($service['billing_period'] == 1) {
                        if ($month == 4 || $month == 8 || $month == 12) {
                            $priceTotal = $priceTotal + floatval($service['price']);
                        }
                    } else if ($service['billing_period'] == 2) {
                        if ($month == 6 || $month == 12) {
                            $priceTotal = $priceTotal + floatval($service['price']);
                        }
                    } else if ($service['billing_period'] == 3) {
                        if ($month == 1) {
                            $priceTotal = $priceTotal + floatval($service['price']);
                        }
                    }
                }
            }
            $priceTotal;
            $showDiv = 1;
        }

        $this->set(compact('priceTotal'));
        $this->set(compact('showDiv'));

    }


}
