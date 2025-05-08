<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../views/navbar.css">
    </head>
    <body>
        <header>
            <nav class="navbar">
                <a href="/" class="logo"><img src="../img/esieasso_logo.png"/></a>
                <div class="nav-links" id="nav">
                    <ul>
                        <li><a href="/associations?search=&campus=Tous">Associations</a></li>
                        <li><a href="/evenements">Évènements</a></li>
                        <?php //<li><a href="/actualites">Actualités</a></li> ?>
                    </ul>
                </div>
                <a href="<?php if(isset($_SESSION['user'])){echo "/account";}
                else if(isset($_COOKIE['user'])){echo "/account";}
                else{echo "/login";}?>" class="account"><svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 448 512"><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg></a>
                <a onclick="menu()" class="navmenu-bars"><svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 448 512"><path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg></a>
            </nav>
        </header>
        <script>
            if(window.screen.width<=900){
                    document.getElementById("nav").classList.remove("active");
            }
            function menu(){
                if(document.getElementById("nav").classList == 'nav-links'){
                    document.getElementById("nav").classList.add("active");
                    document.querySelector("header").style.position = "fixed";
                }
                else{
                    document.getElementById("nav").classList.remove("active");
                    document.querySelector("header").style.position = "relative";
                }
            }
        </script>
    </body>
</html>