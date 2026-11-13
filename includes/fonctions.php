<?php
declare(strict_types=1);

/** Produit une carte HTML sécurisée pour un livre du catalogue. */
function afficherLivre(array $livre): string
{
    $titre = htmlspecialchars((string) ($livre['titre'] ?? ''), ENT_QUOTES, 'UTF-8');
    $auteur = htmlspecialchars((string) ($livre['auteur'] ?? ''), ENT_QUOTES, 'UTF-8');
    $categorie = htmlspecialchars((string) ($livre['categorie'] ?? ''), ENT_QUOTES, 'UTF-8');
    $id = rawurlencode((string) ($livre['id'] ?? ''));
    $annee = htmlspecialchars((string) ($livre['annee'] ?? ''), ENT_QUOTES, 'UTF-8');
    $prix = htmlspecialchars(number_format((float) ($livre['prix'] ?? 0), 0, ',', ' '), ENT_QUOTES, 'UTF-8');
    $disponible = !empty($livre['disponible']);
    $statut = $disponible ? 'Disponible' : 'Emprunté';
    $classeStatut = $disponible ? '' : ' unavailable';

    return '<article class="book-card"><div class="book-card-top"><span class="category-tag">' . $categorie
        . '</span><span class="availability' . $classeStatut . '">' . $statut
        . '</span></div><h2>' . $titre . '</h2><p class="book-author">par ' . $auteur
        . '</p><p class="book-meta">' . $annee . ' <span>·</span> ' . $prix
        . ' F CFA</p><a class="text-link" href="detail.php?id=' . $id
        . '">Voir la fiche <span aria-hidden="true">→</span></a></article>';
}

/** Retourne les livres appartenant exactement à la catégorie demandée. */
function filtrerParCategorie(array $livres, string $categorie): array
{
    return array_values(array_filter(
        $livres,
        static fn (array $livre): bool => ($livre['categorie'] ?? null) === $categorie
    ));
}

/** Recherche un livre à partir de son identifiant entier. */
function trouverLivreParId(array $livres, int $id): ?array
{
    foreach ($livres as $livre) {
        if (isset($livre['id']) && (int) $livre['id'] === $id) {
            return $livre;
        }
    }

    return null;
}

/** Compte les ouvrages actuellement disponibles. */
function compterLivresDisponibles(array $livres): int
{
    return count(array_filter(
        $livres,
        static fn (array $livre): bool => ($livre['disponible'] ?? false) === true
    ));
}

/** Retourne la date du jour au format français. */
function dateDuJour(): string
{
    $mois = [1 => 'janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'];
    return date('j') . ' ' . $mois[(int) date('n')] . ' ' . date('Y');
}
