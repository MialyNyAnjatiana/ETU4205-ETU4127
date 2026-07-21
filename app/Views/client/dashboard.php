<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord client</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
    <div class="app">
        <nav class="navbar">
            <a href="<?= base_url('/client/dashboard') ?>" class="navbar__logo">MonEspace</a>
            <ul class="navbar__links">
                <li><a href="<?= base_url('/client/dashboard') ?>" class="active">Accueil</a></li>
                <li><a href="<?= base_url('/client/solde') ?>">Solde</a></li>
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
                <h1>Bonjour, <?= esc(session()->get('nom') ?: session()->get('num_tel')) ?: 'utilisateur' ?></h1>
                <p>Bienvenue sur votre espace client. Gérez vos opérations en toute simplicité.</p>
            </div>
        </div>

        <div class="dashboard__grid">
            <div class="card">
                <p class="card__label">Solde disponible</p>
                <p class="card__value"><?= isset($solde) ? esc(number_format($solde, 0, ',', ' ')) . ' Ar' : '0 Ar' ?></p>
            </div>
        </div>

        <div class="dashboard__actions">
            <a href="<?= base_url('/client/solde') ?>" class="dashboard__button">Voir le solde</a>
            <a href="<?= base_url('/client/depot') ?>" class="dashboard__button dashboard__button--secondary">Faire un dépôt</a>
            <a href="<?= base_url('/client/retrait') ?>" class="dashboard__button dashboard__button--accent">Faire un retrait</a>
            <a href="<?= base_url('/client/transfert') ?>" class="dashboard__button dashboard__button--dark">Faire un transfert</a>
        </div>

    </div>
</body>
</html>