<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Se connecter | FitSpace</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600&family=Syne:wght@700;800&display=swap" rel="stylesheet" />
</head>

<body>
  <section id="page-login" style="background:var(--surface);">

        <form action="/connexion" method="POST">
          <div class="form-group mb-3">
            <label class="form-label">Numero de téléphone</label>
            <input type="text" name="numero" class="form-control" placeholder="1234567890" value="<?= old('numero') ?>" />
          </div>
          <button type="submit" class="btn-primary-custom">Se connecter</button>
        </form>


  </section>

</body>

</html>