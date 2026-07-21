<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historique client</title>
    <link rel="stylesheet" href="/assets/css/style.css"></head>
<body>
    <div class="app">
        <nav class="navbar">
            <a href="<?= base_url('/client/dashboard') ?>" class="navbar__logo">MonEspace</a>
            <ul class="navbar__links">
                <li><a href="<?= base_url('/client/dashboard') ?>">Accueil</a></li>
                <li><a href="<?= base_url('/client/solde') ?>">Solde</a></li>
                <li><a href="<?= base_url('/client/depot') ?>">Dépôt</a></li>
                <li><a href="<?= base_url('/client/retrait') ?>">Retrait</a></li>
                <li><a href="<?= base_url('/client/transfert') ?>">Transfert</a></li>
                <li><a href="<?= base_url('/client/historique') ?>" class="active">Historique</a></li>
            </ul>
            <div class="navbar__actions">
                <a href="<?= base_url('/logout') ?>" class="navbar__button">Déconnexion</a>
            </div>
        </nav>

        <div class="dashboard__header">
            <div class="dashboard__title">
                <h1>Historique des opérations</h1>
                <p>Retrouvez l'ensemble de vos transactions.</p>
            </div>
        </div>

        <div class="dashboard__section">
            <h2>Détail des opérations</h2>
            <table class="dashboard__table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Opération</th>
                        <th>Destinataire</th>
                        <th>Montant</th>
                        <th>Frais</th>
                        <th>Statut</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($historique)): ?>
                        <?php foreach ($historique as $operation): ?>
                            <tr>
                                <td><?= date('d/m/Y H:i', strtotime($operation['date_historique'])) ?></td>
                                <td><?= esc($operation['operation']) ?></td>
                                <td><?= ($operation['operation'] == 'Transfert') ? esc($operation['destinataire']) : '—' ?></td>
                                <td><?= number_format($operation['montant'], 0, ',', ' ') ?> Ar</td>
                                <td><?= number_format($operation['frais'], 0, ',', ' ') ?> Ar</td>
                                <td><span class="badge badge--success">Effectuée</span></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6">Aucune opération enregistrée.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>