<?php
declare(strict_types=1);
$pageActuelle = basename($_SERVER['SCRIPT_NAME'] ?? 'index.php');
$titrePage = match ($pageActuelle) {
    'catalogue.php' => 'Catalogue',
    'detail.php' => 'Détail du livre',
    'apropos.php' => 'À propos',
    default => 'Accueil',
};
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Découvrez le catalogue de livres de la Médiathèque IPNET.">
    <title><?= htmlspecialchars($titrePage, ENT_QUOTES, 'UTF-8') ?> | Médiathèque IPNET</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header class="site-header">
    <div class="header-inner">
        <a class="brand" href="index.php"><span class="brand-mark" aria-hidden="true">M</span><span>Médiathèque <strong>IPNET</strong></span></a>
        <nav class="main-nav" aria-label="Navigation principale">
            <a class="<?= $pageActuelle === 'index.php' ? 'current' : '' ?>" href="index.php">Accueil</a>
            <a class="<?= $pageActuelle === 'catalogue.php' || $pageActuelle === 'detail.php' ? 'current' : '' ?>" href="catalogue.php">Catalogue</a>
            <a class="<?= $pageActuelle === 'apropos.php' ? 'current' : '' ?>" href="apropos.php">À propos</a>
        </nav>
    </div>
</header>
