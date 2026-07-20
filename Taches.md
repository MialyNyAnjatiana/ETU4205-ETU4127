## ETU 4205
- Création base.sql
- Création + importation données dans la base (Migrations + Seeds)

## ETU 4127
- Creation des models
    UtilisateurModel
    FraisModel
    HistoriqueModel
    PrefixeModel
    SoldeModel
    TypeOperationModel


# Creation de controllers

    AdminController
        Fonctions :
                Dashboard
                Gestion des préfixes
                Ajouter un préfixe
                Modifier un préfixe
                Supprimer un préfixe

        Gestion des opérations :
                Liste des types
                Ajouter un type
                Modifier
                Supprimer

        Gestion des frais :
                Ajouter une tranche
                Modifier une tranche
                Supprimer une tranche

        Statistiques:
                Situation des comptes
                Situation des gains


# ClientController
        Fonctions
                Accueil
                Solde
                Dépôt
                Retrait
                Transfert
                Historique

# LoginController
        Fonctions
                Page login
                Vérification numéro
                Création automatique du compte
                Connexion

## Authentification

## Login

        Créer une page contenant :
                numéro téléphone
                mot de passe

        Lors du login :
        - Si le numéro existe
                connexion

        - Sinon
                créer automatiquement un client
                créer son solde à 0
                connecter le client

# Partie Administrateur

## Dashboard

        Afficher
                nombre de clients
                nombre de transferts
                nombre de retraits
                nombre de dépôts


## Gestion des préfixes

        Créer une liste

        Fonctions
                ajouter
                modifier
                supprimer


## Gestion des types

        Créer un formuaire de :
                Dépôt
                Retrait
                Transfert

        Interface
                liste
                ajout
                modification
                suppression

## Gestion des frais

Créer

Interface

liste

Fonctions

ajout
modification
suppression

Chaque frais doit contenir

* montant minimum
* montant maximum
* frais
* type d'opération

---

## Situation des gains

Calculer

Somme des frais

Retraits

*

Transferts

Afficher

tableau
total

---

## Situation des comptes

Afficher

Pour chaque client

* nom
* numéro
* solde actuel

---

# 7. Partie Client

## Tableau de bord

Afficher

Nom
Numéro
Solde

---

## Voir le solde

Créer une page

Afficher

* montant disponible

---

## Dépôt

Créer un formulaire

Champ

* montant

Au clic

* vérifier le montant
* ajouter le montant au solde
* enregistrer dans historique

---

## Retrait

Créer un formulaire

Champ

* montant

Au clic

* rechercher les frais
* vérifier que le client possède assez d'argent
* retirer montant + frais
* enregistrer historique

---

## Transfert

Créer un formulaire

Champs

* numéro destinataire
* montant

Traitement

* vérifier que le destinataire existe
* vérifier le solde
* calculer les frais
* retirer montant + frais chez l'expéditeur
* ajouter montant chez le destinataire
* enregistrer historique chez l'expéditeur
* enregistrer historique chez le destinataire si souhaité

---

## Historique

Afficher

Pour chaque opération

* date
* type
* montant
* frais (si applicable)
* solde après opération (optionnel)

---

# 8. Gestion des frais

Créer une fonction

```text
calculerFrais(typeOperation, montant)
```

Elle doit

* rechercher la bonne tranche
* retourner le montant des frais

Cette fonction sera utilisée pour

* retrait
* transfert

---

# 9. Validation

Pour chaque formulaire

Vérifier

champs obligatoires
montant positif
numéro valide
solde suffisant
éviter les montants négatifs

---

# 10. Interface

Créer

navbar
menu admin
menu client
footer

Utiliser Bootstrap

Créer

tableaux
formulaires
alertes
boutons

---




**Étudiant 1 (Back-end)**

* Base de données (`base.sql`)
* Models
* Controllers
* Authentification
* Logique métier (dépôt, retrait, transfert, calcul des frais)

**Étudiant 2 (Front-end)**

* Vues Bootstrap
* Dashboard administrateur
* Dashboard client
* Formulaires
* Historique
* Navigation et intégration

Ainsi, chacun peut avancer en parallèle tout en limitant les conflits Git.
