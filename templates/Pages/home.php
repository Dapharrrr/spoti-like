<?php
/**
 * Page d'accueil simplifiée pour CakePHP
 *
 * @var \App\View\AppView $this
 */
use Cake\Core\Configure;

$this->disableAutoLayout();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Accueil | Spoti-like</title>
    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake', 'home']) ?>
</head>
<body>
    <header>
        <div class="container text-center">
            <a href="<?= $this->Url->build('/') ?>">
                <img alt="Logo" src="https://imgs.search.brave.com/3iIFIesN_QrhEzPhASZLvxTD3C81CDeq_hYb4LdSSvY/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly91cGxv/YWQud2lraW1lZGlh/Lm9yZy93aWtpcGVk/aWEvY29tbW9ucy8x/LzE5L1Nwb3RpZnlf/bG9nb193aXRob3V0/X3RleHQuc3Zn" width="120">
            </a>
            <h1>Bienvenue sur mon application Spoti-like</h1>
            <p>Utilisant CakePHP <?= h(Configure::version()) ?></p>
        </div>
    </header>
    <main class="main">
        <div class="container text-center">
            <p>Ceci est la page d'accueil de votre application.</p>
            <div>
                <a href="<?= $this->Url->build('/albums') ?>" class="button">Voir les albums</a>
                <a href="<?= $this->Url->build('/artists') ?>" class="button">Voir les artistes</a>
            </div>
        </div>
    </main>
</body>
</html>
