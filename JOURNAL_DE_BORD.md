# Journal de bord â€” TP 1 IT 231

> Brouillon Ã  adapter avec les Ã©tapes rÃ©ellement suivies, les difficultÃ©s rencontrÃ©es et les solutions apportÃ©es pendant le travail personnel.

## Travail rÃ©alisÃ©

J'ai organisÃ© le mini-site en pages distinctes et placÃ© les fonctions rÃ©utilisables, les donnÃ©es du catalogue et les Ã©lÃ©ments communs dans leurs dossiers respectifs. J'ai constituÃ© un catalogue de dix livres, puis reliÃ© les pages au moyen d'une navigation commune.

## DifficultÃ©s et solutions

- **Filtrage et paramÃ¨tres d'URL :** le paramÃ¨tre de catÃ©gorie doit Ãªtre comparÃ© Ã  la liste rÃ©elle des catÃ©gories. J'ai prÃ©vu une validation avant le filtrage et un message lorsque la catÃ©gorie demandÃ©e est inconnue.
- **AccÃ¨s Ã  une fiche :** une valeur reÃ§ue dans l'URL peut Ãªtre absente ou mal formÃ©e. J'ai vÃ©rifiÃ© le format numÃ©rique positif avant de rechercher le livre et prÃ©vu un message d'erreur lorsque la recherche Ã©choue.
- **Affichage sÃ©curisÃ© :** les titres et autres donnÃ©es sont affichÃ©s dans du HTML. J'ai utilisÃ© `htmlspecialchars()` avec UTF-8 pour encoder ces valeurs.

## Ce que j'ai appris

Ce travail m'a permis de pratiquer les tableaux associatifs, les fonctions typÃ©es, les conditions, les boucles et les inclusions PHP. J'ai aussi appris Ã  sÃ©parer les donnÃ©es de leur affichage et Ã  valider les paramÃ¨tres transmis par l'URL.

## Ã€ complÃ©ter avant le rendu

Remplacer ou complÃ©ter ces notes pour qu'elles dÃ©crivent fidÃ¨lement votre propre dÃ©marche, vos essais, vos difficultÃ©s rÃ©elles et les solutions effectivement appliquÃ©es.

