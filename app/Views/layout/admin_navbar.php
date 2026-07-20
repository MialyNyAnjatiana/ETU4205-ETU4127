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