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
                <h1>Gestion des préfixes</h1>
                <p>Ajoutez, modifiez ou supprimez les préfixes des opérateurs.</p>
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

        <!-- Add prefix -->
        <div class="dashboard__section" style="margin-bottom: 28px;">
            <h2>Ajouter un préfixe</h2>

            <form action="<?= base_url('admin/prefixes/add') ?>" method="post" style="display:flex; flex-wrap:wrap; gap:16px; align-items:flex-end;">
                <div>
                    <label style="display:block; margin-bottom:6px; color:#6b7280; font-size:14px;">Préfixe</label>
                    <input type="text" name="valeur" maxlength="3" placeholder="Ex: 034" required
                        style="padding:10px 14px; border-radius:10px; border:1px solid #e5e7eb;">
                </div>

                <div>
                    <label style="display:block; margin-bottom:6px; color:#6b7280; font-size:14px;">Opérateur</label>
                    <select name="id_operateur" style="padding:10px 14px; border-radius:10px; border:1px solid #e5e7eb;">
                        <option value="">Cet opérateur</option>
                        <?php foreach ($operateurs as $operateur): ?>
                            <option value="<?= $operateur['id'] ?>"><?= esc($operateur['nom']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <button type="submit" class="dashboard__button" style="height: 42px;">Ajouter</button>
            </form>
        </div>

        <!-- List -->
        <div class="dashboard__section">
            <h2>Liste des préfixes</h2>

            <table class="dashboard__table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Préfixe</th>
                        <th>Opérateur</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if (!empty($prefixes)): ?>
                        <?php foreach ($prefixes as $prefixe): ?>
                            <tr>
                                <form action="<?= base_url('admin/prefixes/update/' . $prefixe['id']) ?>" method="post" id="form-<?= $prefixe['id'] ?>">
                                </form>

                                <td><?= esc($prefixe['id']) ?></td>

                                <td>
                                    <input type="text" name="valeur" value="<?= esc($prefixe['valeur']) ?>" maxlength="3" required
                                        form="form-<?= $prefixe['id'] ?>"
                                        style="padding:8px 10px; border-radius:8px; border:1px solid #e5e7eb; width:70px;">
                                </td>

                                <td>
                                    <select name="id_operateur" form="form-<?= $prefixe['id'] ?>"
                                        style="padding:8px 10px; border-radius:8px; border:1px solid #e5e7eb;">
                                        <option value="">Cet opérateur</option>
                                        <?php foreach ($operateurs as $operateur): ?>
                                            <option
                                                value="<?= $operateur['id'] ?>"
                                                <?= ($prefixe['id_operateur'] == $operateur['id']) ? 'selected' : '' ?>>
                                                <?= esc($operateur['nom']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>

                                <td style="display:flex; gap:8px;">
                                    <button type="submit" form="form-<?= $prefixe['id'] ?>"
                                        class="dashboard__button dashboard__button--secondary" style="padding:8px 14px; font-size:13px;">
                                        Modifier
                                    </button>

                                    <a href="<?= base_url('admin/prefixes/delete/' . $prefixe['id']) ?>"
                                        onclick="return confirm('Supprimer ce préfixe ?')"
                                        class="dashboard__button dashboard__button--dark" style="padding:8px 14px; font-size:13px;">
                                        Supprimer
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4">Aucun préfixe trouvé</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

    </div>
</body>

</html>