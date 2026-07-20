<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard client</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background: #f4f4f8; color: #222; }
        header { background: #124e8c; color: #fff; padding: 1rem; }
        nav a { color: #fff; margin-right: 1rem; text-decoration: none; }
        main { padding: 2rem; }
        .card { background: #fff; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,.08); padding: 1.5rem; margin-bottom: 1rem; }
        .actions a { display: inline-block; margin-right: .75rem; margin-bottom: .5rem; padding: .65rem 1rem; background: #124e8c; color: #fff; border-radius: 6px; text-decoration: none; }
    </style>
</head>
<body>
    <header>
        <h1>Tableau de bord client</h1>
        <nav>
            <a href="<?= base_url('/client/dashboard') ?>">Accueil</a>
            <a href="<?= base_url('/client/solde') ?>">Solde</a>
            <a href="<?= base_url('/client/depot') ?>">Dépôt</a>
            <a href="<?= base_url('/client/retrait') ?>">Retrait</a>
            <a href="<?= base_url('/client/transfert') ?>">Transfert</a>
            <a href="<?= base_url('/client/historique') ?>">Historique</a>
            <a href="<?= base_url('/logout') ?>">Déconnexion</a>
        </nav>
    </header>
    <main>
        <div class="card">
            <h2>Bonjour, <?= esc(session()->get('num_tel')) ?: 'utilisateur' ?></h2>
            <p>Bienvenue sur votre espace client. Vous pouvez consulter votre solde et effectuer des opérations depuis les liens ci-dessus.</p>
        </div>
        <div class="card">
            <h3>Solde disponible</h3>
            <p style="font-size: 2rem; font-weight: bold;"><?= isset($solde) ? esc(number_format($solde, 0, ',', ' ')) . ' Ar' : 'N/A' ?></p>
        </div>
        <div class="card actions">
            <a href="<?= base_url('/client/solde') ?>">Voir le solde</a>
            <a href="<?= base_url('/client/depot') ?>">Faire un dépôt</a>
            <a href="<?= base_url('/client/retrait') ?>">Faire un retrait</a>
            <a href="<?= base_url('/client/transfert') ?>">Faire un transfert</a>
        </div>
    </main>
</body>
</html>
