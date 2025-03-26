<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Follow> $follows
 */
?>
<div class="follows index content">
    <h3><?= __('Albums followed') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= __('User') ?></th>
                    <th><?= __('Albums followed') ?></th>
                    <th><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($follows as $follow): ?>
                    <?php if ($follow->album_id !== null): ?>
                    <tr>
                        <td><?= $follow->hasValue('user') ? h($follow->user->name) : '' ?></td>
                        <td><?= $follow->hasValue('album') ? $this->Html->link($follow->album->title, ['controller' => 'Albums', 'action' => 'view', $follow->album->id]) : '' ?></td>
                        <td>
                            <?= $this->Form->postLink(__('Unfollow'), ['action' => 'delete', $follow->id], ['confirm' => __('Êtes-vous sûr de ne plus suivre cet album ?')]) ?>
                        </td>
                    </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <h3><?= __('Artists followed') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= __('User') ?></th>
                    <th><?= __('Artists followed') ?></th>
                    <th><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($follows as $follow): ?>
                    <?php if ($follow->artist_id !== null): ?>
                    <tr>
                        <td><?= $follow->hasValue('user') ? h($follow->user->name) : '' ?></td>
                        <td><?= $follow->hasValue('artist') ? $this->Html->link($follow->artist->name, ['controller' => 'Artists', 'action' => 'view', $follow->artist->id]) : '' ?></td>
                        <td>
                            <?= $this->Form->postLink(__('Unfollow'), ['action' => 'delete', $follow->id], ['confirm' => __('Êtes-vous sûr de ne plus suivre cet artiste ?')]) ?>
                        </td>
                    </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
