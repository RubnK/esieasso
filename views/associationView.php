<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?php echo $asso_info['nom'];?> | ESIEAsso</title>
    <link rel="stylesheet" href="../src/css/style.css" />
</head>
<body>
    <div class="page">
        <h1><?php echo $asso_info['nom'];?></h1>
        <div class="container">
            <div class="row">
                <img src="../img/assos/<?php echo $asso_info['link'] ?>.png" class="asso-logo" alt="Logo de l'association <?php echo $asso_info['nom']?>" class="img-fluid">
                <div class="column">
                    <p class="desc"><?php echo nl2br($asso_info["description"]);?></p>
                    <div class="rs">
                        <?php if($asso_info['mail']!=NULL){ ?>
                        <a href="mailto:<?php echo $asso_info['mail']; ?>" class="mail"><svg viewBox="0 0 512 512"><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg></a>
                        <?php } ?>
                        
                        <?php if($asso_info['site']!=NULL){ ?>
                        <a href="<?php echo $asso_info['site']; ?>" class="site"><svg viewBox="0 0 512 512"><path d="M352 256c0 22.2-1.2 43.6-3.3 64H163.3c-2.2-20.4-3.3-41.8-3.3-64s1.2-43.6 3.3-64H348.7c2.2 20.4 3.3 41.8 3.3 64zm28.8-64H503.9c5.3 20.5 8.1 41.9 8.1 64s-2.8 43.5-8.1 64H380.8c2.1-20.6 3.2-42 3.2-64s-1.1-43.4-3.2-64zm112.6-32H376.7c-10-63.9-29.8-117.4-55.3-151.6c78.3 20.7 142 77.5 171.9 151.6zm-149.1 0H167.7c6.1-36.4 15.5-68.6 27-94.7c10.5-23.6 22.2-40.7 33.5-51.5C239.4 3.2 248.7 0 256 0s16.6 3.2 27.8 13.8c11.3 10.8 23 27.9 33.5 51.5c11.6 26 20.9 58.2 27 94.7zm-209 0H18.6C48.6 85.9 112.2 29.1 190.6 8.4C165.1 42.6 145.3 96.1 135.3 160zM8.1 192H131.2c-2.1 20.6-3.2 42-3.2 64s1.1 43.4 3.2 64H8.1C2.8 299.5 0 278.1 0 256s2.8-43.5 8.1-64zM194.7 446.6c-11.6-26-20.9-58.2-27-94.6H344.3c-6.1 36.4-15.5 68.6-27 94.6c-10.5 23.6-22.2 40.7-33.5 51.5C272.6 508.8 263.3 512 256 512s-16.6-3.2-27.8-13.8c-11.3-10.8-23-27.9-33.5-51.5zM135.3 352c10 63.9 29.8 117.4 55.3 151.6C112.2 482.9 48.6 426.1 18.6 352H135.3zm358.1 0c-30 74.1-93.6 130.9-171.9 151.6c25.5-34.2 45.2-87.7 55.3-151.6H493.4z"/></svg></a>
                        <?php } ?>

                        <?php if($asso_info['instagram']!=NULL){ ?>
                        <a href="<?php echo $asso_info['instagram']; ?>" class="instagram"><svg viewBox="0 0 448 512"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg></a>
                        <?php } ?>
                        
                        <?php if($asso_info['discord']!=NULL){ ?>
                        <a href="<?php echo $asso_info['discord']; ?>" class="discord"><svg viewBox="0 0 640 512"><path d="M524.5 69.8a1.5 1.5 0 0 0 -.8-.7A485.1 485.1 0 0 0 404.1 32a1.8 1.8 0 0 0 -1.9 .9 337.5 337.5 0 0 0 -14.9 30.6 447.8 447.8 0 0 0 -134.4 0 309.5 309.5 0 0 0 -15.1-30.6 1.9 1.9 0 0 0 -1.9-.9A483.7 483.7 0 0 0 116.1 69.1a1.7 1.7 0 0 0 -.8 .7C39.1 183.7 18.2 294.7 28.4 404.4a2 2 0 0 0 .8 1.4A487.7 487.7 0 0 0 176 479.9a1.9 1.9 0 0 0 2.1-.7A348.2 348.2 0 0 0 208.1 430.4a1.9 1.9 0 0 0 -1-2.6 321.2 321.2 0 0 1 -45.9-21.9 1.9 1.9 0 0 1 -.2-3.1c3.1-2.3 6.2-4.7 9.1-7.1a1.8 1.8 0 0 1 1.9-.3c96.2 43.9 200.4 43.9 295.5 0a1.8 1.8 0 0 1 1.9 .2c2.9 2.4 6 4.9 9.1 7.2a1.9 1.9 0 0 1 -.2 3.1 301.4 301.4 0 0 1 -45.9 21.8 1.9 1.9 0 0 0 -1 2.6 391.1 391.1 0 0 0 30 48.8 1.9 1.9 0 0 0 2.1 .7A486 486 0 0 0 610.7 405.7a1.9 1.9 0 0 0 .8-1.4C623.7 277.6 590.9 167.5 524.5 69.8zM222.5 337.6c-29 0-52.8-26.6-52.8-59.2S193.1 219.1 222.5 219.1c29.7 0 53.3 26.8 52.8 59.2C275.3 311 251.9 337.6 222.5 337.6zm195.4 0c-29 0-52.8-26.6-52.8-59.2S388.4 219.1 417.9 219.1c29.7 0 53.3 26.8 52.8 59.2C470.7 311 447.5 337.6 417.9 337.6z"/></svg></a>
                        <?php } ?>
                        
                        <?php if($asso_info['linkedin']!=NULL){ ?>
                        <a href="<?php echo $asso_info['linkedin']; ?>" class="linkedin"><svg viewBox="0 0 448 512"><path d="M100.3 448H7.4V148.9h92.9zM53.8 108.1C24.1 108.1 0 83.5 0 53.8a53.8 53.8 0 0 1 107.6 0c0 29.7-24.1 54.3-53.8 54.3zM447.9 448h-92.7V302.4c0-34.7-.7-79.2-48.3-79.2-48.3 0-55.7 37.7-55.7 76.7V448h-92.8V148.9h89.1v40.8h1.3c12.4-23.5 42.7-48.3 87.9-48.3 94 0 111.3 61.9 111.3 142.3V448z"/></svg></a>
                        <?php } ?>
                        
                        <?php if($asso_info['twitter']!=NULL){ ?>
                        <a href="<?php echo $asso_info['twitter']; ?>" class="twitter"><svg viewBox="0 0 512 512"><path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/></svg></a>
                        <?php } ?>
                        
                        <?php if($asso_info['youtube']!=NULL){ ?>
                        <a href="<?php echo $asso_info['youtube']; ?>" class="youtube"><svg viewBox="0 0 576 512"><path d="M549.7 124.1c-6.3-23.7-24.8-42.3-48.3-48.6C458.8 64 288 64 288 64S117.2 64 74.6 75.5c-23.5 6.3-42 24.9-48.3 48.6-11.4 42.9-11.4 132.3-11.4 132.3s0 89.4 11.4 132.3c6.3 23.7 24.8 41.5 48.3 47.8C117.2 448 288 448 288 448s170.8 0 213.4-11.5c23.5-6.3 42-24.2 48.3-47.8 11.4-42.9 11.4-132.3 11.4-132.3s0-89.4-11.4-132.3zm-317.5 213.5V175.2l142.7 81.2-142.7 81.2z"/></svg></a>
                        <?php } ?>
                        
                        <?php if($asso_info['facebook']!=NULL){ ?>
                        <a href="<?php echo $asso_info['facebook']; ?>" class="facebook"><svg viewBox="0 0 320 512"><path d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z"/></svg></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php  
            echo "<br/>";
            if ($users[0] == "Aucun membre trouvé"){
                echo "<p>Aucun membre trouvé</p>";
            }
            else{
                echo "<p>Membres :</p>";
                foreach($users as $user) {
                    echo "<p>".$user['prenom']." ".$user['nom']." (<a href='mailto:".$user['email']."'>".$user['email']."</a>) : ".$user['role']."</p>";
                } 
            }
            if(isset($user_id) && !$inAsso){
            ?>
            <form method="post">
                <input type="hidden" name="join" value="True">
                <input type="submit" class="button" value="Rejoindre l'association">
            </form>
            <p> <?= $message ?> </p>
            <?php } 
            else if(isset($user_id) && $inAsso){?>
                <form method="post">
                    <input type="hidden" name="leave" value="True">
                    <input type="submit" class="button" value="Quitter l'association">
                </form>
            <p> <?= $message ?> </p><br>
            <?php}
            if(isset($isAdmin) && $isAdmin){
            ?>
            <a href="/asso_admin/<?php echo $asso_info['link']; ?>" class="button">Administration</a>
            <br><br>
            <?php } ?>
        </div>
        <?php include_once "../views/footer.php"; ?>
    </div>
    <style>
    .page{
        position: absolute;
        top: 100px;
        width:95%;
        z-index: 500;
        margin: 0 2.5%;
    }
    .column{
        display: flex;
        flex-direction: column;
        width: 100%;
    }
    .desc{
        margin: 2rem 1rem;
        font-size: 1rem;
    }
    .rs{
        margin:1rem auto;

    }
    .rs a{
        background-color: #151d34;
        margin: 0 .2rem;
        border-radius: 100%;
        padding: .9rem;
        justify: space-around;
        transition: all .2s linear;
    }
    .rs a:hover{
        padding: 1rem;
    }
    .rs a:hover svg{
        height: 1.6rem;
        width:1.6rem;
    }
    .rs svg{
        height: 1.5rem;
        width:1.5rem;
        vertical-align: middle;
        fill:white;
    }
    .site:hover{
        background-color: #f59e00;
    }
    .mail:hover{
        background-color: #f59e00;
    }
    .youtube:hover{
        background-color: #ff0000;
    }
    .instagram:hover{
        background: rgba(221,42,123,1);
    }
    .twitter:hover{
        background-color: #000000;
    }
    .twitch:hover{
        background-color: #a441f7;
    }
    .discord:hover{
        background-color: #6f84d4;
    }
    .linkedin:hover{
        background-color: #0270ad;
    }
    .facebook:hover{
        background-color: #4267B2;
    }
    .asso-logo{
        width: 500px;
        height: 375px;
        border-top-left-radius: 5% 7%;
        border-top-right-radius: 5% 7%;
        border-bottom-left-radius: 5% 7%;
        border-bottom-right-radius: 5% 7%;
        margin: 1rem;
    }
    .row{
        display: flex;
        flex-direction: row;
    }
    .button{
        width: 15rem;
        margin: 1rem auto;
        padding: .6rem;
        border: none;
        border-radius: 5px;
        background-color: #36a9e1;
        color: white;
        text-decoration: none;
        text-align: center;
        transition: all .2s linear;
    }
    .button:hover{
        background-color: #f59e00;
    }
    </style>
</body>
</html>