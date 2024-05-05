# Application Pedale Joyeuse

Exercice donné par Gérard Tourres le 02 mai 2024

### Application de gestion pour une entreprise de vente d'accessoires de vélo

Inscription sécurisée avec hashage password_hash() de php, qui utilise l'algorithme **bcrypt**.

Il y a deux types d'utilisateurs :

- les vendeurs
- le manager

**Chaque vendeur peut**

- Consulter la liste des clients
- Ajouter un client
- Consulter les factures
- Consulter les produits (et consultation des stocks)
- Ajouter une facture

Mais aussi consulter son propre état des ventes :

- du jour
- du mois en cours
- cumulées depuis le 1er janvier (YTD)

**Les manager peuvent**

- Faire tout ce que font les vendeurs
- Modifier les stocks et alertes
- Consulter l'état des ventes totales journalières, du mois et YTD
- Consulter le C.A. genéré pour tous ces laps de temps

## Listes des produits

La colonne Action s'affiche uniquement si on est manager.
Si l'alerte stock est atteinte, le nombre s'affiche en rouge, et un bandeau d'alerte apparaît en haut de la page.
Le nom du produit est indiqué. Si plusieurs produits sont en alerte, il y aura plusieurs bandeaux.
(simple alerte Bootstrap)

```html
<div class="alert alert-danger alert-dismissible fade show" role="alert">
```

## Ajout client

Ajout d'une fiche client avec toutes les coordonnées necéssaires.

## Ajout facture

Si l'on est vendeur, l'input "personnel" est figé sur le nom du vendeur qui est connecté.
Si l'on est manager, c'est un select qui apparait, de façon à pouvoir choisir n'importe quel vendeur.


