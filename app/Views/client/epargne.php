<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Epargne client</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    
    <body>
    <div class="app">
        <nav class="navbar">
            <a href="<?= base_url('/client/dashboard') ?>" class="navbar__logo">MonEspace</a>
            <ul class="navbar__links">
                <li><a href="<?= base_url('/client/dashboard') ?>">Accueil</a></li>
                <li><a href="<?= base_url('/client/solde') ?>">Solde</a></li>
                <li><a href="<?= base_url('/client/depot') ?>" class="active">Dépôt</a></li>
                <li><a href="<?= base_url('/client/retrait') ?>">Retrait</a></li>
                <li><a href="<?= base_url('/client/transfert') ?>">Transfert</a></li>
                <li><a href="<?= base_url('/client/historique') ?>">Historique</a></li>
            </ul>
            <div class="navbar__actions">
                <a href="<?= base_url('/logout') ?>" class="navbar__button">Déconnexion</a>
            </div>
        </nav>

        <div class="dashboard__header">
            <div class="dashboard__title">
                <h1>Epargne</h1>
                <p>Inserer le pourcentage d'epargne</p>
            </div>
        </div>

        <div class="card" style="max-width:600px;">
            <h2>Pourcentage d'epargne</h2>
            <form method="post" action="<?= base_url('/client/epargne') ?>" class="form">
                <div class="form__group">
                    <label for="epargne">Pourcentage</label>
                    <input type="number" id="epargne" name="epargne" placeholder="Entrez le pourcentage" required>
                </div>
                <button type="submit" class="dashboard__button" style="align-self:flex-start;">Valider</button>
            </form>
        </div>
    </div>
</body>
</html>