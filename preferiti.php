<?php
    session_start();
    if(!isset($_SESSION["email"]))
    {
        header("Location: index.html");
        exit;
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>PAGINA PREFERITI </title>
        <link rel="stylesheet" href="preferiti.css">
        <script src="downloadRemovePreferiti.js" defer></script>
    </head>
    <body>
        <nav> <h2>I PREFERITI DI <?php echo $_SESSION['username']?> </h2>
            <button id="backHome"><a href="HomeDB.php">TORNA ALLA HOME</a></button>
        </nav>
        <section>
            <div id='strumenti'>
                <div class="opzione">
                    <p>- Stampa la lista dei preferiti</p> <button id='button1' class="stampaTutto"></button>
                </div>
                <!--
                <div class="opzione">
                    <p>- Stampa una ricetta</p> <button class="stampaTutto"></button>
                </div>
                -->
            </div>
            <div id='risultati'>

            </div>
        </section>

    
        <!--FOOTER-->
        <footer id="C_footer">
            <div class="Cfx_fblock">
                    <img id="fx_top1" src="img/logo2.jpeg.png" alt="">
                    <div id="fx_top2">
                        <img  class="fx_social" src="img/facebook.jpeg" alt="">
                        <img class="fx_social" src="img/instagram.png" alt="">
                        <img class="fx_social" src="img/tiktok.jpeg" alt="">
                        <img class="fx_social" src="img/youtube.jpeg" alt="">
                    </div>
            </div>
            <div class="Cfx_fblock">
                    <div class="Cfx_bottom">
                        <p class="fx_f1">Cookist è una testata giornalistica registrata presso il </br>
                            tribunale di Napoli n. 36 del 11/09/2019 da Youlike S.R.L. </br> 
                            P.IVA 06769051217
                        </p>
                        <p class="fx_f1">Ove non espressamente indicato, tutti i diritti di </br> 
                                        sfruttamento ed utilizzazione economica del materiale
                                        fotografico presente sul sito Cookist sono da intendersi di proprietà del fornitore Getty Images.
                        </p>
                    </div>  
                    <div class="Cfx_bottom">
                        <a class="fx_f2" href="https://www.cookist.it/privacy-policy/">PRIVACY POLICY</a>
                        </br>
                        <a class="fx_f2" href="https://www.cookist.it/cookie-policy/">COOKIE POLICY</a>
                        </br>
                        <a class="fx_f2" href="https://www.cookist.it/redazione/">REDAZIONE</a>
                        </br>
                        <a class="fx_f2" href="">MODIFICA CONSENSO</a>

                    </div>
                    <div class="Cfx_bottom">
                        <a class="fx_f2" href="https://cookist.it/user/login?action=gopage&path=/notifications">NOTIFICHE</a>
                        </br>
                        <a class="fx_f2" href="https://cookist.it/user/login?action=gopage&path=/bookmarks">RICETTE SALVATE</a>
                        </br>
                        <a class="fx_f2" href="https://cookist.it/user/login?action=gopage&path=/bookmarks">IMPOSTAZIONI</a>
                        </br>
                    </div>
            </div>
            
        </footer>
        
    </body>
</html>