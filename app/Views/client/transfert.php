<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfert client</title>
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
                <li><a href="<?= base_url('/client/transfert') ?>" class="active">Transfert</a></li>
                <li><a href="<?= base_url('/client/historique') ?>">Historique</a></li>
            </ul>
            <div class="navbar__actions">
                <a href="<?= base_url('/logout') ?>" class="navbar__button">Déconnexion</a>
            </div>
        </nav>

        <div class="dashboard__header">
            <div class="dashboard__title">
                <h1>Transfert</h1>
                <p>Envoyez de l'argent à un ou plusieurs bénéficiaires.</p>
            </div>
        </div>

        <div class="card" style="max-width:700px;">
            <h2>Effectuer un transfert</h2>
            <form method="post" action="<?= base_url('/client/transfert') ?>" class="form">
                <div class="form__group">
                    <label for="beneficiaires">Numéros des bénéficiaires</label>
                    
                    <textarea id="beneficiaires" name="beneficiaires" rows="4" placeholder="0341234567, 0339876543, 0321111111" required></textarea>
                    <small>Séparez les numéros par une virgule.</small>
                </div>

                <div class="form__group">
                    <label for="frais">Gestion des frais</label>
                    <select id="frais" name="frais">
                        <option value="apart">Ajouter les frais en plus</option>
                        <option value="inclus">Déduire les frais du montant envoyé</option>
                    </select>
                </div>

                <div class="form__group">
                    <label for="montant">Montant (Ar)</label>
                    <input type="number" id="montant" name="montant" min="100" placeholder="Entrez le montant" required>
                </div>

                <button type="submit" class="dashboard__button dashboard__button--dark" style="align-self:flex-start;">Valider le transfert</button>
            </form>
            <p style="margin-top:20px; color:#6b7280; font-size:14px;">Ce formulaire est prêt pour l’implémentation de la logique de transfert.</p>
        </div>
    </div>
</body>
</html>