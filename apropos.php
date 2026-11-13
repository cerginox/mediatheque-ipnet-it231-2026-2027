<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/fonctions.php';
require __DIR__ . '/includes/header.php';
?>
<main class="container page-content">
    <section class="about-card">
        <p class="eyebrow">Notre mission</p>
        <h1>À propos de la Médiathèque IPNET</h1>
        <p class="lead">Un espace de découverte et de partage au service de la communauté IPNET.</p>
        <p>La Médiathèque IPNET propose un premier catalogue numérique de livres. Ce mini-site permet de consulter les ouvrages, de les parcourir par catégorie et de vérifier leur disponibilité. Les données sont stockées dans un tableau PHP, sans base de données, dans un objectif pédagogique.</p>
        <div class="date-note">Nous sommes le <strong><?= htmlspecialchars(dateDuJour(), ENT_QUOTES, 'UTF-8') ?></strong>.</div>
    </section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
