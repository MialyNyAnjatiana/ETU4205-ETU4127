<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Transfert client</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background: #f4f4f8; color: #222; }
        header { background: #124e8c; color: #fff; padding: 1rem; }
        nav a { color: #fff; margin-right: 1rem; text-decoration: none; }
        main { padding: 2rem; }
        .card { background: #fff; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,.08); padding: 1.5rem; }
        .field { margin-bottom: 1rem; }
        .field label { display: block; margin-bottom: .5rem; }
        .field input { width: 100%; padding: .75rem; border: 1px solid #ccc; border-radius: 6px; }
        .button { background: #124e8c; color: #fff; padding: .85rem 1.25rem; border: none; border-radius: 6px; cursor: pointer; }
    </style>
</head>
<body>
    <header>
        <h1>Transfert</h1>
        <nav>
            <a href="<?= base_url('/client/dashboard') ?>">Accueil</a>
            <a href="<?= base_url('/client/solde') ?>">Solde</a>
            <a href="<?= base_url('/client/depot') ?>">Dépôt</a>
            <a href="<?= base_url('/client/retrait') ?>">Retrait</a>
            <a href="<?= base_url('/client/historique') ?>">Historique</a>
            <a href="<?= base_url('/logout') ?>">Déconnexion</a>
        </nav>
    </header>
    <main>
        <div class="card">
            <h2>Effectuer un transfert</h2>
            <form method="post" action="#">
                <div class="field">
                    <label for="beneficiaire">Numéro du bénéficiaire</label>
                    <input type="tel" id="beneficiaire" name="beneficiaire" placeholder="07XXXXXXXX" pattern="[0-9]{10}" required>
                </div>
                <label>
Gestion des frais
</label>


<select name="frais">

<option value="apart">
Ajouter les frais en plus
</option>


<option value="inclus">
Déduire les frais du montant envoyé
</option>

</select>

                <div class="field">
                    <label for="montant">Montant (FCFA)</label>
                    <input type="number" id="montant" name="montant" min="100" placeholder="Entrez le montant" required>
                </div>
                <button type="submit" class="button">Valider le transfert</button>
            </form>
            <p>Ce formulaire est prêt pour l’implémentation de la logique de transfert.</p>
        </div>
    </main>
</body>
</html>
