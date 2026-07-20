<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/style.css">
    <title>Gestion des opérations et frais</title>
</head>

<body>
    <?= view('layout/admin_navbar') ?>

    <div class="dashboard">

        <div class="dashboard__header">
            <div class="dashboard__title">
                <h1>Gestion des opérations et frais</h1>
                <p>Configurez les tranches de frais par type d'opération.</p>
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

        <!-- Add fee tier -->
        <div class="dashboard__section" style="margin-bottom: 28px;">
            <h2>Ajouter une tranche de frais</h2>

            <form action="<?= base_url('admin/frais/add') ?>" method="post" style="display:flex; flex-wrap:wrap; gap:16px; align-items:flex-end;">
                <div>
                    <label style="display:block; margin-bottom:6px; color:#6b7280; font-size:14px;">Opération</label>
                    <select name="id_type_operation" required
                        style="padding:10px 14px; border-radius:10px; border:1px solid #e5e7eb;">
                        <?php foreach ($operations as $operation): ?>
                            <option value="<?= $operation['id'] ?>"><?= esc($operation['nom']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <label style="display:block; margin-bottom:6px; color:#6b7280; font-size:14px;">Montant minimum</label>
                    <input type="number" name="valeur_min" required
                        style="padding:10px 14px; border-radius:10px; border:1px solid #e5e7eb; width:140px;">
                </div>

                <div>
                    <label style="display:block; margin-bottom:6px; color:#6b7280; font-size:14px;">Montant maximum</label>
                    <input type="number" name="valeur_max" required
                        style="padding:10px 14px; border-radius:10px; border:1px solid #e5e7eb; width:140px;">
                </div>

                <div>
                    <label style="display:block; margin-bottom:6px; color:#6b7280; font-size:14px;">Frais</label>
                    <input type="number" name="montant_frais" required
                        style="padding:10px 14px; border-radius:10px; border:1px solid #e5e7eb; width:140px;">
                </div>

                <button type="submit" class="dashboard__button" style="height: 42px;">Ajouter frais</button>
            </form>
        </div>

        <!-- List -->
        <div class="dashboard__section">
            <h2>Liste des frais par opération</h2>

            <table class="dashboard__table">
                <thead>
                    <tr>
                        <th>Opération</th>
                        <th>Minimum</th>
                        <th>Maximum</th>
                        <th>Frais</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if (!empty($frais)): ?>
                        <?php foreach ($frais as $f): ?>
                            <tr>
                                <td><?= esc($f['nom_operation']) ?></td>
                                <td><?= esc($f['valeur_min']) ?> Ar</td>
                                <td><?= esc($f['valeur_max']) ?> Ar</td>
                                <td><?= esc($f['montant_frais']) ?> Ar</td>

                                <td style="display:flex; gap:8px; align-items:center;">
                                    <form action="<?= base_url('admin/frais/update/' . $f['id']) ?>" method="post" style="display:flex; gap:8px;">
                                        <input type="number" name="montant_frais" value="<?= esc($f['montant_frais']) ?>"
                                            style="padding:8px 10px; border-radius:8px; border:1px solid #e5e7eb; width:90px;">

                                        <button type="submit"
                                            class="dashboard__button dashboard__button--secondary" style="padding:8px 14px; font-size:13px;">
                                            Modifier
                                        </button>
                                    </form>

                                    <a href="<?= base_url('admin/frais/delete/' . $f['id']) ?>"
                                        onclick="return confirm('Supprimer ce frais ?')"
                                        class="dashboard__button dashboard__button--dark" style="padding:8px 14px; font-size:13px;">
                                        Supprimer
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5">Aucun frais configuré</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

    </div>

</body>

</html>