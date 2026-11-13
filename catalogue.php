<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/fonctions.php';
$livres = require __DIR__ . '/data/livres.php';
$categories = array_values(array_unique(array_map(static fn (array $livre): string => $livre['categorie'], $livres)));
sort($categories, SORT_LOCALE_STRING);
$categorieDemandee = trim((string) ($_GET['categorie'] ?? ''));
$categorieValide = $categorieDemandee === '' || in_array($categorieDemandee, $categories, true);
$livresAffiches = $categorieDemandee !== '' && $categorieValide
    ? filtrerParCategorie($livres, $categorieDemandee)
    : ($categorieValide ? $livres : []);
require __DIR__ . '/includes/header.php';
?>
<main class="container page-content">
    <div class="page-heading"><div><p class="eyebrow">La collection</p><h1>Le catalogue</h1><p class="muted">Trouvez votre prochaine lecture parmi nos ouvrages.</p></div></div>
    <nav class="filter-bar" aria-label="Filtrer par catégorie">
        <a class="filter-link<?= $categorieDemandee === '' ? ' active' : '' ?>" href="catalogue.php">Tous les livres</a>
        <?php foreach ($categories as $categorie): ?>
            <a class="filter-link<?= $categorieDemandee === $categorie ? ' active' : '' ?>" href="catalogue.php?categorie=<?= rawurlencode($categorie) ?>"><?= htmlspecialchars($categorie, ENT_QUOTES, 'UTF-8') ?></a>
        <?php endforeach; ?>
    </nav>
    <?php if (!$categorieValide): ?>
        <div class="notice notice-error" role="alert">La catégorie « <?= htmlspecialchars($categorieDemandee, ENT_QUOTES, 'UTF-8') ?> » n'existe pas. Choisissez une catégorie proposée ci-dessus.</div>
    <?php endif; ?>
    <p class="result-count"><?= htmlspecialchars((string) count($livresAffiches), ENT_QUOTES, 'UTF-8') ?> livre<?= count($livresAffiches) > 1 ? 's' : '' ?> affiché<?= count($livresAffiches) > 1 ? 's' : '' ?></p>
    <?php if ($livresAffiches === []): ?>
        <div class="empty-state">Aucun livre ne correspond à cette sélection.</div>
    <?php else: ?>
        <div class="book-grid">
            <?php foreach ($livresAffiches as $livre): ?>
                <article class="book-card">
                    <div class="book-card-top"><span class="category-tag"><?= htmlspecialchars($livre['categorie'], ENT_QUOTES, 'UTF-8') ?></span><span class="availability<?= $livre['disponible'] ? '' : ' unavailable' ?>"><?= $livre['disponible'] ? 'Disponible' : 'Emprunté' ?></span></div>
                    <h2><?= htmlspecialchars($livre['titre'], ENT_QUOTES, 'UTF-8') ?></h2>
                    <p class="book-author">par <?= htmlspecialchars($livre['auteur'], ENT_QUOTES, 'UTF-8') ?></p>
                    <p class="book-meta"><?= htmlspecialchars((string) $livre['annee'], ENT_QUOTES, 'UTF-8') ?> <span>·</span> <?= htmlspecialchars(number_format($livre['prix'], 0, ',', ' '), ENT_QUOTES, 'UTF-8') ?> F CFA</p>
                    <a class="text-link" href="detail.php?id=<?= rawurlencode((string) $livre['id']) ?>">Voir la fiche <span aria-hidden="true">→</span></a>
                </article>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
