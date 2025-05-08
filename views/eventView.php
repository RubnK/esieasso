<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Évènements | ESIEAsso</title>
    <link rel="stylesheet" href="../views/css/eventView.css" />
</head>
<body>
    <div class="page">
        <h1>Évènements</h1>
        <div class="events">
            <?php
            foreach($events as $event) {
                ?>
                <div class="event">
                        <a href="/associations/<?= $event['asso_link'] ?>">
                        <div class="asso">
                            <img src="<?= '/img/assos/'.$event['asso_link'].".png"; ?>">
                            <h2><?= $event['asso_name']; ?></h2>
                        </div>
                        </a><br>
                    <div class="event-container">
                        <img src="<?= '/img/events/'.$event['img']; ?>" alt="Image de l'évènement">
                        <div class="event-infos">
                            <h2><?= $event['nom']; ?></h2>
                            <h3><?= $event['date']; ?></h3>
                            <p><?= $event['description']; ?></p>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    <style>
    .page{
        position: absolute;
        top: 100px;
        text-align:center;
        width:100%;
        z-index: 500;
    }
    .events{
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .event{
        align-items: center;
        width: 50%;
        margin: 20px 0;
        background-color: #f1f1f1;
    }
    .event-container{
        display: flex;
        flex-direction: row;
        align-items: center;
        width: 100%;
    }
    img{
        width: 50%;
        margin-right: 20px;
    }
    .events a{
        text-decoration: none;
        color: black;
        width: 100%;
    }
    .asso{
        display: flex;
        flex-direction: row;
        align-items: center;
        width: 50%;
    }
    .asso h2{
        font-size: 1.2em;
        width:300px;
        text-align: left;
    }
    .asso img{
        height: 37.5px;
        width: 50px;
        margin-right: 20px;
        border-radius: 5px;
    }
    </style>
</body>
</html>