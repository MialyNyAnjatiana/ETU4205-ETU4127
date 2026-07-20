<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Historique client</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f4f8;
            color: #222;
        }

        header {
            background: #124e8c;
            color: #fff;
            padding: 1rem;
        }

        nav a {
            color: #fff;
            margin-right: 1rem;
            text-decoration: none;
        }

        main {
            padding: 2rem;
        }

        .card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .08);
            padding: 1.5rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        th,
        td {
            padding: .85rem;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #f0f4fb;
        }
    </style>
</head>

<body>
    <header>
        <h1>Historique des opérations</h1>
        <nav>
            <a href="<?= base_url('/client/dashboard') ?>">Accueil</a>
            <a href="<?= base_url('/client/solde') ?>">Solde</a>
            <a href="<?= base_url('/client/depot') ?>">Dépôt</a>
            <a href="<?= base_url('/client/retrait') ?>">Retrait</a>
            <a href="<?= base_url('/client/transfert') ?>">Transfert</a>
            <a href="<?= base_url('/logout') ?>">Déconnexion</a>
        </nav>
    </header>
    <main>
        <div class="card">
            <h2>Historique des opérations</h2>
            <p>Les opérations récentes s'afficheront ici lorsque la fonctionnalité sera connectée au contrôleur et au
                modèle.</p>
            <table>
                <thead>
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
                </thead>
                <tbody>
                    <tr>
                <tbody>

                    <?php if (!empty($historique)): ?>
                        <?php foreach ($historique as $operation): ?>
                            <tr>
                                <td>
                                    <?= date('d/m/Y H:i', strtotime($operation['date_historique'])) ?>
                                </td>
                                <td>
                                    <?= esc($operation['operation']) ?>
                                </td>
                                <td>
                                    <?php if ($operation['operation'] == 'Transfert'): ?>

                                        <?= esc($operation['destinataire']) ?>
                                    <?php else: ?>
                                        —
                                    <?php endif; ?>

                                </td>
                                <td>
                                    <?= number_format($operation['montant'], 0, ',', ' ') ?> Ar
                                </td>

                                <td>
                                    <?= number_format($operation['frais'], 0, ',', ' ') ?>Ar
                                </td>
                                <td>
                                    <span style="color:green;font-weight:bold">
                                        Effectuée
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" style="text-align:center">
                                Aucune opération enregistrée.
                            </td>
                        </tr>

                    <?php endif; ?>

                </tbody>
                </tr>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>