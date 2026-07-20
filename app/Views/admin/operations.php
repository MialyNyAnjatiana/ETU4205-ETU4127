<h1>Gestion des opérations et frais</h1>


<?php if (session()->getFlashdata('success')): ?>

    <p>
        <?= session()->getFlashdata('success') ?>
    </p>

<?php endif; ?>


<hr>

<h2>Ajouter une tranche de frais</h2>

<form action="<?= base_url('admin/frais/add') ?>" method="post">
    <label>Opération :</label>
    <select name="id_type_operation" required>
        <?php foreach ($operations as $operation): ?>

            <option value="<?= $operation['id'] ?>">
                <?= esc($operation['nom']) ?>
            </option>

        <?php endforeach; ?>
    </select>

    <br><br>

    <label>Montant minimum :</label>
    <input type="number" name="valeur_min" required>

    <br>


    <label>
        Montant maximum :
    </label>

    <input type="number" name="valeur_max" required>

    <br>

    <label>Frais :</label>

    <input type="number" name="montant_frais" required>

    <br>

    <button type="submit">Ajouter frais</button>
</form>

<hr>

<h2>Liste des frais par opération</h2>


<table border="1" cellpadding="8">
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
                    <td>
                        <?= esc($f['nom_operation']) ?>
                    </td>

                    <td>
                        <?= esc($f['valeur_min']) ?> Ar
                    </td>

                    <td>
                        <?= esc($f['valeur_max']) ?> Ar
                    </td>

                    <td>
                        <?= esc($f['montant_frais']) ?> Ar
                    </td>

                    <td>
                        <form
                            action="<?= base_url('admin/frais/update/' . $f['id']) ?>"
                            method="post">

                            <input
                                type="number"
                                name="montant_frais"
                                value="<?= esc($f['montant_frais']) ?>">


                            <button type="submit">
                                Modifier
                            </button>
                        </form>

                        <a
                            href="<?= base_url('admin/frais/delete/' . $f['id']) ?>"
                            onclick="return confirm('Supprimer ce frais ?')">
                            Supprimer
                        </a>
                    </td>
                </tr
            <?php endforeach; ?>



        <?php else: ?>
            <tr>
                <td colspan="5">
                    Aucun frais configuré
                </td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>