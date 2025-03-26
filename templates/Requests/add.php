<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Requests'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="requests form content">
            <?= $this->Form->create($request) ?>
            <fieldset>
                <legend><?= __('Add Request') ?></legend>
                <?php
                    // Sélection entre Album ou Artiste
                    echo $this->Form->control('type', [
                        'type' => 'select',
                        'options' => ['albums' => 'Album', 'artists' => 'Artist'],
                        'empty' => 'Sélectionnez un type',
                        'required' => true
                    ]);

                    // Champ pour le contenu de la demande (nom d'un album ou d'un artiste)
                    echo $this->Form->control('content', [
                        'label' => 'Nom de l\'album ou de l\'artiste'
                    ]);

                    // Le statut est défini par défaut à "pending"
                    echo $this->Form->hidden('status', ['value' => 'pending']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
