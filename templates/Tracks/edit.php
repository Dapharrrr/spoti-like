<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Track $track
 * @var string[]|\Cake\Collection\CollectionInterface $albums
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $track->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $track->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Tracks'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="tracks form content">
            <?= $this->Form->create($track) ?>
            <fieldset>
                <legend><?= __('Edit Track') ?></legend>
                <?php
                    echo $this->Form->control('title');
                    echo $this->Form->control('album_id', ['options' => $albums]);
                    echo $this->Form->control('duration');
                    echo $this->Form->control('artist_id');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
