<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Mon compte | ESIEAsso</title>
</head>
<body>
    <div class="page">
        <h1>Mon compte</h1>
        <p>Connecté en tant que <?= $user['prenom']." ".$user['nom']; ?></p>
        <p><a href="/logout">Se déconnecter</a></p>
        <p><a href="/controllers/deleteAccount.php">Supprimer le compte</a></p>
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