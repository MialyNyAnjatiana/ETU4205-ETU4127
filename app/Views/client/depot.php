<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dépôt client</title>
    <link rel="stylesheet" href="/assets/css/style.css"></head>
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
                <h1>Dépôt</h1>
                <p>Créditez votre compte en toute sécurité.</p>
            </div>
        </div>

        <div class="card" style="max-width:600px;">
            <h2>Faire un dépôt</h2>
            <form method="post" action="#" class="form">
                <div class="form__group">
                    <label for="montant">Montant (Ar)</label>
                    <input type="number" id="montant" name="montant" min="100" placeholder="Entrez le montant" required>
                </div>
                <button type="submit" class="dashboard__button" style="align-self:flex-start;">Valider le dépôt</button>
            </form>
            <p style="margin-top:20px; color:#6b7280; font-size:14px;">Cette page affiche un formulaire de dépôt. L’action du formulaire doit être implémentée côté contrôleur.</p>
        </div>
    </div>
</body>
</html>