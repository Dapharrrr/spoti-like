<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;

class HomeController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
    }

    public function stats()
    {
        // Utilisation de TableRegistry pour récupérer le modèle Follows
        $followsTable = TableRegistry::getTableLocator()->get('Follows');

        // Top 5 des artistes les plus suivis
        $topArtists = $followsTable->find()
            ->select(['artist_id', 'count' => $followsTable->find()->func()->count('*')])
            ->groupBy(['artist_id'])
            ->orderBy(['count' => 'DESC'])
            ->limit(5)
            ->contain(['Artists' => ['fields' => ['id', 'name']]])
            ->all();
    
        // Top 5 des albums les plus suivis
        $topAlbums = $followsTable->find()
            ->select(['album_id', 'count' => $followsTable->find()->func()->count('*')])
            ->groupBy(['album_id'])
            ->orderBy(['count' => 'DESC'])
            ->limit(5)
            ->contain(['Albums' => ['fields' => ['id', 'title']]])
            ->all();

        // Top 5 des artistes les moins suivis
        $leastFollowedArtists = $followsTable->find()
            ->select(['artist_id', 'count' => $followsTable->find()->func()->count('*')])
            ->groupBy(['artist_id'])
            ->orderBy(['count' => 'ASC'])
            ->limit(5)
            ->contain(['Artists' => ['fields' => ['id', 'name']]])
            ->all();

        // Top 5 des albums les moins suivis
        $leastFollowedAlbums = $followsTable->find()
            ->select(['album_id', 'count' => $followsTable->find()->func()->count('*')])
            ->groupBy(['album_id'])
            ->orderBy(['count' => 'ASC'])
            ->limit(5)
            ->contain(['Albums' => ['fields' => ['id', 'title']]])
            ->all();

        // Top 5 des utilisateurs avec le plus de favoris
        $favoritesTable = TableRegistry::getTableLocator()->get('Favorites');
        $topUsers = $favoritesTable->find()
            ->select(['user_id', 'count' => $favoritesTable->find()->func()->count('*')])
            ->groupBy(['user_id'])
            ->orderBy(['count' => 'DESC'])
            ->limit(5)
            ->contain(['Users' => ['fields' => ['id', 'name']]])
            ->all();

        // Passer les données à la vue
        $this->set(compact('topArtists', 'topAlbums', 'leastFollowedArtists', 'leastFollowedAlbums', 'topUsers'));
    }
}
