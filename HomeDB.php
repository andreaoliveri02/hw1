<?php
session_start();
//se l'utente non è loggato rimanda al login
if(!isset($_SESSION["email"]))
{
    header("Location: index.html");
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>HOME</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="home.css">
        <link rel="stylesheet" href="navBar.css">
        <script src="ricercaIngrediente.js"></script>
        <script src="APISpotifyPodcast.js"></script>
        <script src="home.js" defer> </script>
    </head>
    <body>
        <nav id='nav1'>
            <div class="barraLogout">
                <div id='benvenuto'>
                    <h1>BENVENUTO/A <?php echo $_SESSION['username']?></h1> 
                </div>
                <div id='logout'>
                    <button id="pulsante_preferiti"><a id='linkLogout' href="preferiti.php">PREFERITI</a></button>
                    <button id="pulsante_login"><a id='linkLogout' href="Logout.php">LOGOUT</a></button>
                </div>
                
            </div>
        </nav>

        <div id="Bordo_grigioOpacizzato"> <!--PER FARE IL BORDO GRIGIO OPACIZZATO-->
            <!--BARRA DI NAVIGAZIONE E MENU-->
            <nav id="C_barraNavigazione">
                <div class="fx_logo">
                    <img class="fx_logo" src="img/cookist_logo.png" alt="">
                </div>
                <div id="C_menu">
                    <span class="fx_menu2">RICETTE</span>
                    <span class="fx_menu1">LIBRI</span>
                    <span class="fx_menu3">PODCAST</span>
                    

                    <img class= "fx_button2" data-control='0' src="img/ricerca.png" alt="">
                    <img class= "fx_button" src="img/campanella.png" alt="">
                    <img class= "fx_button" src="img/account.png" alt="">
                    <img class= "fx_button1" data-control='0' src="img/elenco.png" alt="">
                </div>  
            </nav>
          

            
            <!--PRIMO HEADER-->
            <header id="C_header1">
                <img class= "fx_imgLogo" src="img/zeppole.png" alt="">
                <div id="layer">Zeppole di San Giuseppe</div>
                      
                <!--API DATO INGREDIENTE RESTITUISCE RICETTA-->
                <div id="APIricercaIngrediente" class="hidden">
                    <form id="formRicercaIngrediente">
                        Inserisci un ingrediente
                        <input type="text" id="ingrediente">
                        <input type="submit" id="submit" value="Cerca">
                    </form>
            
                    <section id="ricette">
            
                    </section>
                </div>
                <!--API SPOTIFY-->
                <div id="APIpodcastSpotify" class="hidden" >
                    <form id="formPodcastSpotify">
                        Inserisci il nome di un podcast di cucina 
                        <input type="text" id="podcast">
                        <input type="submit" id="submit" value="Cerca">
                    </form>
            
                    <section id="libreriaAlbum">
            
                    </section>
                </div>

                <div id="APIricercaLIbri" class="hidden">
                    <form id="formRicercaLibri">
                        Inserisci il nome di un cuoco famoso
                        <input type="text" id="libriRicette">
                        <input type="submit" id="submit" value="Cerca">
                    </form>
            
                    <section id="libreria">
            
                    </section>

                </div>
            </div>
                </div>
                <!--MENU A TENDINA CLICK-->
                <div id="tendina"  class="hidden" >
                    <div id="C_tendina_menu">
                        <a class="fx_elenco" href="https://www.cookist.it/news/">• NEWS</a>
                        <a class="fx_elenco" href="https://cookist.it/user/login?action=gopage&path=/bookmarks">• RICETTE SALVATE</a>
                        <a class="fx_elenco" href="https://www.cookist.it/redazione/">• CHI SIAMO?</a>
                        <a class="fx_elenco" href="https://cookist.it/user/login?action=gopage&path=/settings">• IMPOSTAZIONI</a>  
                    </div>
                </div>
            </header> 


            <!-- SECONDO HEADER-->
            <header id="C_header2">
                <div class="Cfx_blocchiVerticali">
                    <img class="fx_img" src="img/img1.png" alt="">
                    <div class="fx_titolo"> Pasticcieri e pasticcerie</div>
                    <a class="fx_paragrafo" href="">I suggerimenti di Ernst <br/> 
                        Knam per fare l'uovo di Pasqua perfetto a casa</a> 
                    
                </div>
                <div class="Cfx_blocchiVerticali">
                    <img class="fx_img" src="img/img2.png" alt="">
                    <div class="fx_titolo"> Healthy sound</div>
                    <a class="fx_paragrafo" href="">Qual è il momento </br>
                                                    migliore della giornata 
                                                    per mangiare i dolci? 
                                                    La risposta della dietista        
                    </a>
                </div>
                <div class="Cfx_blocchiVerticali">
                    <img class="fx_img" src="img/img3.png" alt="">
                    <div class="fx_titolo"> Luoghi e Sapori</div>
                    <a class="fx_paragrafo" href="">Spiedini giapponesi:</br>
                        alla scoperta degli irresistibili yakitori e tsukune
                    </a>
                </div>
                <div class="Cfx_blocchiVerticali">
                    <img class="fx_img" src="img/img4.png" alt="">
                    <div class="fx_titolo"> Tutorial</div>
                    <a class="fx_paragrafo" href="">Che cos'è la </br> 
                        della carne e perché è indice di qualità?
                    </a>
                </div>

                <!--MODAL VIEW-->
                <div id="C_modal-view">
                    <div id="modal-view" class="hidden">
                        
                    </div>
                </div>
                
            </header>


            <!--TERZO HEADER-->
            <header id="C_header3">
                <div class="Cfx_blocchi_img_testo">   
                    <img class="fx_img1" src="img/img_blocco.jpeg" alt="">
                    <a class="fx_paragrafo1" href="">Quadrotti ricotta e </br> limone: la ricetta dei dolcetti morbidi e profumati
                    </a>             
                </div >
                <div class="Cfx_blocchi_img_testo">
                    <img class="fx_img1" src="img/img_blocco1.jpeg" alt="">
                    <a class="fx_paragrafo1" href="">Pasta biscotto: la ricetta </br>perfetta per farla elastica e 12 idee per farcirla
                    </a>
                </div >
                <div class="Cfx_blocchi_img_testo">
                    <img class="fx_img1" src="img/img_blocco2.jpeg" alt="">
                    <a class="fx_paragrafo1" href="">Ravioli cinesi al vapore: </br> la ricetta del piatto tipico della cucina cinese
                    </a>
                </div>
                <!--AGGIUNGI PREFERITO-->
                <div id="segnalibriVuoti">
                    <img id="segnalibroVuoto1" data-index="1" src="img/segnalibro_Vuoto.jpeg" alt="">
                    <img id="segnalibroVuoto2" data-index="2" src="img/segnalibro_Vuoto.jpeg" alt="">
                    <img id="segnalibroVuoto3" data-index="3" src="img/segnalibro_Vuoto.jpeg" alt="">
                </div>        
            </header>

            <section id="C_section">
                <div class="Cfx_blocchi_orizzontali">
                    <img class="fx_sectionTopImg" src="img/sectiontop.jpeg" alt="">
                    <p class="fx_sectionTop">Qual è il momento migliore della </br>giornata per mangiare i dolci? La risposta della dietista</p>
                    <div id="overlay2">HEALTHY SOUND
                    </div>
                    
                </div>
                <div class="Cfx_blocchi_orizzontali">
                    <div class="Cfx_sectionBottom">
                        <img class="fx_sectionBottomImg" src="img/sectionbottom.jpeg" alt="">
                        <p class="fx_sectionBottomText">Qual è il momento </br> migliore per mangiare la frutta? Lo abbiamo chiesto all'esperta</p>

                    </div>
                    <div class="Cfx_sectionBottom">
                        <img class="fx_sectionBottomImg" src="img/sectionbottom1.jpeg" alt="">
                        <p class="fx_sectionBottomText">Come far mangiare le </br> verdure ai bambini? I consigli della nutrizionista e le migliori ricette
                        </p>

                    </div>
                    <div class="Cfx_sectionBottom">
                        <img class="fx_sectionBottomImg" src="img/sectionbottom2.jpeg" alt="">
                        <p class="fx_sectionBottomText">Pausa pranzo in </br> ufficio: 8 consigli per un pasto sano ed equilibrato
                        </p>

                    </div>
                    <div class="Cfx_sectionBottom">
                        <img class="fx_sectionBottomImg" src="img/sectionbottom3.jpeg" alt="">
                        <p class="fx_sectionBottomText">Dieta </br> antinfiammatoria: cos’è, gli alimenti da scegliere e quelli da evitare
                        </p>

                    </div>
                </div>
            </section>
        </div>
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