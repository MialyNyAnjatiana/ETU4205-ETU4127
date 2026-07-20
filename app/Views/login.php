<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Mobile Money</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login {
            background: white;
            padding: 30px;
            border-radius: 8px;
            width: 320px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .2);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #0d6efd;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background: #0b5ed7;
        }
    </style>
</head>

<body>

    <div class="login">
        <h2>Connexion</h2>

        <form action="/login" method="post">

            <label>Numéro de téléphone</label>
            <input
                type="tel"
                name="telephone"
                placeholder="Ex : 0341234567"
                pattern="0[0-9]{9}"
                required>

            <button type="submit">Continuer</button>

        </form>
    </div>

</body>

</html>
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