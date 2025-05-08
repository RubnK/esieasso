<?php
$campus = array(
    "Tous",
    "Ivry-sur-Seine",
    "Laval",
    "Agen & Dax"
);
function getPagesNumber($campus,$name){
    include "../models/connexion_db.php";
    $requete = $db->prepare("CALL countPages(?,?)");
    $requete->execute(array($campus,$name));
    $count = $requete->fetch();
    $pages_number = ceil($count[0]/10);
    return $pages_number;
}
function getAllAssos($campus, $name, $page){
    include "../models/connexion_db.php";
    $page = ($page-1)*10;
    $requete = $db->prepare("CALL getAllAssos(?,?,?)");
    $requete->execute(array($name,$campus,$page));
    $ids = $requete->fetchAll();
    if(!empty($ids)){
        foreach($ids as $key => $value){
            $x[]=$value[0];
        }
        return $x;
    }
}
function getAssoById($id){
    include "../models/connexion_db.php";
    $requete = $db->prepare("SELECT * FROM association WHERE id = ?;");
    $requete->execute(array($id));
    $card = $requete->fetch();
    return $card;
}

function getAllLinks(){
    include "../models/connexion_db.php";
    $requete = $db->prepare("SELECT id,link FROM association;");
    $requete->execute();
    $assos = $requete->fetchAll();
    foreach($assos as $asso){
        $link[$asso['link']] = $asso['id'];
    }
    return $link;
}

function getUsersByAsso($asso_id){
    include "../models/connexion_db.php";
    $requete = $db->prepare("CALL getUsersByAsso(?, @error)");
    $requete->execute(array($asso_id));
    $members = $requete->fetchAll();
    $requete->closeCursor();
    $error = $db->query("SELECT @error as error");
    $error = $error->fetch();
    $error = $error['error'];
    if($error == "no_error"){
        return $members;
    }
    else{
        return ["Aucun membre trouvé"];
    }
}
function joinAsso($user_id,$asso_id){
    include "../models/connexion_db.php";
    $requete = $db->prepare("CALL joinAsso(?,?,@error)");
    $requete->execute(array($user_id,$asso_id));
    $requete->closeCursor();
    $error = $db->query("SELECT @error as error");
    $error = $error->fetch();
    $error = $error['error'];
    if($error == "no_error"){
        return "Vous avez bien postulé pour l'association";
    }
    else if($error == "already_joined"){
        return "Vous avez déjà rejoint cette association";
    }
    else{
        return "Une erreur est survenue";
    }
}

function getAllAssoRoles($asso_id){
    include "../models/connexion_db.php";
    $requete = $db->prepare("SELECT id, nom FROM roles_asso WHERE asso_id = ?;");
    $requete->execute(array($asso_id));
    $roles = $requete->fetchAll();
    return $roles;
}

function isAssoAdmin($user_id,$asso_id){
    include "../models/connexion_db.php";
    $requete = $db->prepare("SELECT * FROM roles_asso JOIN user_role_asso ON roles_asso.id = user_role_asso.role_id WHERE asso_id = ? AND user_id = ?;");
    $requete->execute(array($asso_id,$user_id));
    $roles = $requete->fetchAll();
    foreach($roles as $role){
        if($role['lvl'] == "2"){
            return true;
        }
        else{
            return false;
        }
    }
}
function isInAsso($user_id,$asso_id){
    include "../models/connexion_db.php";
    $requete = $db->prepare("SELECT * FROM roles_asso JOIN user_role_asso ON roles_asso.id = user_role_asso.role_id WHERE asso_id = ? AND user_id = ?;");
    $requete->execute(array($asso_id,$user_id));
    $user = $requete->fetchAll();
    if(isset($user[0])){
        return true;
    }
    else{
        return false;
    }
}
function deleteFromAsso($user_id, $role_id){
    include "../models/connexion_db.php";
    $requete = $db->prepare("DELETE FROM user_role_asso WHERE user_id = ? AND role_id = ?;");
    $requete->execute(array($user_id,$role_id));
    header("Refresh:0");
}

function changeUserRole($user_id, $role_id){
    include "../models/connexion_db.php";
    $requete = $db->prepare("UPDATE user_role_asso SET role_id = ? WHERE user_id = ?;");
    $requete->execute(array($role_id,$user_id));
    header("Refresh:0");
}

function getAllCandidats($asso_id){
    include "../models/connexion_db.php";
    $requete = $db->prepare("SELECT id, prenom, nom, email FROM join_asso JOIN users ON users.id = join_asso.user_id WHERE asso_id = ?;");
    $requete->execute(array($asso_id));
    $candidats = $requete->fetchAll();
    if(empty($candidats)){
        return "no_candidats";
    }
    return $candidats;
}

function acceptUser($user_id,$asso_id,$role_id){
    include "../models/connexion_db.php";
    $requete = $db->prepare("CALL acceptUser(?,?,?)");
    $requete->execute(array($user_id,$asso_id,$role_id));
    header("Refresh:0");
}

function refuseUser($user_id,$asso_id){
    include "../models/connexion_db.php";
    $requete = $db->prepare("DELETE FROM join_asso WHERE user_id = ? AND asso_id = ?;");
    $requete->execute(array($user_id,$asso_id));
    header("Refresh:0");
}

function editAsso($asso_id, $name, $description, $mail, $site, $instagram, $discord, $linkedin, $twitter, $youtube){
    include "../models/connexion_db.php";
    $requete = $db->prepare("UPDATE association 
    SET association.nom = ?, 
    association.description = ?,
    association.mail = ?,
    association.site = ?,
    association.instagram = ?,
    association.discord = ?,
    association.linkedin = ?,
    association.twitter = ?,
    association.youtube = ?
    WHERE association.id = ?;");
    $requete->execute(array($name,$description,$mail,$site,$instagram,$discord,$linkedin,$twitter,$youtube,$asso_id));
    header("Refresh:0");
}

function leaveAsso($user_id,$asso_id){
    include "../models/connexion_db.php";
    $requete = $db->prepare("DELETE user_role_asso FROM user_role_asso JOIN roles_asso ON user_role_asso.role_id = roles_asso.id  WHERE user_id = ? AND asso_id = ?;");
    $requete->execute(array($user_id,$asso_id));
}

function createEvent($asso_id,$name,$description,$date,$img){
    include "../models/connexion_db.php";
    $requete = $db->prepare("INSERT INTO evenements (asso_id, nom, description, date, img) VALUES (?,?,?,?,?);");
    $requete->execute(array($asso_id,$name,$description,$date,$img));
}

function getAllEvents(){
    include "../models/connexion_db.php";
    $requete = $db->prepare("SELECT evenements.nom, evenements.description, evenements.date, evenements.img, association.nom AS asso_name, association.link AS asso_link FROM evenements JOIN association ON evenements.asso_id = association.id;");
    $requete->execute();
    $events = $requete->fetchAll();
    return $events;
}