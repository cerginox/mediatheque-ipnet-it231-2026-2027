# Médiathèque IPNET

Mini-site de catalogue dynamique réalisé en PHP 8 pour le TP 1 de l'UE IT 231. Les livres sont enregistrés dans un tableau PHP ; aucune base de données ni aucun framework n'est utilisé.

## Prérequis

- PHP 8.0 ou version ultérieure.
- Un navigateur web.
- Au choix : PHP natif, XAMPP, WAMP ou MAMP.

## Installation et lancement

1. Décompresser le dossier du projet dans le répertoire de votre serveur local (par exemple `htdocs` avec XAMPP).
2. Démarrer Apache, ou ouvrir un terminal dans le dossier `mediatheque-mp1` et exécuter `php -S localhost:8000`.
3. Ouvrir `http://localhost/mediatheque-mp1/` avec XAMPP, ou `http://localhost:8000/` avec le serveur PHP natif.

## Fonctionnalités

- Accueil avec le nombre total et le nombre de livres disponibles.
- Catalogue en cartes avec titre, auteur, année, catégorie, prix et disponibilité.
- Filtrage par catégorie et message explicite pour une catégorie inconnue.
- Fiche détaillée consultable par identifiant ; les identifiants absents ou invalides sont traités proprement.
- Page « À propos » avec affichage de la date du jour en français.
- Fonctions typées dans `includes/fonctions.php` : `afficherLivre`, `filtrerParCategorie`, `trouverLivreParId` et `compterLivresDisponibles`.
- Échappement HTML des valeurs affichées avec `htmlspecialchars()` et encodage des liens avec `rawurlencode()`.
- Mise en page adaptative pour ordinateur et mobile.

## Structure

```text
mediatheque-mp1/
├── index.php
├── catalogue.php
├── detail.php
├── apropos.php
├── includes/
│   ├── header.php
│   ├── footer.php
│   └── fonctions.php
├── data/
│   └── livres.php
├── css/
│   └── style.css
├── README.md
└── JOURNAL_DE_BORD.md
```

Les filtres et les fiches sont accessibles, par exemple, avec `catalogue.php?categorie=Roman` et `detail.php?id=3`.
