<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dépôt client</title>
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
        <h1>Dépôt</h1>
        <nav>
            <a href="<?= base_url('/client/dashboard') ?>">Accueil</a>
            <a href="<?= base_url('/client/solde') ?>">Solde</a>
            <a href="<?= base_url('/client/retrait') ?>">Retrait</a>
            <a href="<?= base_url('/client/transfert') ?>">Transfert</a>
            <a href="<?= base_url('/client/historique') ?>">Historique</a>
            <a href="<?= base_url('/logout') ?>">Déconnexion</a>
        </nav>
    </header>
    <main>
        <div class="card">
            <h2>Faire un dépôt</h2>
            <form method="post" action="#">
                <div class="field">
                    <label for="montant">Montant (Ar)</label>
                    <input type="number" id="montant" name="montant" min="100" placeholder="Entrez le montant" required>
                </div>
                <button type="submit" class="button">Valider le dépôt</button>
            </form>
            <p>Cette page affiche un formulaire de dépôt. L’action du formulaire doit être implémentée côté contrôleur.</p>
        </div>
    </main>
</body>
</html>
