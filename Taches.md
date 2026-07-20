## ETU 4205
- Création base.sql
- Création + importation données dans la base (Migrations + Seeds)
- Gestion côté opérateur (admin)
    Connexion à la page admin
    Situation des comptes clients
    Gestion opérations
    Gestion prefixes
    <?= $this->include('partials/footer') ?>


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







