# Application Pedale Joyeuse
Exercice donné par Gérard Tourres le 02 mai 2024

# Enoncé :

### Le patron de l’entreprise « La pédale joyeuse », un marchand d’accessoires pour vélos, vous a
confié la réalisation d’une application de gestion.

L’entreprise commercialise 5 produits :
- La selle « Doussofess » , référencée SD, au prix de 55 euros HT (stock alerte 15 pièces)
- La selle « Duracuir », référencée SC, au prix de 40 euros HT (stock alerte 10 pièces)
- Le kit d’éclairage « Voiclair », référencé VC, au prix de 65,50 euros HT (stock alerte 15 pièces)
- Le guidon « Korn2vach», référencé GT, au prix de 35,40 euros HT (stock alerte 12 pièces)
- Le kit de dépannage « MacGyver », référencé MG, au prix de 28 euros HT.(stock alerte 10 pièces)
La TVA est de 20 %. sur tous les produits, sauf la selle « Duracuir » où elle est réduite à 10 %.
L’entreprise emploie deux vendeurs.

## Fonctionnalités attendues :

### Pour les vendeurs :
- Consulter le niveau de stock des produits
- Editer let enregistrer la facture pour les clients :
- Voir son état des ventes du mois en cours, et un récap depuis le début de l’année.
  
### Pour le patron, en plus des fonctions « vendeur » :
- Modifier le stock (ajouter produits reçus, ajuster stock après inventaire….) et les niveaux d’alerte.
- Consulter les ventes journalières, et le chiffre d’affaires généré
- Disposer d’un récapitulatif mensuel des ventes par produit, avec le total de la TVA collectée (pour
la reverser à l’État)
- Disposer d’un état cumulé des ventes par produit depuis le premier janvier de l’année en cours.
- Disposer d’un montant total des ventes HT par vendeur par mois et en cummul depuis le 1er
janvier.

Pour chaque client, sont stockés Nom, prénom, adresse1, adresse2, code postal, ville, adresse mail,
numéro de téléphone portable.

Les ventes sont exclusivement réalisées en France. Si le stock d’alerte est atteint, on affichera la
ligne produit en rouge.

### Votre mission :
- Réaliser le « user-case » de l’application
- Concevoir la base de données (Modèles conceptuel, logique et physique des données) à partir des
entités que vous aurez identifiées.
- Mettre en place la base de données (mySql)
- Réaliser le formulaire de saisie pour les clients, les factures et le traiter
- Réaliser le formulaire de modification des stocks pour le patron et le traiter.
- Réaliser les écrans de consultation des divers états demandés, avec un bandeau d’alerte pour les
risques de rupture de stock.

L’application sera munie d’un menu permettant d’accéder aux diverses fonctionnalités (par exemple
nouveau client, nouvelle facture, consulter stocks, modifier stocks….etc).Vous êtes libres de réaliser
l’application en PHP ou en nodeJS, selon le paradigme MVC, et idéalement en POO.
Un modèle de facture, et un état des stocks au 2 mai vous sera fourni, ainsi qu’un jeu de données
pour l’historique depuis le début de l’année.
