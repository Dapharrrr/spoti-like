<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Requests Controller
 *
 * @property \App\Model\Table\RequestsTable $Requests
 */
class RequestsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Requests->find()
            ->contain(['Users']);
        $requests = $this->paginate($query);

        $this->set(compact('requests'));
    }

    /**
     * View method
     *
     * @param string|null $id Request id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $request = $this->Requests->get($id, contain: ['Users']);
        $this->set(compact('request'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */


     public function add()
     {
         $request = $this->Requests->newEmptyEntity();
     
         if ($this->request->is('post')) {
             $request = $this->Requests->patchEntity($request, $this->request->getData());
             $request->user_id = $this->Authentication->getIdentity()->id; // Récupérer l'utilisateur connecté
             $request->status = 'pending'; // Toujours "pending" au début
     
             if ($this->Requests->save($request)) {
                 $this->Flash->success(__('Votre demande a été envoyée.'));
                 return $this->redirect(['action' => 'index']);
             }
             $this->Flash->error(__('Impossible d\'envoyer la demande.'));
         }
     
         $this->set(compact('request'));
     }
     
     
     public function accept($id)
     {
         $request = $this->Requests->get($id);
         $request->status = 'accepted';
     
         if ($this->Requests->save($request)) {
             $this->Flash->success(__('La demande a été acceptée.'));
         } else {
             $this->Flash->error(__('Impossible d\'accepter la demande.'));
         }
     
         return $this->redirect(['action' => 'index']);
     }
     
     public function reject($id)
     {
         $request = $this->Requests->get($id);
         $request->status = 'rejected';
     
         if ($this->Requests->save($request)) {
             $this->Flash->success(__('La demande a été rejetée.'));
         } else {
             $this->Flash->error(__('Impossible de rejeter la demande.'));
         }
     
         return $this->redirect(['action' => 'index']);
     }
     

    /**
     * Edit method
     *
     * @param string|null $id Request id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $request = $this->Requests->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $request = $this->Requests->patchEntity($request, $this->request->getData());
            if ($this->Requests->save($request)) {
                $this->Flash->success(__('The request has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The request could not be saved. Please, try again.'));
        }
        $users = $this->Requests->Users->find('list', limit: 200)->all();
        $this->set(compact('request', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Request id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $request = $this->Requests->get($id);
        if ($this->Requests->delete($request)) {
            $this->Flash->success(__('The request has been deleted.'));
        } else {
            $this->Flash->error(__('The request could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
