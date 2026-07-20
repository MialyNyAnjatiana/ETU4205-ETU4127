<section class="dashboard">
	<style>
		.dashboard {
			padding: 32px;
			font-family: Arial, sans-serif;
			background: linear-gradient(180deg, #f7f8fc 0%, #eef2ff 100%);
			min-height: 100vh;
		}

		.dashboard__header {
			display: flex;
			justify-content: space-between;
			align-items: flex-start;
			gap: 24px;
			margin-bottom: 28px;
			flex-wrap: wrap;
		}

		.dashboard__title h1 {
			margin: 0 0 8px;
			font-size: 32px;
			color: #111827;
		}

		.dashboard__title p {
			margin: 0;
			color: #6b7280;
		}

		.dashboard__actions {
			display: grid;
			grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
			gap: 14px;
			width: 100%;
			margin-bottom: 28px;
		}

		.dashboard__button {
			display: inline-flex;
			align-items: center;
			justify-content: center;
			padding: 14px 18px;
			border-radius: 14px;
			text-decoration: none;
			font-weight: 700;
			color: #ffffff;
			background: #1d4ed8;
			box-shadow: 0 10px 24px rgba(29, 78, 216, 0.18);
			transition: transform 0.2s ease, box-shadow 0.2s ease;
		}

		.dashboard__button:hover {
			transform: translateY(-2px);
			box-shadow: 0 14px 28px rgba(29, 78, 216, 0.24);
		}

		.dashboard__button--secondary {
			background: #0f766e;
			box-shadow: 0 10px 24px rgba(15, 118, 110, 0.18);
		}

		.dashboard__button--dark {
			background: #111827;
			box-shadow: 0 10px 24px rgba(17, 24, 39, 0.18);
		}

		.dashboard__button--accent {
			background: #b45309;
			box-shadow: 0 10px 24px rgba(180, 83, 9, 0.18);
		}

		.dashboard__grid {
			display: grid;
			grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
			gap: 18px;
			margin-bottom: 28px;
		}

		.card {
			background: rgba(255, 255, 255, 0.88);
			border: 1px solid rgba(255, 255, 255, 0.9);
			border-radius: 20px;
			padding: 22px;
			box-shadow: 0 18px 40px rgba(15, 23, 42, 0.08);
			backdrop-filter: blur(8px);
		}

		.card__label {
			margin: 0 0 10px;
			color: #6b7280;
			font-size: 14px;
			text-transform: uppercase;
			letter-spacing: 0.08em;
		}

		.card__value {
			margin: 0;
			color: #111827;
			font-size: 30px;
			font-weight: 800;
		}

		.dashboard__section {
			background: #ffffff;
			border-radius: 20px;
			padding: 24px;
			box-shadow: 0 18px 40px rgba(15, 23, 42, 0.08);
		}

		.dashboard__section h2 {
			margin: 0 0 18px;
			font-size: 20px;
			color: #111827;
		}

		.dashboard__metrics {
			display: grid;
			grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
			gap: 16px;
		}

		.metric {
			padding: 18px;
			border-radius: 16px;
			background: #f9fafb;
			border: 1px solid #e5e7eb;
		}

		.metric span {
			display: block;
			color: #6b7280;
			margin-bottom: 8px;
			font-size: 14px;
		}

		.metric strong {
			font-size: 24px;
			color: #111827;
		}

		/* ===== Client Table ===== */

		.dashboard__table {
			width: 100%;
			border-collapse: separate;
			border-spacing: 0;
			overflow: hidden;
			border-radius: 16px;
			margin-top: 20px;
			background: white;
			box-shadow: 0 10px 30px rgba(15, 23, 42, 0.06);
		}

		.dashboard__table thead {
			background: #111827;
			color: white;
		}

		.dashboard__table th {
			padding: 16px 20px;
			text-align: left;
			font-size: 14px;
			text-transform: uppercase;
			letter-spacing: 0.05em;
		}

		.dashboard__table td {
			padding: 16px 20px;
			border-bottom: 1px solid #e5e7eb;
			color: #374151;
			font-size: 15px;
		}

		.dashboard__table tbody tr {
			transition: background 0.2s ease, transform 0.2s ease;
		}

		.dashboard__table tbody tr:hover {
			background: #f1f5f9;
		}

		.dashboard__table tbody tr:last-child td {
			border-bottom: none;
		}


		/* Phone number style */
		.dashboard__table td:first-child {
			font-weight: 700;
			color: #1d4ed8;
		}


		/* Balance style */
		.dashboard__table td:last-child {
			font-weight: 800;
			color: #047857;
		}


		/* Empty table message */
		.dashboard__table td[colspan] {
			text-align: center;
			color: #6b7280;
			padding: 30px;
		}


		/* ===== Card improvements ===== */

		.card {
			position: relative;
			overflow: hidden;
		}

		.card::before {
			content: "";
			position: absolute;
			left: 0;
			top: 0;
			height: 4px;
			width: 100%;
			background: #1d4ed8;
		}


		.card:nth-child(2)::before {
			background: #0f766e;
		}

		.card:nth-child(3)::before {
			background: #b45309;
		}

		.card:nth-child(4)::before {
			background: #7c3aed;
		}


		/* Number formatting */
		.card__value {
			display: flex;
			align-items: center;
			gap: 5px;
		}


		/* ===== Section animation ===== */

		.dashboard__section {
			animation: fadeIn 0.4s ease;
		}


		@keyframes fadeIn {

			from {
				opacity: 0;
				transform: translateY(10px);
			}

			to {
				opacity: 1;
				transform: translateY(0);
			}

		}


		/* ===== Mobile ===== */

		@media(max-width:768px) {

			.dashboard {
				padding: 16px;
			}


			.dashboard__table {
				display: block;
				overflow-x: auto;
			}


			.dashboard__title h1 {
				font-size: 24px;
			}


			.card__value {
				font-size: 24px;
			}

		}
	</style>

	<div class="dashboard__header">
		<div class="dashboard__title">
			<h1>Tableau de bord administrateur</h1>
			<p>Gestion des préfixes, des opérations, des clients et des gains du mobile money.</p>
		</div>
	</div>

	<div class="dashboard__actions">
		<a class="dashboard__button" href="#prefixes">Gérer les préfixes</a>
		<a class="dashboard__button dashboard__button--secondary" href="#operations">Gérer les opérations</a>
		<a class="dashboard__button dashboard__button--dark" href="#clients">Voir liste des clients</a>
		<a class="dashboard__button dashboard__button--accent" href="#gains">Voir les gains</a>
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