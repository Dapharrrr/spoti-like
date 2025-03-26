<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Follow $follow
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Follow'), ['action' => 'edit', $follow->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Follow'), ['action' => 'delete', $follow->id], ['confirm' => __('Are you sure you want to delete # {0}?', $follow->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Follows'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Follow'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="follows view content">
            <h3><?= h($follow->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $follow->hasValue('user') ? $this->Html->link($follow->user->name, ['controller' => 'Users', 'action' => 'view', $follow->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Album') ?></th>
                    <td><?= $follow->hasValue('album') ? $this->Html->link($follow->album->title, ['controller' => 'Albums', 'action' => 'view', $follow->album->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Artist') ?></th>
                    <td><?= $follow->hasValue('artist') ? $this->Html->link($follow->artist->name, ['controller' => 'Artists', 'action' => 'view', $follow->artist->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($follow->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($follow->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($follow->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>