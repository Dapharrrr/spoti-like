<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Follows Controller
 *
 * @property \App\Model\Table\FollowsTable $Follows
 */
class FollowsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $userId = $this->Authentication->getIdentity()->get('id');
        $follows = $this->Follows->find()
            ->where(['user_id' => $userId])
            ->contain(['Users','Albums', 'Artists'])
            ->all();
    
        $this->set(compact('follows'));
    }
    

    /**
     * View method
     *
     * @param string|null $id Follow id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $follow = $this->Follows->get($id, contain: ['Users', 'Albums', 'Artists']);
        $this->set(compact('follow'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->request->allowMethod(['post']);
        $follow = $this->Follows->newEmptyEntity();
        $follow = $this->Follows->patchEntity($follow, $this->request->getData());
    
        if ($this->Follows->save($follow)) {
            $this->Flash->success(__('Vous suivez maintenant cet élément.'));
        } else {
            $this->Flash->error(__('Impossible de suivre cet élément.'));
        }
    
        return $this->redirect($this->referer());
    }
    

    /**
     * Edit method
     *
     * @param string|null $id Follow id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $follow = $this->Follows->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $follow = $this->Follows->patchEntity($follow, $this->request->getData());
            if ($this->Follows->save($follow)) {
                $this->Flash->success(__('The follow has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The follow could not be saved. Please, try again.'));
        }
        $users = $this->Follows->Users->find('list', limit: 200)->all();
        $albums = $this->Follows->Albums->find('list', limit: 200)->all();
        $artists = $this->Follows->Artists->find('list', limit: 200)->all();
        $this->set(compact('follow', 'users', 'albums', 'artists'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Follow id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $follow = $this->Follows->get($id);
    
        if ($this->Follows->delete($follow)) {
            $this->Flash->success(__('Vous ne suivez plus cet élément.'));
        } else {
            $this->Flash->error(__('Impossible d’arrêter le suivi.'));
        }
    
        return $this->redirect($this->referer());
    }

    public function toggleFollow()
{
    $this->request->allowMethod(['post']);

    $userId = $this->Authentication->getIdentity()->get('id');
    $albumId = $this->request->getData('album_id') ?? null;
    $artistId = $this->request->getData('artist_id') ?? null;

    // Vérifie si le suivi existe déjà
    $query = $this->Follows->find()->where(['user_id' => $userId]);

    if ($albumId !== null) {
        $query->where(['album_id' => $albumId]);
    } else {
        $query->where(['album_id IS' => null]); // Vérifie si album_id est NULL
    }
    
    if ($artistId !== null) {
        $query->where(['artist_id' => $artistId]);
    } else {
        $query->where(['artist_id IS' => null]); // Vérifie si artist_id est NULL
    }
    
    $existingFollow = $query->first();
    

    if ($existingFollow) {
        // Supprime si déjà suivi (Unfollow)
        if ($this->Follows->delete($existingFollow)) {
            $this->Flash->success(__('Vous ne suivez plus cet élément.'));
        } else {
            $this->Flash->error(__('Erreur lors du désabonnement.'));
        }
    } else {
        // Ajoute un nouveau suivi (Follow)
        $follow = $this->Follows->newEntity([
            'user_id' => $userId,
            'album_id' => $albumId,
            'artist_id' => $artistId,
        ]);

        if ($this->Follows->save($follow)) {
            $this->Flash->success(__('Vous suivez maintenant cet élément.'));
        } else {
            $this->Flash->error(__('Erreur lors du suivi.'));
        }
    }

    return $this->redirect($this->referer());
}

    
}
