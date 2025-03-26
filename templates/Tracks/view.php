<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Track $track
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Tracks'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?php if ($this->Identity->get('role') === 'admin'): ?>
                <?= $this->Html->link(__('Edit Track'), ['action' => 'edit', $track->id], ['class' => 'side-nav-item']) ?>
                <?= $this->Form->postLink(__('Delete Track'), ['action' => 'delete', $track->id], ['confirm' => __('Are you sure you want to delete # {0}?', $track->id), 'class' => 'side-nav-item']) ?>
                <?= $this->Html->link(__('New Track'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
            <?php endif; ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="tracks view content">
            <h3><?= h($track->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($track->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Album') ?></th>
                    <td><?= $track->hasValue('album') ? $this->Html->link($track->album->title, ['controller' => 'Albums', 'action' => 'view', $track->album->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Duration') ?></th>
                    <td><?= h($track->duration) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($track->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Artist Id') ?></th>
                    <td><?= $this->Number->format($track->artist_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($track->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($track->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>