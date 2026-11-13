<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/fonctions.php';
$livres = require __DIR__ . '/data/livres.php';
$idBrut = $_GET['id'] ?? null;
$idValide = is_string($idBrut) && preg_match('/^[1-9][0-9]*$/', $idBrut) === 1;
$livre = $idValide ? trouverLivreParId($livres, (int) $idBrut) : null;
require __DIR__ . '/includes/header.php';
?>
<main class="container page-content">
    <?php if ($livre === null): ?>
        <section class="empty-state detail-error"><p class="eyebrow">Fiche introuvable</p><h1>Impossible d'afficher ce livre</h1><p>L'identifiant est absent, invalide ou ne correspond à aucun ouvrage du catalogue.</p><a class="button" href="catalogue.php">Retour au catalogue</a></section>
    <?php else: ?>
        <a class="back-link" href="catalogue.php">← Retour au catalogue</a>
        <article class="detail-card">
            <p class="eyebrow">Fiche du livre · <?= htmlspecialchars($livre['categorie'], ENT_QUOTES, 'UTF-8') ?></p>
            <h1><?= htmlspecialchars($livre['titre'], ENT_QUOTES, 'UTF-8') ?></h1>
            <p class="detail-author">Écrit par <?= htmlspecialchars($livre['auteur'], ENT_QUOTES, 'UTF-8') ?></p>
            <dl class="detail-list">
                <div><dt>Année de publication</dt><dd><?= htmlspecialchars((string) $livre['annee'], ENT_QUOTES, 'UTF-8') ?></dd></div>
                <div><dt>Catégorie</dt><dd><?= htmlspecialchars($livre['categorie'], ENT_QUOTES, 'UTF-8') ?></dd></div>
                <div><dt>Prix indicatif</dt><dd><?= htmlspecialchars(number_format($livre['prix'], 0, ',', ' '), ENT_QUOTES, 'UTF-8') ?> F CFA</dd></div>
                <div><dt>Disponibilité</dt><dd><span class="availability<?= $livre['disponible'] ? '' : ' unavailable' ?>"><?= $livre['disponible'] ? 'Disponible' : 'Actuellement emprunté' ?></span></dd></div>
            </dl>
        </article>
    <?php endif; ?>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
