<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Admin <?php echo $asso_info['nom'];?> | ESIEAsso</title>
    <link rel="stylesheet" href="../views/css/assoAdminView.css" />
</head>
<body>
    <div class="page">
        <h1>Admin <?php echo $asso_info['nom'];?></h1><br>
        <a href="/associations/<?php echo $asso_info['link'];?>">Retour à la page de l'association</a><br>
        <a href="/">Accueil</a><br><br>
        <button type="button" class="col infos_col">Informations</button>
        <div class="infos_content">
            <form method='post' enctype="multipart/form-data">
                <div class="infos">
                <div>
                    <label for="asso_name">Nom de l'association : </label>
                    <input type="text" name="asso_name" id="asso_name" value="<?php echo $asso_info['nom']; ?>"><br>
                    <label for="asso_logo">Logo : </label>
                    <input type="file" name="asso_logo" id="asso_logo"><br>
                    <label for="asso_description">Description de l'association : </label>
                    <textarea name="asso_description" id="asso_description"><?php echo $asso_info['description']; ?></textarea><br>
                    <label for="asso_mail">Adresse Mail : </label>
                    <input type="text" name="asso_mail" id="asso_mail" value="<?php echo $asso_info['mail']; ?>"><br>
                    <label for="asso_site">Site web : </label>
                    <input type="text" name="asso_site" id="asso_site" value="<?php echo $asso_info['site']; ?>"><br>
                </div>
                <div class = "socials">
                    <label for="asso_instagram">Instagram : </label>
                    <input type="text" name="asso_instagram" id="asso_instagram" value="<?php echo $asso_info['instagram']; ?>"><br>
                    <label for="asso_discord">Discord : </label>
                    <input type="text" name="asso_discord" id="asso_discord" value="<?php echo $asso_info['discord']; ?>"><br>
                    <label for="asso_linkedin">Linkedin : </label>
                    <input type="text" name="asso_linkedin" id="asso_linkedin" value="<?php echo $asso_info['linkedin']; ?>"><br>
                    <label for="asso_twitter">Twitter : </label>
                    <input type="text" name="asso_twitter" id="asso_twitter" value="<?php echo $asso_info['twitter']; ?>"><br>
                    <label for="asso_youtube">Youtube : </label>
                    <input type="text" name="asso_youtube" id="asso_youtube" value="<?php echo $asso_info['youtube']; ?>"><br>
                    <label for="asso_facebook">Facebook : </label>
                    <input type="text" name="asso_facebook" id="asso_facebook" value="<?php echo $asso_info['facebook']; ?>"><br>
                </div>
                </div>
                <input class="button" type='submit' value='Modifier'>
            </form>
        </div><br><br>
        <button type="button" class="col members_col">Membres</button>
        <div class="members_content">
        <?php
        foreach($users as $user) {
            ?>
            <div class="user">
                <div class="user-infos">
                    <h2><?php echo $user['prenom']." ".$user['nom']; ?></h2>
                    <h3><?php echo $user['role'];?></h3>
                    <a href='mailto:<?php echo $user['email'] ?>'><?php echo $user['email']; ?></a>
                </div>
                <h4 class="part-title">Actions :</h4>
                <div class = "actions">
                                <form method='post'>
                                    <input type='hidden' name='del_user_id' value='<?php echo $user['user_id']; ?>'>
                                    <input type='hidden' name='del_role_id' value='<?php echo $user['role_id']; ?>'>
                                    <input class="submit" type='submit' value='Supprimer'>
                                </form><br><form method='post'>
                                    <input type='hidden' name='change_user_id' value='<?php echo $user['user_id']; ?>'>
                                    <select name="change_user_role">
                                        <?php 
                                        foreach($roles as $role){
                                            echo "<option value='".$role['id']."'".($role["id"]==$user['role_id'] ? "selected='true'":"").">".$role['nom']."</option>";
                                        }
                                        ?>
                                    </select>
                                    <input class="submit" type='submit' value='Modifier'>
                                </form><br>
                </div>
            </div>
            <?php
        } 
        ?>
        </div><br><br>
        <button type="button" class="col candidats_col">Candidats</button>
        <div class="candidats_content">
        <?php
        if($candidats == "no_candidats"){
            echo "<p>Aucune candidature</p>";
        }
        else{
            foreach($candidats as $candidat) {
                ?>
                <div class="user">
                    <div class="user-infos">
                        <h2><?php echo $candidat['prenom']." ".$candidat['nom']; ?></h2>
                        <a href='mailto:<?php echo $candidat['email'] ?>'><?php echo $candidat['email']; ?></a>
                    </div>
                    <h4 class="part-title">Actions :</h4>
                    <div class = "actions">
                        <form method='post'>
                            <input type='hidden' name='candidat_id' value='<?php echo $candidat['id']; ?>'>
                            <select name="role_candidat">
                                <?php 
                                foreach($roles as $role){
                                    echo "<option value='".$role['id']."'>".$role['nom']."</option>";
                                }
                                ?>
                            </select>
                            <select name="accept_candidat">
                                <option value="True">Accepter</option>
                                <option value="False">Refuser</option>
                            </select>
                            <input class="submit" type='submit' value='Envoyer'>
                        </form><br>
                    </div>
                </div>
                <?php
            } 
        }
        ?>
        </div><br><br>
        
        <button onclick="location.href='/event_create?asso_id=<?= $asso_info['id'] ?>&url=<?= $asso_info['link'] ?>'" class="col"> Créer un évènement </button>
    </div>
    <script>
        function collapse(coll){
        for (var i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.display === "block") {
            content.style.display = "none";
            } else {
            content.style.display = "block";
            }
        });
        }
        }
        var members = document.getElementsByClassName("members_col");
        collapse(members);
        var infos = document.getElementsByClassName("infos_col");
        collapse(infos);
        var candidats = document.getElementsByClassName("candidats_col");
        collapse(candidats);
        </script>
    </body>
</html>
