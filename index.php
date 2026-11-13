<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/fonctions.php';
$livres = require __DIR__ . '/data/livres.php';
$nombreLivres = count($livres);
$nombreDisponibles = compterLivresDisponibles($livres);
require __DIR__ . '/includes/header.php';
?>
<main class="container">
    <section class="hero">
        <p class="eyebrow">Lire, découvrir, partager</p>
        <h1>Bienvenue à la Médiathèque IPNET</h1>
        <p class="lead">Un catalogue de livres pour apprendre, s'évader et nourrir sa curiosité.</p>
        <a class="button" href="catalogue.php">Explorer le catalogue <span aria-hidden="true">→</span></a>
    </section>
    <section class="stats" aria-label="Résumé du catalogue">
        <article class="stat-card"><span class="stat-number"><?= htmlspecialchars((string) $nombreLivres, ENT_QUOTES, 'UTF-8') ?></span><span>livres au catalogue</span></article>
        <article class="stat-card"><span class="stat-number"><?= htmlspecialchars((string) $nombreDisponibles, ENT_QUOTES, 'UTF-8') ?></span><span>livres disponibles</span></article>
    </section>
    <section class="intro-grid">
        <div><p class="eyebrow">La médiathèque</p><h2>La connaissance à portée de main</h2></div>
        <p>Parcourez une sélection variée, filtrez les ouvrages par catégorie et consultez leur fiche détaillée en quelques clics.</p>
    </section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
