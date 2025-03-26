<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Track> $tracks
 */
?>
<div class="tracks index content">
<?php if ($this->Identity->get('role') === 'Admin'): ?>
    <?= $this->Html->link(__('New Track'), ['action' => 'add'], ['class' => 'button float-right']) ?>
<?php endif; ?>
    <h3><?= __('Tracks') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('album_id') ?></th>
                    <th><?= $this->Paginator->sort('duration') ?></th>
                    <th><?= $this->Paginator->sort('artist_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tracks as $track): ?>
                <tr>
                    <td><?= $this->Number->format($track->id) ?></td>
                    <td><?= h($track->title) ?></td>
                    <td><?= $track->hasValue('album') ? $this->Html->link($track->album->title, ['controller' => 'Albums', 'action' => 'view', $track->album->id]) : '' ?></td>
                    <td><?= h($track->duration) ?></td>
                    <td><?= $this->Number->format($track->artist_id) ?></td>
                    <td><?= h($track->created) ?></td>
                    <td><?= h($track->modified) ?></td>
                    <td class="actions">
                        
                        <?= $this->Html->link(__('View'), ['action' => 'view', $track->id]) ?>
                        <?php if ($this->Identity->get('role') === 'Admin'): ?>

<?= $this->Html->link(__('Edit'), ['action' => 'edit', $track->id]) ?>
<?= $this->Form->postLink(
    __('Delete'),
    ['action' => 'delete', $track->id],
    [
        'method' => 'delete',
        'confirm' => __('Are you sure you want to delete # {0}?', $track->id),
        ]
        ) ?>
        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>