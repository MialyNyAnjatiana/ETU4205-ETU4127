<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Mobile Money</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/login.css') ?>">

</head>

<body>

    <div class="login">
        <h2>Connexion</h2>

          <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert--error" style="margin-bottom: 20px;">
                    <span class="alert__icon"></span>
                    <div class="alert__content">
                        <strong>Erreur</strong>
                        <?= esc(session()->getFlashdata('error')) ?>
                    </div>
                </div>
            <?php endif; ?>

                        <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert--success" style="margin-bottom: 20px;">
                    <span class="alert__icon"></span>
                    <div class="alert__content">
                        <strong>Succès</strong>
                        <?= esc(session()->getFlashdata('success')) ?>
                    </div>
                </div>
            <?php endif; ?>

    <form action="/login" method="post">
        <div class="form-group">
        <label>Numéro de téléphone</label>
        <input type="tel" name="numero" placeholder="Ex : 0341234567" pattern="0[0-9]{9}" required>

            </div>
        <button type="submit" class="btn-login">Continuer</button>

        </form>
    </div>

</body>

</html>
