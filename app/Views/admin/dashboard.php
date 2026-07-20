<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/assets/css/style.css">
	<title>Accueil - Opérateur</title>
</head>

<body>
	<nav class="navbar">
		<a href="<?= base_url('/admin/dashboard') ?>" class="navbar__logo">
			Mobile Money Admin
		</a>

		<ul class="navbar__links">
			<li><a href="<?= base_url('/admin/dashboard') ?>">Accueil</a></li>
			<li><a href="<?= base_url('/admin/prefixes') ?>">Gestion des préfixes</a></li>
			<li><a href="<?= base_url('/admin/operateurs') ?>">Opérateurs &amp; commissions</a></li>
			<li><a href="<?= base_url('/admin/operations') ?>">Opérations &amp; frais</a></li>
		</ul>

		<div class="navbar__actions">
			<a class="navbar__button danger"
				href="<?= base_url('/logout') ?>"
				onclick="return confirm('Voulez-vous vous déconnecter ?')">
				Déconnexion
			</a>
		</div>
	</nav>
	<br>

	<section class="dashboard">
		<div class="dashboard__header">
			<div class="dashboard__title">
				<h1>Tableau de bord administrateur</h1>
				<p>Gestion des préfixes, des opérations, des clients et des gains du mobile money.</p>
			</div>
		</div>

		<div class="dashboard__actions">
			<a class="dashboard__button" href="<?= base_url("/admin/prefixes") ?>">Gérer les préfixes</a>
			<a class="dashboard__button" href="<?= base_url("/admin/operateurs") ?>">Gérer les opérateurs</a>
			<a class="dashboard__button dashboard__button--secondary" href="<?= base_url("/admin/operations") ?>">Gérer les opérations</a>
			<a class="dashboard__button dashboard__button--dark" href="#clients">Voir liste des clients</a>
		</div>

		<div class="dashboard__grid">
			<div class="card">
				<p class="card__label">Nombre de clients</p>
				<p class="card__value"><?= esc($clients ?? '0') ?></p>
			</div>
			<div class="card">
				<p class="card__label">Gains sur les retraits</p>
				<p class="card__value"><?= esc($gainRetrait['gain'] ?? '0') ?> Ar</p>
			</div>
			<div class="card">
				<p class="card__label">Gains sur les transferts</p>
				<p class="card__value"><?= esc($gainTransfert['gain'] ?? '0') ?> Ar</p>
			</div>
			<div class="card">
				<p class="card__label">Gains totaux</p>
				<p class="card__value"><?= esc($gainTotal['gain'] ?? '0') ?> Ar</p>
			</div>


		</div>

		<div class="dashboard__section">
			<h3>Gains par opérateur</h3>

			<table class="dashboard__table">
				<thead>
					<tr>
						<th>Opérateur</th>
						<th>Gain</th>
					</tr>
				</thead>

				<tbody>
					<?php if (!empty($gainOperateurs)): ?>
						<?php foreach ($gainOperateurs as $gain): ?>
							<tr>
								<td><?= esc($gain['operateur']) ?></td>

								<td>
									<?= number_format(
										$gain['gain'],
										0,
										',',
										' '
									) ?>
									Ar
								</td>
							</tr>
						<?php endforeach; ?>
					<?php else: ?>

						<tr>
							<td colspan="2">Aucun opérateur trouvé</td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>
		</div>

		<div class="dashboard__section" id="clients">

			<h2>Situation des comptes clients</h2>

			<table class="dashboard__table">

				<thead>
					<tr>
						<th>Numéro téléphone</th>
						<th>Solde disponible</th>
					</tr>
				</thead>
				<tbody>

					<?php if (!empty($liste)): ?>

						<?php foreach ($liste as $client): ?>
							<tr>
								<td>
									<?= esc($client['num_tel']) ?>
								</td>
								<td>
									<?= number_format(
										$client['montant_dispo'] ?? 0,
										0,
										',',
										' '
									) ?> Ar
								</td>
							</tr>

						<?php endforeach; ?>

					<?php else: ?>
						<tr>
							<td colspan="2">
								Aucun client trouvé
							</td>
						</tr>
					<?php endif; ?>

				</tbody>

			</table>

		</div>
	</section>
</body>

</html>