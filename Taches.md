## ETU 4205
- Création base.sql
- Création + importation données dans la base (Migrations + Seeds) (ok)
- Gestion côté opérateur (admin)
    Connexion à la page admin (ok)
        redirection vers dashboard
    Situation des comptes clients (ok)
    Gestion opérations (ok)
    Gestion prefixes (ok)
        - configuration pour operateur
        - configuration pour autres operateurs (+ comissions)
- Mise à jour base (ok)


## ETU 4127
- Creation des models
    UtilisateurModel
    FraisModel
    HistoriqueModel
    PrefixeModel
    SoldeModel
    TypeOperationModel

        Créer une page contenant : (ok)
                numéro téléphone

        Lors du login :
        - Si le numéro existe
                connexion

        - Sinon
                créer automatiquement un client (ok)
                créer son solde à 0
                connecter le client

                AccueilClient (ok)
                consulation Solde (ok)
                Dépôt (ok)
                Retrait
                Transfert
                Historique







