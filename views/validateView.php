<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../views/style.css">
        <title>Associations | ESIEAsso</title>
    </head>
    <body>
        <div class="page">
            <p>Cliquez sur le lien dans le mail qui vous a été envoyé ou entrez votre mail et le code de confirmation ci-dessous.</p><br>
            <form method="get">
                <label for="mail">Adresse mail:</label>
                <input type="text" name="mail"><br>
                <label for="activation_code">Code d'activation:</label>
                <input type="text" name="activation_code"><br>
                <input type="submit" value="Activer">
            </form>
            <br>
            <p><?php echo $error; ?></p>
        </div>
        <style>
        .page{
            position: absolute;
            top: 100px;
            text-align:center;
            width:100%;
            z-index: 500;
        }
        </style>
    </body>
</html>