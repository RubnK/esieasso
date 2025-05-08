<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Associations | ESIEAsso</title>
    </head>
    <body>
        <div class="page">
            <h1 class="titre">Associations</h1>
            <form method="GET" class="searchfilter">
                <div class="search-wrap">
                    <input type="search" name="search" class="search-input" value="<?php if(isset($search)){echo $search;}?>" placeholder="Recherche">
                    <button type="submit" class="search-btn"><svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 512 512"><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg></button>
                </div>
                <div class="filter-wrap">
                    <label for="campus">Choisir un campus : </label>
                    <select name="campus" id="campus" onchange="this.form.submit()">
                        <?php 
                        foreach($campus as $name){
                            echo "<option value='$name'".($_GET['campus'] == $name ? 'selected="true"':"").">$name</option>";
                        }
                        ?>
                    </select>
                </div>
            </form>
            <div class="catalogue">
                <?php
                if(empty($AllAssos)){
                    echo "<p class='noasso'>Aucune association trouvée.</p>";
                }
                else{
                    foreach($AllAssos as $id){
                        $card = getAssoById($id);
                        $shortdesc = "";
                        if(str_word_count($card['description'])>15){
                            for($i=0;$i<15;$i++){
                                $shortdesc .= ' '.explode(" ", $card['description'], 16)[$i];
                            }
                            $shortdesc.="...";
                        }
                        else{
                            $shortdesc = $card['description'];
                        }
                        include "../views/card.php";
                    }
                }
                ?>
            </div>
            <div class="pagination">
                <?php
                if($pages_number>1){
                    for($page=1;$page<$pages_number+1;$page++){
                        echo "<a href='/associations?page=".$page."&campus=".$selectCampus."&search=".$search."'";
                        if($page==$_GET['page']){echo "id=current_page";}
                        echo ">".$page." </a>";
                    }
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
.catalogue{
    display: grid;
    grid-template-columns: repeat(2,43%);
    justify-content:space-evenly;
}
.noasso{
    position: absolute;
    justify-self: center;
    margin: 4rem;
    font-size: 1.5rem;
}
.searchfilter{
    margin-top: 1rem;
    display: flex;
    flex-direction: row;
    justify-content: space-around;
}
.search-wrap{   
    display: flex;
}
.search-btn{
    width: 40px;
    height: 36px;
    border: 1px solid #36a9e0;
    background: #36a9e0;
    color: #fff;
    border-radius: 0 5px 5px 0;
    cursor: pointer;
}
.filter-wrap{
    display: flex;
    line-height: 36px;
}
.filter-wrap select{
    cursor: pointer;
    height: 36px;
    margin-left: 4px;
}
.search-input{
    width: 15rem;
}
@media screen and (max-width: 1200px) {
    .catalogue{
        grid-template-columns : repeat(2,51%)
    }
}
@media screen and (max-width: 900px) {
    .catalogue{
        grid-template-columns : repeat(1,80%)
    }
    .searchfilter{
        flex-direction: column;
        align-items: center;
    }
    .search-wrap{
        margin-bottom: 1rem;
    }
}
</style>
<style>
    .card{
        width: 80%;
        box-sizing: border-box;
        margin: 2rem auto;
        box-shadow: 1px 3px 4px rgba(0, 0, 0, 0.2);
        overflow: hidden;
        display: flex;
        flex-direction: column;
        transition: transform 0.3s ease-in-out;
        color: black;
    }  
    .card:hover {
        transform: scale(1.02);
    }
    .card img {
        height: 20rem;
        width: 100%;
        object-fit: cover;
        border-radius: 6px 6px 0 0;
    }
    .card-content {
        background-color: white;
        padding: 0.3rem 2rem 1rem 2rem;
    }
    .card-campus {
        display: inline-block;
        background-color: #36a9e0;
        color: white;
        border-radius: 15px;
        padding: 0 1rem;
        margin: 5px 0;
    }
    @media screen and (max-width: 600px) {
        .card img {
            height: 15rem;
        }
    }
    @media screen and (max-width: 450px) {
        .card img {
            height: 10rem;
        }
        .card h1 {
            font-size: 150%;
        }
        .card-content {
            background-color: white;
            padding: 0.3rem .5rem 1rem .5rem;
        }
    }
    @media screen and (max-width: 300px) {
        .card img {
            height: 7rem;
        }
        .card h1 {
            font-size: 130%;
        }
    }
    @media screen and (max-width: 220px) {
        .card img {
            height: 5rem;
        }
    }
</style>
    </body>
</html>