<!DOCTYPE html>
<html>
    <head>
        <title>INDEX</title>
        <link rel="stylesheet" href="index.css">
        <script src="loginValidation.js" defer ></script>
        <script src="index.js" defer></script>
    </head>
    <body>
        <nav>
            <img id='logo' src="img/cookist_logo.png" alt="">
            <div class="pulsanti">
                <button id="pulsante_login">ACCEDI</button>
                <button id="pulsante_registrazione">REGISTRATI</button>
            </div>
        </nav>
        <header id="box_info" class="flex">
            <div>
                <h2 id="titolo_box_info">BENVENUTO IN <img src="img2/logo2.png" alt="" id="logo"> ACCEDI O REGISTRATI PER POTER:</h2>
                <div class="info"><img src="img2/elenco.png" alt=""> CERCARE I LIBRI DEI MIGLIORI CHEF AL MONDO <img src="img2/libro.jpeg" alt=""></div>
                <div class="info"><img src="img2/elenco.png" alt=""> ASCOLTARE I PODCAST CULINARI PER MIGLIORARE LE TUE RICETTE <img src="img2/spotify.png" alt=""></div>
                <div class="info"><img src="img2/elenco.png" alt=""> RICERCA UN QUALUNQUE INGREDIENTE PER AVERE ACCESSO A TANTE RICETTE SFIZIOSE <img src="img2/icons8-cucchiaio-30.png" alt=""></div>
                <div class="info"><img src="img2/elenco.png" alt=""> AGGIUNGI AI PREFERITI LE TUE RICETTE PER AVERLE SEMPRE A PORTATA DI CLICK <img src="img2/preferito.png" alt=""></div>
            </div>
        </header>
        <section>
            <!--LOGIN-->
            <div id="box_login" class="hidden" >
                <h2>LOGIN</h2>
                <img src="img2/logo2.png" alt="">
                <form id='form_login' method='post' action="login.php">
                    <p>Email</p>
                    <input type="text" name='email'>
                    <div id='email' class="hidden">Errore nel campo 'Email'</div>

                    <p>Password</p>
                    <input type="password" name='password'>
                    <div id="password" class="hidden">Errore nel campo 'Password'</div>
                    <div>
                    <input id='invia' type="submit">
                    </div>
                    <p>Non hai ancora un account? <a id="linkRegistrazione" href="Registrazione.php">Registrati</a></p>
                </form>
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