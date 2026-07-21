<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solde client</title>
    <link rel="stylesheet" href="/assets/css/style.css"></head>
<body>
    <div class="app">
        <nav class="navbar">
            <a href="<?= base_url('/client/dashboard') ?>" class="navbar__logo">MonEspace</a>
            <ul class="navbar__links">
                <li><a href="<?= base_url('/client/dashboard') ?>">Accueil</a></li>
                <li><a href="<?= base_url('/client/solde') ?>" class="active">Solde</a></li>
                <li><a href="<?= base_url('/client/depot') ?>">Dépôt</a></li>
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
                <h1>Solde</h1>
                <p>Consultez votre solde en temps réel.</p>
            </div>
        </div>

        <div class="card" style="max-width:500px;">
            <p class="card__label">Solde actuel</p>
            <p class="card__value"><?= isset($solde) ? esc(number_format($solde, 0, ',', ' ')) . ' Ar' : '0 Ar' ?></p>
            <p style="margin-top:16px; color:#6b7280;">Retrouvez ici le montant disponible sur votre compte.</p>
        </div>
    </div>
</body>
</html>