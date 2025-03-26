<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Album $album
 */

 use Cake\ORM\TableRegistry;
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Albums'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?php if ($this->Identity->get('role') === 'Admin'): ?>
                <?= $this->Html->link(__('Edit Album'), ['action' => 'edit', $album->id], ['class' => 'side-nav-item']) ?>
                <?= $this->Form->postLink(__('Delete Album'), ['action' => 'delete', $album->id], ['confirm' => __('Are you sure you want to delete # {0}?', $album->id), 'class' => 'side-nav-item']) ?>
                <?= $this->Html->link(__('New Album'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
            <?php endif; ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="albums view content">
            <h3>
    <?= h($album->title) ?>
    <?php
    $userId = $this->Identity->get('id');
    $isFavorite = !empty($userId) && in_array($userId, collection($album->favorites ?? [])->extract('user_id')->toList());
    ?>

    <?= $this->Form->postLink(
        $isFavorite ? '❤️' : '🤍', 
        ['controller' => 'Favorites', 'action' => $isFavorite ? 'remove' : 'add'],
        [
            'data' => ['user_id' => $userId, 'album_id' => $album->id],
            'class' => 'heart-button',
            'escapeTitle' => false
        ]
    ) ?>
</h3>

<?php
$followsTable = TableRegistry::getTableLocator()->get('Follows');
$alreadyFollowing = $followsTable->find()
    ->where(['user_id' => $this->Identity->get('id'), 'album_id' => $album->id])
    ->first();
?>

<?= $this->Form->create(null, ['url' => ['controller' => 'Follows', 'action' => 'toggleFollow']]) ?>
    <?= $this->Form->hidden('album_id', ['value' => $album->id]) ?>
    <button type="submit" class="<?= $alreadyFollowing ? 'btn-unfollow' : 'btn-follow' ?>">
        <?= $alreadyFollowing ? 'Unfollow' : 'Follow' ?>
    </button>
<?= $this->Form->end() ?>


            <table>
            <?php if (!empty($album->embed)): ?>
                <div class="embed-container">
                    <h4><?= __('Listen to this Album') ?></h4>

                    <?= $album->embed ?>
                </div>
            <?php endif; ?>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($album->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Artist') ?></th>
                    <td><?= $album->hasValue('artist') ? $this->Html->link($album->artist->name, ['controller' => 'Artists', 'action' => 'view', $album->artist->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Year') ?></th>
                    <td><?= h($album->year) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($album->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($album->modified) ?></td>
                </tr>
            </table>

            <div class="related">
                <h4><?= __('Related Favorites') ?></h4>
                <?php if (!empty($album->favorites)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Album Id') ?></th>
                            <th><?= __('Artist Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($album->favorites as $favorite) : ?>
                        <tr>
                            <td><?= h($favorite->id) ?></td>
                            <td><?= h($favorite->user_id) ?></td>
                            <td><?= h($favorite->album_id) ?></td>
                            <td><?= h($favorite->artist_id) ?></td>
                            <td><?= h($favorite->created) ?></td>
                            <td><?= h($favorite->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Favorites', 'action' => 'view', $favorite->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Favorites', 'action' => 'edit', $favorite->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Favorites', 'action' => 'delete', $favorite->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $favorite->id),
                                    ]
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Tracks') ?></h4>
                <?php if (!empty($album->tracks)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Title') ?></th>
                            <th><?= __('Album Id') ?></th>
                            <th><?= __('Duration') ?></th>
                            <th><?= __('Artist Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($album->tracks as $track) : ?>
                        <tr>
                            <td><?= h($track->id) ?></td>
                            <td><?= h($track->title) ?></td>
                            <td><?= h($track->album_id) ?></td>
                            <td><?= h($track->duration) ?></td>
                            <td><?= h($track->artist_id) ?></td>
                            <td><?= h($track->created) ?></td>
                            <td><?= h($track->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Tracks', 'action' => 'view', $track->id]) ?>
                                <?php if ($this->Identity->get('role') === 'Admin'): ?>
                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Tracks', 'action' => 'edit', $track->id]) ?>
                                    <?= $this->Form->postLink(
                                        __('Delete'),
                                        ['controller' => 'Tracks', 'action' => 'delete', $track->id],
                                        [
                                            'method' => 'delete',
                                            'confirm' => __('Are you sure you want to delete # {0}?', $track->id),
                                            ]
                                            ) ?>
                                            <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
