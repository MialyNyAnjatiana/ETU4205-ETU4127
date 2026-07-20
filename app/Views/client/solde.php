<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Solde client</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background: #f4f4f8; color: #222; }
        header { background: #124e8c; color: #fff; padding: 1rem; }
        nav a { color: #fff; margin-right: 1rem; text-decoration: none; }
        main { padding: 2rem; }
        .card { background: #fff; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,.08); padding: 1.5rem; }
    </style>
</head>
<body>
    <header>
        <h1>Solde</h1>
        <nav>
            <a href="<?= base_url('/client/dashboard') ?>">Accueil</a>
            <a href="<?= base_url('/client/depot') ?>">Dépôt</a>
            <a href="<?= base_url('/client/retrait') ?>">Retrait</a>
            <a href="<?= base_url('/client/transfert') ?>">Transfert</a>
            <a href="<?= base_url('/client/historique') ?>">Historique</a>
            <a href="<?= base_url('/logout') ?>">Déconnexion</a>
        </nav>
    </header>
    <main>
        <div class="card">
            <h2>Solde actuel</h2>
            <p style="font-size: 2rem; font-weight: bold;"><?= isset($solde) ? esc(number_format($solde, 0, ',', ' ')) . ' FCFA' : '0 FCFA' ?></p>
            <p>Retrouvez ici le montant disponible sur votre compte.</p>
        </div>
    </main>
</body>
</html>
