<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/style.css">
    <title>Gestion des préfixes - Opérateur</title>
</head>

<body>

    <?= view('layout/admin_navbar') ?>

    <div class="dashboard">

        <div class="dashboard__header">
            <div class="dashboard__title">
                <h1>Gestion des commissions opérateurs</h1>
                <p>Ajoutez ou modifiez les opérateurs et leurs taux de commission.</p>
            </div>
        </div>

        <!-- Messages -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="card" style="border-left: 4px solid #0f766e; margin-bottom: 20px;">
                <p style="margin:0; color:#111827;"><?= session()->getFlashdata('success') ?></p>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="card" style="border-left: 4px solid #b91c1c; margin-bottom: 20px;">
                <p style="margin:0; color:#111827;"><?= session()->getFlashdata('error') ?></p>
            </div>
        <?php endif; ?>

        <!-- Add operator -->
        <div class="dashboard__section" style="margin-bottom: 28px;">
            <h2>Ajouter un opérateur</h2>

            <form action="<?= base_url('admin/operateurs/add') ?>" method="post" style="display:flex; flex-wrap:wrap; gap:16px; align-items:flex-end;">
                <div>
                    <label style="display:block; margin-bottom:6px; color:#6b7280; font-size:14px;">Nom</label>
                    <input type="text" name="nom" placeholder="Ex: Orange" required
                        style="padding:10px 14px; border-radius:10px; border:1px solid #e5e7eb;">
                </div>

                <div>
                    <label style="display:block; margin-bottom:6px; color:#6b7280; font-size:14px;">Commission (%)</label>
                    <input type="number" name="pourcentage_comission" step="0.01" value="0" required
                        style="padding:10px 14px; border-radius:10px; border:1px solid #e5e7eb; width:120px;">
                </div>

                <button type="submit" class="dashboard__button" style="height: 42px;">Ajouter</button>
            </form>
        </div>

        <!-- List -->
        <div class="dashboard__section">
            <h2>Liste des opérateurs</h2>

            <table class="dashboard__table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Commission</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if (!empty($operateurs)): ?>
                        <?php foreach ($operateurs as $operateur): ?>
                            <tr>
                                <form action="<?= base_url('admin/operateurs/update/' . $operateur['id']) ?>" method="post" id="form-<?= $operateur['id'] ?>">
                                </form>

                                <td><?= esc($operateur['id']) ?></td>

                                <td>
                                    <input type="text" name="nom" value="<?= esc($operateur['nom']) ?>"
                                        form="form-<?= $operateur['id'] ?>"
                                        style="padding:8px 10px; border-radius:8px; border:1px solid #e5e7eb;">
                                </td>

                                <td>
                                    <input type="number" step="0.01" name="pourcentage_comission" value="<?= esc($operateur['pourcentage_comission']) ?>"
                                        form="form-<?= $operateur['id'] ?>"
                                        style="padding:8px 10px; border-radius:8px; border:1px solid #e5e7eb; width:90px;">
                                </td>

                                <td style="display:flex; gap:8px;">
                                    <button type="submit" form="form-<?= $operateur['id'] ?>"
                                        class="dashboard__button dashboard__button--secondary" style="padding:8px 14px; font-size:13px;">
                                        Modifier
                                    </button>

                                    <a href="<?= base_url('admin/operateurs/delete/' . $operateur['id']) ?>"
                                        onclick="return confirm('Supprimer cet opérateur ?')"
                                        class="dashboard__button dashboard__button--dark" style="padding:8px 14px; font-size:13px;">
                                        Supprimer
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4">Aucun opérateur</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

    </div>

</body>

</html>