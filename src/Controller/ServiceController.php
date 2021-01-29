<?php

namespace App\Controller;

use App\Controller\AppController;

class ServiceController extends AppController
{

    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Include the FlashComponent
    }

    public function index()
    {

        $services = $this->paginate($this->Service->find('all'), ['limit' => "5"]);
        $this->set(compact('services'));
    }


    public function add()
    {
        $service = $this->Service->newEmptyEntity();
        if ($this->request->is('post')) {
            $service = $this->Service->patchEntity($service, $this->request->getData());
            if ($this->Service->save($service)) {
                $this->Flash->success(__('Sluzba bol ulozena.'));

                return $this->redirect(['controler' => 'Service', 'action' => 'index']);
            }
            $this->Flash->error(__('Sluzbu sa nebolo mozne ulozit. Prosim, skuskte to znova.'));
        }
        $this->set(compact('service'));

    }

    public function view($id = null)
    {
        $service = $this->Service->get($id);

        $this->set('service', $service);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $service = $this->Service->get($id);
        if ($this->Service->delete($service)) {
            $this->Flash->success(__('Servis bol vymazani.'));
        } else {
            $this->Flash->error(__('Servis nebolo mozne vymazat. Prosim, skuskte to znova.'));
        }

        return $this->redirect(['controler' => 'Service', 'action' => 'index']);
    }

    public function edit($id = null)
    {

        $service = $this->Service->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $service = $this->Service->patchEntity($service, $this->request->getData());
            if ($this->Service->save($service)) {
                $this->Flash->success(__('Sluzba bola editovana.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Sluzbu sa nebolo mozne editovat. Prosim, skuskte to znova.'));
        }
        $this->set(compact('service'));
    }


}
