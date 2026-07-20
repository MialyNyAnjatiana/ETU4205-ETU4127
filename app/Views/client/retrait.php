<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Retrait client</title>
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
        <h1>Retrait</h1>
        <nav>
            <a href="<?= base_url('/client/dashboard') ?>">Accueil</a>
            <a href="<?= base_url('/client/solde') ?>">Solde</a>
            <a href="<?= base_url('/client/depot') ?>">Dépôt</a>
            <a href="<?= base_url('/client/transfert') ?>">Transfert</a>
            <a href="<?= base_url('/client/historique') ?>">Historique</a>
            <a href="<?= base_url('/logout') ?>">Déconnexion</a>
        </nav>
    </header>
    <main>
        <div class="card">
            <h2>Faire un retrait</h2>
          <form method="post" action="<?= base_url('/client/retrait') ?>">


<div class="field">

<label> Numéro du bénéficiaire</label>
<input type="tel" name="beneficiaire" pattern="[0-9]{10}" required>
</div>

<div class="field">

<label>Montant à envoyer</label>
<input type="number" name="montant" min="100" required>
        </div>

            <button class="button">Envoyer</button>

</form>
            <p>Cette page montre le formulaire de retrait. La logique de traitement doit être ajoutée côté contrôleur.</p>
        </div>
    </main>
</body>
</html>
