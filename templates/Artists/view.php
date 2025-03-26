<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Artist $artist
 */
use Cake\ORM\TableRegistry;
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Artists'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?php if ($this->Identity->get('role') === 'Admin'): ?>
                <?= $this->Html->link(__('Edit Artist'), ['action' => 'edit', $artist->id], ['class' => 'side-nav-item']) ?>
                <?= $this->Form->postLink(__('Delete Artist'), ['action' => 'delete', $artist->id], ['confirm' => __('Are you sure you want to delete # {0}?', $artist->id), 'class' => 'side-nav-item']) ?>
                <?= $this->Html->link(__('New Artist'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
            <?php endif; ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="artists view content">
            <h3>
                <?= h($artist->name) ?>
                <?php
                $userId = $this->Identity->get('id');
                $isFavorite = !empty($userId) && in_array($userId, collection($artist->favorites ?? [])->extract('user_id')->toList());
                ?>
                <?= $this->Form->postLink(
                    $isFavorite ? '❤️' : '🤍',
                    ['controller' => 'Favorites', 'action' => $isFavorite ? 'remove' : 'add'],
                    [
                        'data' => ['user_id' => $userId, 'artist_id' => $artist->id],
                        'class' => 'heart-button',
                        'escapeTitle' => false
                    ]
                ) ?>
            </h3>

            <?php
$followsTable = TableRegistry::getTableLocator()->get('Follows');
$alreadyFollowing = $followsTable->find()
    ->where(['user_id' => $this->Identity->get('id'), 'artist_id' => $artist->id])
    ->first();
?>

<?= $this->Form->create(null, ['url' => ['controller' => 'Follows', 'action' => 'toggleFollow']]) ?>
    <?= $this->Form->hidden('artist_id', ['value' => $artist->id]) ?>
    <button type="submit" class="<?= $alreadyFollowing ? 'btn-unfollow' : 'btn-follow' ?>">
        <?= $alreadyFollowing ? 'Unfollow' : 'Follow' ?>
    </button>
<?= $this->Form->end() ?>

            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($artist->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($artist->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($artist->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($artist->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Bio') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($artist->bio)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Albums') ?></h4>
                <?php if (!empty($artist->albums)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Title') ?></th>
                            <th><?= __('Artist Id') ?></th>
                            <th><?= __('Year') ?></th>
                            <th><?= __('Image') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($artist->albums as $album) : ?>
                        <tr>
                            <td><?= h($album->id) ?></td>
                            <td><?= h($album->title) ?></td>
                            <td><?= h($album->artist_id) ?></td>
                            <td><?= h($album->year) ?></td>
                            <td><?= h($album->image) ?></td>
                            <td><?= h($album->created) ?></td>
                            <td><?= h($album->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Albums', 'action' => 'view', $album->id]) ?>
                                <?php if ($this->Identity->get('role') === 'Admin'): ?>
                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Albums', 'action' => 'edit', $album->id]) ?>
                                    <?= $this->Form->postLink(
                                        __('Delete'),
                                        ['controller' => 'Albums', 'action' => 'delete', $album->id],
                                        [
                                            'method' => 'delete',
                                            'confirm' => __('Are you sure you want to delete # {0}?', $album->id),
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
