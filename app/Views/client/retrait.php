<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retrait client</title>
    <link rel="stylesheet" href="/assets/css/style.css"></head>
<body>
    <div class="app">
        <nav class="navbar">
            <a href="<?= base_url('/client/dashboard') ?>" class="navbar__logo">MonEspace</a>
            <ul class="navbar__links">
                <li><a href="<?= base_url('/client/dashboard') ?>">Accueil</a></li>
                <li><a href="<?= base_url('/client/solde') ?>">Solde</a></li>
                <li><a href="<?= base_url('/client/depot') ?>">Dépôt</a></li>
                <li><a href="<?= base_url('/client/retrait') ?>" class="active">Retrait</a></li>
                <li><a href="<?= base_url('/client/transfert') ?>">Transfert</a></li>
                <li><a href="<?= base_url('/client/historique') ?>">Historique</a></li>
            </ul>
            <div class="navbar__actions">
                <a href="<?= base_url('/logout') ?>" class="navbar__button">Déconnexion</a>
            </div>
        </nav>

        <div class="dashboard__header">
            <div class="dashboard__title">
                <h1>Retrait</h1>
                <p>Retirez de l'argent de votre compte.</p>
            </div>
        </div>

        <div class="card" style="max-width:600px;">
            <h2>Faire un retrait</h2>
            <form method="post" action="<?= base_url('/client/retrait') ?>" class="form">
                <div class="form__group">
                    <label for="montant">Montant à retirer (Ar)</label>
                    <input type="number" id="montant" name="montant" min="100" placeholder="Entrez le montant" required>
                </div>
                <button type="submit" class="dashboard__button dashboard__button--accent" style="align-self:flex-start;">Retirer</button>
            </form>
        </div>
    </div>
</body>
</html>