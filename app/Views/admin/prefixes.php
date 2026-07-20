<h1>Gestion des préfixes</h1>

<!-- Message -->
<?php if (session()->getFlashdata('success')): ?>

    <p>
        <?= session()->getFlashdata('success') ?>
    </p>

<?php endif; ?>


<?php if (session()->getFlashdata('error')): ?>

    <p>
        <?= session()->getFlashdata('error') ?>
    </p>

<?php endif; ?>


<hr>


<h2>Ajouter un préfixe</h2>

<form action="<?= base_url('admin/prefixes/add') ?>" method="post">

    <label>
        Préfixe :
    </label>

    <input 
        type="text"
        name="valeur"
        maxlength="3"
        placeholder="Ex: 034"
        required
    >

    <button type="submit">
        Ajouter
    </button>

</form>


<hr>


<h2>Liste des préfixes</h2>


<table border="1" cellpadding="8">

    <thead>
        <tr>
            <th>ID</th>
            <th>Préfixe</th>
            <th>Actions</th>
        </tr>
    </thead>


    <tbody>

    <?php if (!empty($prefixes)): ?>

        <?php foreach ($prefixes as $prefixe): ?>

            <tr>

                <td>
                    <?= esc($prefixe['id']) ?>
                </td>


                <td>
                    <form 
                        action="<?= base_url('admin/prefixes/update/'.$prefixe['id']) ?>"
                        method="post"
                    >

                        <input
                            type="text"
                            name="valeur"
                            value="<?= esc($prefixe['valeur']) ?>"
                            maxlength="3"
                            required
                        >

                        <button type="submit">
                            Modifier
                        </button>

                    </form>
                </td>


                <td>

                    <a 
                        href="<?= base_url('admin/prefixes/delete/'.$prefixe['id']) ?>"
                        onclick="return confirm('Supprimer ce préfixe ?')"
                    >
                        Supprimer
                    </a>

                </td>


            </tr>

        <?php endforeach; ?>
    <?php else: ?>

        <tr>
            <td colspan="3">
                Aucun préfixe trouvé
            </td>
        </tr>

    <?php endif; ?>


    </tbody>

</table>