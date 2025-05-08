<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Créer un évènement</title>
</head>
<body>
    <div class="page">
        <h1>Créer un évènement</h1>
        <form method="POST" enctype="multipart/form-data">
            <label for="titre">Titre :</label>
            <input type="text" name="titre" id="titre" required><br>

            <label for="date">Date :</label>
            <input type="date" name="date" id="date" required><br>

            <label for="description">Description :</label>
            <textarea name="description" id="description" required></textarea><br>

            <label for="image">Image :</label>
            <input type="file" name="image" id="image" required><br><br>

            <input type="submit" value="Créer un évènement">
        </form>
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
    