<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Follow $follow
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $albums
 * @var string[]|\Cake\Collection\CollectionInterface $artists
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $follow->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $follow->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Follows'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="follows form content">
            <?= $this->Form->create($follow) ?>
            <fieldset>
                <legend><?= __('Edit Follow') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('album_id', ['options' => $albums]);
                    echo $this->Form->control('artist_id', ['options' => $artists]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
