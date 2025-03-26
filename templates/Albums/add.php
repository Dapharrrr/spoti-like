<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Album $album
 * @var \Cake\Collection\CollectionInterface|string[] $artists
 */
?>
<div class="column column-80">
    <div class="albums form content">
        <?= $this->Form->create($album) ?>
        <fieldset>
            <legend><?= __('Add Album') ?></legend>
            
            <?= $this->Form->control('title') ?>
            <?= $this->Form->control('artist_id') ?>
            <?= $this->Form->control('year', [
    'type' => 'date', 
    'label' => 'Année',
    'value' => $album->year ?: '2020-01-01' // Valeur par défaut
]) ?>

            <?= $this->Form->control('image') ?>
            
            <!-- Ajout du champ pour l'embed -->
            <?= $this->Form->control('embed', [
    'label' => 'Spotify Embed Code', 
    'placeholder' => 'Insérez le code d\'embed ici',
    'value' => $album->embed ?: 'default_embed_code' // Si vide, utilise une valeur par défaut
]) ?>


        </fieldset>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>

