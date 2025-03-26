<?php
/**
 * @var \App\View\AppView $this
 * @var iterable $topArtists
 * @var iterable $topAlbums
 * @var iterable $leastFollowedArtists
 * @var iterable $leastFollowedAlbums
 * @var iterable $topUsers
 */
?>

<div class="stats content">
    <h3><?= __('Top 5 des artistes les plus suivis') ?></h3>
    <table>
        <thead>
            <tr>
                <th><?= __('Artiste') ?></th>
                <th><?= __('Nombre de suivis') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($topArtists as $artist): ?>
                <tr>
                    <td>
                        <?= isset($artist->artist) && isset($artist->artist->name) ? h($artist->artist->name) : __('Inconnu') ?>
                    </td>
                    <td><?= h($artist->count) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h3><?= __('Top 5 des albums les plus suivis') ?></h3>
    <table>
        <thead>
            <tr>
                <th><?= __('Album') ?></th>
                <th><?= __('Nombre de suivis') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($topAlbums as $album): ?>
                <tr>
                    <td>
                        <?= isset($album->album) && isset($album->album->title) ? h($album->album->title) : __('Inconnu') ?>
                    </td>
                    <td><?= h($album->count) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h3><?= __('Top 5 des artistes les moins suivis') ?></h3>
    <table>
        <thead>
            <tr>
                <th><?= __('Artiste') ?></th>
                <th><?= __('Nombre de suivis') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($leastFollowedArtists as $artist): ?>
                <tr>
                    <td>
                        <?php 
                        // Vérifier si l'artiste et son nom existent
                        echo isset($artist->artist) && isset($artist->artist->name) ? h($artist->artist->name) : __('Inconnu');
                        ?>
                    </td>
                    <td><?= h($artist->count) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h3><?= __('Top 5 des albums les moins suivis') ?></h3>
    <table>
        <thead>
            <tr>
                <th><?= __('Album') ?></th>
                <th><?= __('Nombre de suivis') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($leastFollowedAlbums as $album): ?>
                <tr>
                    <td>
                        <?php 
                        // Vérifier si l'album et son titre existent
                        echo isset($album->album) && isset($album->album->title) ? h($album->album->title) : __('Inconnu');
                        ?>
                    </td>
                    <td><?= h($album->count) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h3><?= __('Top 5 des utilisateurs avec le plus de favoris') ?></h3>
    <table>
        <thead>
            <tr>
                <th><?= __('Utilisateur') ?></th>
                <th><?= __('Nombre de favoris') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($topUsers as $user): ?>
                <tr>
                    <td>
                        <?php 
                        // Vérifier si l'utilisateur et son nom existent
                        echo isset($user->user) && isset($user->user->name) ? h($user->user->name) : __('Inconnu');
                        ?>
                    </td>
                    <td><?= h($user->count) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
